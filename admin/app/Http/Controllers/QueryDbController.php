<?php

namespace App\Http\Controllers;

use App\News;

use App\Venue;
use OneSignal;
use App\School;
use App\Student;
use App\Applicant;
use App\Programme;
use App\Department;
use App\AppSettings;
use App\AcademicInfo;
use GuzzleHttp\Client;
use App\VenueTimetable;
use App\RegisteredStudent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class QueryDbController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function storeProgramme(){

        $input = request([
        'department_id',
        'graduate_level',
        'programme_name',
        'fees_new',
        'fees_returning',
        'conventional_duration',
        'block_duration',
        'normal_entry_requirements',
        'special_entry_requirements',
        'mature_entry_requirements',
        'notes']);

        $input['programme_code'] = 'GZU'.str_pad(count(Programme::all()) + 1, 4, 0, STR_PAD_LEFT);

        $programmes = Programme::where('programme_name', $input['programme_name'])->where('graduate_level',  $input['graduate_level'])->where('department_id', $input['department_id'])->get();
        if(count($programmes) === 0){
            Programme::create($input);
        }
        response()->json(['Data inserted'=>true],200);
    }


    public function acceptApplicant(){


        $applicant_id = request()->applicant_id;
        $enrolled_in = request()->enrolled_in;
        $intake = request()->intake;

        $applicant = Applicant::findOrFail($applicant_id);

        if($applicant->accepted === 1){
            return response()->json(['error'=>false, 'message' => 'Student already added'],200);
        }


        $student = new Student;

        $student->applicant_id = ucfirst($applicant->id);
        $student->reg_number = 'M'.substr(now()->year, 2).str_pad(count(Student::all()) + 1, 4, 0, STR_PAD_LEFT);
        $student->gender = ucfirst($applicant->sex);
        $student->name = ucfirst($applicant->firstname)." ".ucfirst($applicant->lastname);
        $student->email = $applicant->email;
        $student->phone = $applicant->phone;
        try {
            $student->programme_id = Programme::whereProgramme_name($enrolled_in)->first()->id;
        } catch (\Throwable $th) {
            $student->programme_id = 1;
        }
        
        $student->intake_type = ucfirst($applicant->intake_type);
        $student->password = Hash::make($applicant->phone);
        $student->remember_token = Str::random(10);
        $student->enrolled_at = date('Y-m-d', strtotime($intake));


        $students = Student::where('applicant_id', $applicant->id)->first();
        
        if(!isset($students)){
            $student->save();
        }else {
            $student = $students;
        }
        //TODO: use first or new;
        // $academic_info = AcademicInfo::where('reg_number', $student->reg_number)->get();
        // if(count($academic_info) === 0){
        //     $academic_info = new AcademicInfo;
        // }else {
        //     $academic_info = $academic_info[0];
        // }
        $academic_info = AcademicInfo::firstOrCreate('reg_number', $student->reg_number);

        $academic_info->reg_number = $student->reg_number;
        $academic_info->level = '1.1';
        $academic_info->fees = Programme::find($student->programme_id)->fees_new;
        $academic_info->fees_balance = 0 - Programme::find($student->programme_id)->fees_new;

        $academic_info->save();


        
        $applicant->accepted = true;
        $applicant->save();

        $msg = sendWelcome($applicant->firstname, $enrolled_in, $student->phone, $student->reg_number); //helper

        return response()->json(['error'=>false, 'message' => $msg],200);
    }

    public function dropApplicant(){
        $applicant_id = request()->applicant_id;
        if(!isset($applicant_id)){
            return response()->json(['error'=>true, 'message' => 'Applicant ID is missing'],400);
        }

        Applicant::destroy($applicant_id);
        return response()->json([
            'error'=>false, 
            'message' => 'Applicant was successfully rejected'
            ],200);
    }

    public function addSchool() {
        $school = new School;
        $school->school_name = request()->school_name;
        $school->start_date = request()->start_date;
        $school->about_school = request()->about_school;

        try {
            $school->save();
            return response()->json(['error'=>false, 'message' => 'School saved'],200);
        } catch (\Throwable $th) {
            return response()->json(['error'=>true, 'message' => 'Cannot save'],400);
        }
        
    }
    
    public function addDepartment() {
        $department = new Department;
        $department->department_name = request()->department_name;
        $department->school_id = request()->school_id;
        $department->start_date = request()->start_date;
        $department->about_department = request()->about_department;

        try {
            $department->save();
            return response()->json(['error'=>false, 'message' => 'Department saved'],200);
        } catch (\Throwable $th) {
            return response()->json(['error'=>true, 'message' => 'Cannot save'],400);
        }
        
    }

    public function addVenues(){
        $venue = Venue::firstOrNew(array('venue_key' => request()->venue_key));
        $venue->venue_name = request()->venue_name;
        $venue->capacity = request()->capacity;
        $venue->vacants = request()->capacity * 2; //if vacants > capacity === morning else evening

        $venue->save();
        
        return response()->json(['error'=>false, 'message' => 'Venue saved'],200);
        
        
    }

    public function generateTimetable(){
        
        $dates = request()->dates;
        if(!is_array($dates)){
            return response()->json(['error'=>true, 'message' => 'Invalid range, try again'],400);
        }

        $dates_collection = collect($dates);

        $reg_courses = RegisteredStudent::all();

        $venues = Venue::all();

        if(count($venues) === 0){
            return response()->json('add_venue', 400);
        }

        //TODO: Auto generate timetable base on at leas 1 registered student.

        $group_by_course = unique_multidim_array($reg_courses,'course_id');
        //Group by courses

        $unfinised = false;


        foreach ($group_by_course as $registered) {
            $group = RegisteredStudent::whereCourseId($registered['course_id'])->get();
            //check level
            if(count($group) != 0){
                $first_student = AcademicInfo::whereRegNumber($group[0]['reg_number'])->first();
                $level = $first_student->level;

                $allowed_venues = Venue::where('capacity', '>=', count($group) + 5)->get();
                //Filter venues that can accommodate group either morning or evening
                // $allowed_venues = $allowed_venues->filter(function ($venue, $key)  use ($group) {
                //     return ($venue['capacity'] - (count($group) + 5)) > 0; //Space for 10 late registration
                // });

                //FIXME: Create a function for the for eaches below and if fail rerun it with  getDateRange($dates_collection, $level, true)
                $all_dates = $this->getDateRange($dates_collection, $level);
                $selected_venue = null;
                $writting_date = null;
                $group_size = 0;


                foreach ($all_dates as $date) {
                    #testing venue against time;
                    $_student_writing = false;
                    foreach ($group as $_student) {
                        $no_student_writting = RegisteredStudent::whereRegNumber($_student['reg_number'])->whereExamDate($date)->first();
                        if(isset($no_student_writting)){
                            $_student_writing = true;
                            break 1;
                        }
                    }

                    if(!$_student_writing){
                        foreach ($allowed_venues as $vnu) {
                            $test_vacancy = VenueTimetable::whereVenueId($vnu->id)->whereExamDate($date)->get();

                            if(count($test_vacancy) === 0){
                                $selected_venue = $vnu;
                                break 1;
                            }

                            $group_size = $test_vacancy->sum('group_size');
                            if($vnu->capacity > $group_size && ($vnu->capacity - $group_size) > (count($group) + 5)){
                                $selected_venue = $vnu;
                                break 1;
                            }

                        }
                        if(isset($selected_venue)){
                            $writing_date = $date;
                            break 1;
                        }
                    }
                }

                if(!isset($writing_date) || !isset($selected_venue)){
                    return response()->json("add_venue", 400);
                }

                $v_ttable = VenueTimetable::firstOrNew(
                    array('venue_id' => $selected_venue->id, 
                        'course_id' => $registered['course_id']));

                $v_ttable->group_size = count($group) + 5;
                $v_ttable->exam_date = $writing_date;
                $v_ttable->save();
                
                $sit = $group_size;
                foreach ($group as $registered_stu) {
                    $sit++;
                    RegisteredStudent::where('id', $registered_stu->id)->update(
                        ['exam_date' => $writing_date,
                         'venue_id'=> $selected_venue->id,
                         'sitting_position'=> $sit]);
                }
            }

            
        }

        if($unfinised){
            return response()->json('venue_unfit', 400);
        }

        $ttable = AppSettings::firstOrNew(array('name' => 'exam_timetable'));
        $ttable->status = true;

        $ttable->save();


        OneSignal::sendNotificationUsingTags(
            "Examination timetable is out",
            array(
                ["field" => "tag", "relation" => "=","key" => "timetable", "value" => "1"],
            ),
            $data = null,
            $buttons = null
        );

        return response()->json('generated' , 200);
    }

    function getDateRange($dates, $level, $nochunk = false){
        $chunks = $dates->chunk(5)->toArray();

        $find_dates = [];
        if($level == '1.1' || $level == '1.2'){
            $find_dates = $chunks[2];
        }else if($level == '2.1' || $level == '2.2'){
            $find_dates = $chunks[1];
        }else if($level == '4.1' || $level == '4.2'){
            $find_dates = $chunks[0];
        }

        if($nochunk){
            $find_dates = array_reverse($dates->toArray());
        }

        $all_dates = [];

        foreach ($find_dates as $d) {
            $time = ['09:00:00', '14:00:00'];
            for ($i=0; $i < 2; $i++) { 
                $all_dates[] = $d.' '.$time[$i];
            }
        }

        return $all_dates;
    }

    public function savePost(){
        $news = new News;
        $news->title = request()->title;
        $news->author = request()->author;
        $news->content = request()->content;
        try {
            $news->save();
            OneSignal::sendNotificationUsingTags(
                "New Post:"." ".request()->title,
                array(
                    ["field" => "tag", "relation" => "=","key" => "news", "value" => "1"],
                ),
                $data = null,
                $buttons = null
            );
            return response()->json('success',200);
        } catch (\Throwable $th) {
            return response()->json('error_saving',400);
        }
        return response()->json($news, 200);
    }

}
