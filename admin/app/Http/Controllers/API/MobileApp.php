<?php

namespace App\Http\Controllers\API;

use App\News;
use App\Venue;
use App\Course;
use App\Financial;
use App\Curriculum;
use App\AppSettings;
use App\AcademicInfo;
use App\CurriculumCourse;
use App\RegisteredStudent;
use Illuminate\Http\Request;
use Faker\Generator as Faker;
use App\Http\Controllers\Controller;

class MobileApp extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify');
    }

    public function getFinancials(){
        $financials = (object) array();
        $student = auth('api')->user();
        $academic_info = AcademicInfo::where('reg_number', $student->reg_number)->first();

        $wallet = 0;
        $finance = Financial::where('reg_number', $student->reg_number)->get();

        foreach ($finance as $fn) {
            if(!isset($financials->{$fn->fees_type})){
                $financials->{$fn->fees_type} = 0;
            }
            $financials->{$fn->fees_type} += $fn->amount;
        }

        $financials->fees_balance = $academic_info->fees_balance;
        $financials->fees = $academic_info->fees;
        $financials->currency = 'RTGS$';
        return response()->json($financials, 200);
    }

    public function getTransactions(){
        $student = auth('api')->user();
        $transactions = Financial::where('reg_number', $student->reg_number)->get();
        return response()->json($transactions);
    }

    public function storeDeposit(Faker $faker){
        if(!isset(request()->fees_type) || !isset(request()->amount)){
            return response()->json(['error'=>'Missing required fields'],400);
        }
        $student = auth('api')->user();
        $deposit = new Financial;
        $deposit->reg_number = $student->reg_number;
        $deposit->fees_type = request()->fees_type;
        $deposit->payment_type = 'Ecocash';
        $deposit->amount = request()->amount;
        $deposit->status = 'paid'; //pending, canceled, etc
        $deposit->bank_refrence = $faker->regexify('[A-Z]{2}[0-9]{6}\.[0-9]{4}\.[A-Z]{1}[0-9]{5}\.');
        $deposit->paid_by = $student->reg_number; //pending, canceled, etc
        $deposit->refrence_number = $student->reg_number.str_pad(count(Financial::where('reg_number', $student->reg_number)->get()) + 1, 13, 0, STR_PAD_LEFT);
        
        $saved = $deposit->save();

        if(!$saved){
            return response()->json(['error'=>'Failed to save'],500);
        }

        if($deposit->fees_type === 'Tuition'){
            $academic_info = AcademicInfo::where('reg_number', $student->reg_number)->first();
            if(!isset($academic_info)){
                return response()->json(['error'=>'Cannot find academic info'],500);
            }

            $bal = $academic_info->fees_balance + $deposit->amount;
            $academic_info->fees_balance = $bal;
            $academic_info->save();
        }

        return response()->json(['message' => 'Deposited successfully'],200);
    }




    public function getCarriculumCourses(){
        $student = auth('api')->user();
        $curriculum = Curriculum::where('effect_from', $student->enrolled_at)->where('programme_id', $student->programme_id)->first();
        
        if(!isset($curriculum)){
            return response()->json(['message' => 'Curriculum not found'], 400);
        }
        
        $curr_courses = CurriculumCourse::where('curricular_id', $curriculum->id, 'level', $student->level)->get();

        if(count($curr_courses) === 0){
            return response()->json(['message' => 'No modules found'], 400);
        }
        $modules = array();

        foreach ($curr_courses as $crs) {
            $course = Course::find($crs->course_id);
            $c = (object) array();
            $confirmed = RegisteredStudent::where(
                'reg_number', $student->reg_number)
                ->where('course_id', $course['id'])
                ->first();
            $c->registered = isset($confirmed);
            $c->course_id = $course['id'];
            $c->course_code = $course['course_code'];
            $c->course_name = $course['course_name'];
            array_push($modules, $c);
        }

        return response()->json($modules, 200);
    }

    public function storeRegisteredCourses(){
        $student = auth('api')->user();

        $courses = request()->all();

        if(!is_array($courses)){
            return response()->json('Invalid data format', 401);
        }

        RegisteredStudent::where(
            'reg_number', $student->reg_number)->delete();

        $toSave = [];

        $thr;

        foreach ($courses as $course) {
            $reg = RegisteredStudent::firstOrNew(
                array('reg_number' => $student->reg_number, 
                    'course_code' => $course['course_code']));
            
            $reg->course_id = $course['course_id'];

            try {
                $reg->save();
            } catch (\Throwable $th) {
                $thr = $th;
            }
            
        }


        if(isset($thr)){
            return response()->json('Something went wrong', 401);
        }

        return response()->json(['message'=> 'Registered successfully'], 200);
        
    }

    public function getTimetable() {
        $student = auth('api')->user();
        $settings = AppSettings::whereName('exam_timetable')->first();
        if(!isset($settings) || !$settings->status){
            return response()->json('not_ready', 400);
        }
        $ttable = RegisteredStudent::whereRegNumber($student->reg_number)->get();
        if(count($ttable) === 0){
            return response()->json('not_ready', 400);
        }

        $res_ttable = array();

        foreach ($ttable as $t) {
            $venue = Venue::find($t->venue_id);
            $_time = (object) array();

            $_time->course_code = $t->course_code;
            $_time->venue = $venue->venue_name;
            $_time->date    = $t->exam_date;
            $_time->position = $t->sitting_position;

            array_push($res_ttable, $_time);
        }

        return response()->json($res_ttable, 200);
    }

    public function getPosts(){
        $news = News::all();
        return response()->json($news, 200);
    }
}
