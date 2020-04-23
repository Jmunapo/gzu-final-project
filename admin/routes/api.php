<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::fallback(function() {
    return response()->json(['error' => 'Resource not found'], 404);
})->name('fallback');

Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('login', 'StudentController@login');
    Route::post('logout', 'StudentController@logout');
    Route::post('refresh', 'StudentController@refresh');
    Route::post('me', 'StudentController@me');
    Route::post('profile', 'StudentController@getProfile');
    Route::post('apply', 'API\ApplicantsController@apply');
    Route::get('programmes', 'API\ApplicantsController@programmes');
    Route::post('filehandler', 'API\ApplicantsController@filehandler');
    Route::delete('filehandler', 'API\ApplicantsController@delFile');
});

Route::group(['prefix' => 'app'], function ($router) {
    Route::post('emergency', 'API\EmergencyController@store');

    Route::get('financials', 'API\MobileApp@getFinancials');
    Route::get('transactions', 'API\MobileApp@getTransactions');
    Route::get('courses', 'API\MobileApp@getCarriculumCourses');
    Route::get('timetable', 'API\MobileApp@getTimetable');
    Route::get('posts', 'API\MobileApp@getPosts');

    Route::post('store_deposit', 'API\MobileApp@storeDeposit');
    Route::post('register', 'API\MobileApp@storeRegisteredCourses');
});



