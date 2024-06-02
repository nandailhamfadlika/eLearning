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

// route menampilkan form tambah student
Route::get('admin/student/create' , [StudentController::class, 'create']);

// route untuk mengirim data form tambah student
Route::post('admin/student/create', [StudentController::class, 'store']);

// rounte untuk menampilkan halaman edit
Route::get('admin/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');

// route menyimpan hasil update
Route::put('/admin/student/update/{id}', [StudentController::class, 'update']);

// route delete student
Route::delete('/admin/student/delete/{id}', [StudentController::class, 'destroy']);