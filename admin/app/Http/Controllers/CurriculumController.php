<?php

namespace App\Http\Controllers;

use App\Course;
use App\Curriculum;
use App\CurriculumCourse;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index($id) {
        try {
            $programme_name = \App\Programme::find($id)->programme_name; 
        } catch (\Throwable $th) {
            return abort(403, 'Unauthorized action.');
        }
        $curriculums = Curriculum::where('programme_id', $id)->get();
        return view('pages.view-curriculum', compact('curriculums'));
    }

    public function assignForm($id){
        $req = explode("_", $id);
        $department_id = '';
        try {
            $department_id = \App\Programme::find($req[0])->department_id; 
            $curricular_name = \App\Curriculum::find($req[1])->curricular_name;
        } catch (\Throwable $th) {
            return abort(403, 'Unauthorized action.');
        }


        $courses = Course::where('department_id', $department_id)->orWhere('university_wide', 1)->get();
        $one_one_courses = CurriculumCourse::where('curricular_id', $req[1])->where('level', '1.1')->get();
        
        return view('pages.assign-courses', compact('courses', 'one_one_courses'));

    }

    public function store(){

        $curr = new Curriculum;

        $curr->curricular_name = request()->curricular_name;
        $curr->programme_id = request()->programme_id;
        $curr->effect_from = date('Y-m-d', strtotime(request()->effect_from));

        

        $curriculums = Curriculum::where('programme_id', $curr->programme_id)->where('effect_from', $curr->effect_from)->get();

        //return dd($curriculums);

        if(count($curriculums) === 0){
            $curr->save();
            return response()->json(['Carriculum inserted'=>true],200);
        }else {
            return response()->json(['message'=>'Carriculum already added'],400);
        }        
        
    }

    public function assignStore(){
        $curr_course = new CurriculumCourse;

        $curr_course->level = request()->level;
        $curr_course->curricular_id = request()->curricular_id;
        $curr_course->course_id = request()->course_id;

        $courses = CurriculumCourse::where('course_id', $curr_course->course_id)->where('curricular_id', $curr_course->curricular_id)->where('level', $curr_course->level)->get();

        if(count($courses) === 0){
            $curr_course->save();
        }

        $n_courses = CurriculumCourse::where('curricular_id', $curr_course->curricular_id)->where('level', $curr_course->level)->get();
        
        $n_courses->map(function($cors){
            return $cors->course_code = Course::find($cors->course_id)->course_code; 
        });
        return response()->json($n_courses,200);

    }

    public function jsGetCourses(){
        $level = request()->level;
        $curricular_id = request()->curricular_id;
        $courses = CurriculumCourse::where('curricular_id', $curricular_id)->where('level', $level)->get();
        $courses->map(function($cors){
            return $cors->course_code = Course::find($cors->course_id)->course_code; 
        });
        return response()->json($courses,200);
    }

    public function dropCurriculumCourse(){
        $courses = CurriculumCourse::find(request()->id);
        $courses->delete();
        return response()->json(['Record deleted'=>true],200);
    }


}

