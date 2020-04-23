<?php

namespace App\Http\Controllers;

use App\Course;
use App\Department;
use Illuminate\Http\Request;
use App\Imports\ImportCourses;
use Maatwebsite\Excel\Facades\Excel;

class CourseController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        $courses = Course::all();
        return view('pages.course', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('pages.add-course', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(request()->hasFile('course_csv')){
            try {
                Excel::import(new ImportCourses, $request->course_csv);
                return response()->json([
                    'error' => false,
                    'message'=> "Courses imported successfully"
                ], 200);
            } catch (\Throwable $th) {
                $error_message = $th->getCode();

                return response()->json([
                    'error' => true,
                    'message'=> "Failed to import. Download and use the provided template"
                ], 500);

            }
        }else{
            $input = request([
                'department_id',
                'course_code',
                'university_wide',
                'course_name',
                'course_description',]);
            Course::create($input);

            return response()->json([
                'error' => false,
                'message'=> "Courses imported successfully"
            ], 200);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
