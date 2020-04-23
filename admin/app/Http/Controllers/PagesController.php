<?php

namespace App\Http\Controllers;

use App\Venue;
use App\School;
use App\Student;
use App\Applicant;
use App\Programme;
use App\Department;
use Illuminate\Http\Request;

class PagesController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function home() {
        return view('pages.dashboard');
    }

    public function events() {
        return view('pages.events');
    }

    public function students() {
        $students = Student::all();
        return view('pages.students',compact('students'));
    }

    public function applicants() {
        $applicants = Applicant::whereAccepted(0)->get();
        return view('pages.applicants',compact('applicants'));
    }

    public function viewApplicant() {
        return view('pages.view-applicant');
    }


    public function addSchool() {
        return view('pages.add-school');
    }

    public function programmes() {
        $programmes = Programme::all();
        return view('pages.programmes', compact('programmes'));
    }

    public function addProgramme() {
        $departments = Department::all();
        return view('pages.add-programme', compact('departments'));
    }

    public function allDepartments() {
        return view('pages.departments');
    }

    public function addDepartment() {
        $schools = School::all();
        return view('pages.add-department', compact('schools'));
    }

    public function allVenues(){
        $venues = Venue::all();
        return view('pages.venues', compact('venues'));
    }

    public function examTimetable($id){
        $venue = Venue::find($id);
        return view('pages.exam-timetable', compact('venue'));
    }

}
