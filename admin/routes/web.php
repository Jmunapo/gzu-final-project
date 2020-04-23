<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@home')->name('home');
Route::get('/events', 'PagesController@events');
Route::get('/students', 'PagesController@students');
Route::get('/applicants', 'PagesController@applicants');
Route::get('/view_applicant', 'PagesController@viewApplicant');
Route::get('/programmes', 'PagesController@programmes')->name('programmes');
Route::get('/add_programme', 'PagesController@addProgramme')->name('add_programme_frm');
Route::get('/add_school', 'PagesController@addSchool');
Route::get('/departments', 'PagesController@allDepartments');
Route::get('/add_department', 'PagesController@addDepartment');
Route::get('/venues', 'PagesController@allVenues')->name('venues');
Route::get('/exam_timetable/{id}', 'PagesController@examTimetable')->name('exam_timetable');







Route::get('/programmes/assign-courses/{id}', 'CurriculumController@assignForm')->name('assign_courses');
Route::post('/programmes/assign-courses/', 'CurriculumController@assignStore')->name('store_curriculum_course');
Route::get('/programmes/view_curriculums/{id}', 'CurriculumController@index')->name('view_curriculums');
Route::post('/programmes/add_curriculum', 'CurriculumController@store')->name('save_curriculum');
Route::post('/programmes/level_courses', 'CurriculumController@jsGetCourses')->name('level_courses');
Route::post('/programmes/drop_courses', 'CurriculumController@dropCurriculumCourse')->name('drop_course');







Auth::routes(['register' => false]);

Route::post('/push','PushController@store');
Route::get('/push','PushController@push')->name('push');


//POST Data to Datapase Controllers
Route::post('/add_programme', 'QueryDbController@storeProgramme')->name('add_programme');
Route::post('/accept_applicant', 'QueryDbController@acceptApplicant')->name('accept_applicant');
Route::post('/reject_applicant', 'QueryDbController@dropApplicant')->name('reject_applicant');
Route::post('/add_department', 'QueryDbController@addDepartment')->name('add_department');
Route::post('/add_school', 'QueryDbController@addSchool')->name('add_school');
Route::post('/venues', 'QueryDbController@addVenues')->name('add_venues');
Route::post('/generate_ttable', 'QueryDbController@generateTimetable')->name('generate_ttable');
Route::post('/save_post', 'QueryDbController@savePost')->name('save_post');




Route::resource('course', 'CourseController')->names([
  'create' => 'create_course'
]);

