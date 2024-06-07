<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //method untuk menampilkan halaman student
    public function index(){
        // mendapatkan data student dari database
       $students = Student::all();

       
       //    panggil view dan kirim data ke view
       return view('admin.contents.student.index', [
           'students' => $students
        ]);
    }
    
    
    public function create(){
        
        
        //    mendapatkan data course dari database
    $courses = Course::all();
    return view('admin.contents.student.create', [
        'courses' =>$courses
    ]);
}

// method menyimpan data student
public function store(Request $request){
    
    // validasi data yang diterima
    $request->validate([
        'name' => 'required',
        'nim' => 'required|numeric',
        'major'=> 'required',
        'class' => 'required',
        'course_id' => 'nullable|numeric'
        ]);

        // simpan ke database
        Student::create([
            'name'=> $request->name,
            'nim'=> $request->nim,
            'major'=> $request->major,
            'class'=> $request->class,
            'course_id' => $request->course_id
        ]);

        // arahkan ke halaman student
        return redirect('/admin/student')->with('Pesan','Berhasil Menambahkan Data');
    }



    // method menampilkan halaman edit
    public function edit($id){
        // cari student berdasarkan id
        $student = Student::find($id);
        $courses = Course::all();

        // kirim student ke halaman view edit
        return view('admin.contents.student.edit',[
            'student' => $student,
            'courses' =>$courses
        ]);

    }


    
    // method menyimpan hasil update
    public function update($id, Request $request){

        $student = Student::find($id);

        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major'=> 'required',
            'class' => 'required',
            'course_id' => 'nullable|numeric'
        ]);

        $student->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'major'=> $request->major,
            'class' => $request->class,
            'course_id' => $request->course_id
        ]);
        return redirect('/admin/student')->with('Pesan','Berhasil mengedit Student');

        

    }

    // method delete student
    public function destroy($id){
        $student = Student::find($id);

        // delete student
        $student->delete();

        return redirect('/admin/student')->with('Pesan','Berhasil Menghapus Student');
    }

}
