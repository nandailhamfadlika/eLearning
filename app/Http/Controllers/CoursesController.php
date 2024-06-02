<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    //method untuk menampilkan halaman course
    public function index(){
        // mendapatkan data course dari database
       $courses = Course::all();
    
        //    panggil view dan kirim data ke view
    return view('admin.contents.course.index', [
        'courses' => $courses
    ]);
    }

    public function create(){
        return view('admin.contents.course.create');
    }
    
    // method menyimpan data course
    public function store(Request $request){
        
        // validasi data yang diterima
        $request->validate([
            'name' => 'required',
            'category'=> 'required',
            'desc' => 'required'
        ]);

        // simpan ke database
        course::create([
            'name'=> $request->name,
            'category'=> $request->category,
            'desc'=> $request->desc
        ]);

        // arahkan ke halaman course
        return redirect('/admin/course')->with('Pesan','Berhasil Menambahkan Data');
    }



    // method menampilkan halaman edit
    public function edit($id){
        // cari course berdasarkan id
        $course = Course::find($id);

        // kirim course ke halaman view edit
        return view('admin.contents.course.edit',[
            'course' => $course
        ]);
    }

    // method menyimpan hasil update
    public function update($id, Request $request){

        $course = Course::find($id);

        $request->validate([
            'name' => 'required',
            'category'=> 'required',
            'desc' => 'required'
        ]);

        $course->update([
            'name' => $request->name,
            'category'=> $request->category,
            'desc' => $request->desc
        ]);
        return redirect('/admin/course')->with('Pesan','Berhasil mengedit course');

        

    }

    // method delete course
    public function destroy($id){
        $course = Course::find($id);

        // delete course
        $course->delete();

        return redirect('/admin/course')->with('Pesan','Berhasil Menghapus course');
    }
}
