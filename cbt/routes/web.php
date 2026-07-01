<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddstdController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\CoursedepartmentController;
use App\Http\Controllers\CbtController;

Route::get('/', function () {
    return view('welcome');
});

//students starts
Route::get('/admindashboard', function () { return view('admin.dashboard'); })->name('admindashboard');

Route::get('/addstudents', function () { return view('admin.addstudents'); })->name('addstudents');
Route::get('/addonestudents', [AddstdController::class, 'addone'])->name('addonestudents');

Route::get('/allstudents', [AddstdController::class, 'index'])->name('allstudents');
Route::get('/studentscategory', [AddstdController::class, 'search'])->name('studentscategory');

Route::post('/savestudents', [AddstdController::class, "savestudents"])->name('savestudents');
Route::post('/saveonestudents', [AddstdController::class, "saveonestudents"])->name('saveonestudents');
//student ends

//courses starts
Route::get('/addcourses', function () { return view('admin.addcourses'); })->name('addcourses');
Route::post('/savecourses', [CourseController::class, "store"])->name('savecourses');
Route::get('/allcourses', [CourseController::class, 'index'])->name('allcourses');

/* add Course to department */
Route::get('/coursedepartment', [CoursedepartmentController::class, 'index'])->name('coursedepartment');
Route::post('/courseassignments', [CoursedepartmentController::class, 'store'])->name('courseassignments');
//courses ends 


//Exam starts
Route::get('/addexam', [ExamController::class, 'index'])->name('addexam');

//Exam ends


//cbt starts
Route::get('/addcbt', [CbtController::class, 'index'])->name('addcbt');
//cbt ends