<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


// Route::get('/salam',function(){
//     return "Assalamualaikum";
// });


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Dashboard Route
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

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



Route::get('admin/course/create' , [CoursesController::class, 'create']);

// route untuk mengirim data form tambah course
Route::post('admin/course/create', [CoursesController::class, 'store']);

// rounte untuk menampilkan halaman edit
Route::get('admin/course/edit/{id}', [CoursesController::class, 'edit'])->name('course.edit');

// route menyimpan hasil update
Route::put('/admin/course/update/{id}', [CoursesController::class, 'update']);

// route delete course
Route::delete('/admin/course/delete/{id}', [CoursesController::class, 'destroy']);



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
