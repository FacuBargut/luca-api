<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
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
    return view('welcome');
});

// Route::resource('students', SubjectController::class);

Route::resource('students', 'App\Http\Controllers\StudentController');

Route::resource('subjects', 'App\Http\Controllers\SubjectController');

Route::resource('questions', QuestionController::class);



