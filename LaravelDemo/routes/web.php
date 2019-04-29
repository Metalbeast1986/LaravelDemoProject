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

Route::get('/', function () {
    return view('base');
});

Route::get('doctor', function() {
  return view('doctor');
});

Route::get('patient', function() {
  return view('patient');
});

Route::get('visit', function () {
    return view('visit');
});

Route::resource('doctor', 'DoctorController');
Route::resource('patient', 'PatientController');
Route::resource('visit', 'VisitController');