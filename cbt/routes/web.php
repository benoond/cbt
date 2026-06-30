<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddstdController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admindashboard', function () {
    return view('admin.dashboard');
})->name('admindashboard');

Route::get('/addstudents', function () {
    return view('admin.addstudents');
})->name('addstudents');

Route::post('/savestudents', [AddstdController::class, "savestudents"])->name('savestudents');



Route::get('/zip-test', function () {
    return [
        'php' => PHP_VERSION,
        'zip_loaded' => extension_loaded('zip'),
        'zip_class' => class_exists(\ZipArchive::class),
    ];
});