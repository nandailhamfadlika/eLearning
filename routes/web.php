<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Root Route
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/salam',function(){
//     return "Assalamualaikum";
// });

// Dashboard Route
Route::get('admin/dashboard', [DashboardController::class, 'index']);
Route::get('admin/student', [StudentController::class, 'index']);
Route::get('admin/course', [CoursesController::class, 'index']);