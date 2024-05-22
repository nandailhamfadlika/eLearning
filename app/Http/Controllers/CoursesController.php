<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    //method untuk menampilkan halaman student
    public function index(){
        // mendapatkan data student dari database
       $courses = Course::all();
    
        //    panggil view dan kirim data ke view
    return view('admin.contents.course.index', [
        'courses' => $courses
    ]);
    }
}
