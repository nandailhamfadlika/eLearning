<?php

namespace App\Http\Controllers;

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
        return view('admin.contents.student.create');
    }
    
    // method menyimpan data student
    public function store(Request $request){
        
        // validasi data yang diterima
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major'=> 'required',
            'class' => 'required'
        ]);

        // simpan ke database
        Student::create([
            'name'=> $request->name,
            'nim'=> $request->nim,
            'major'=> $request->major,
            'class'=> $request->class
        ]);

        // arahkan ke halaman student
        return redirect('/admin/student')->with('Pesan','Berhasil Menambahkan Data');
    }



    // method menampilkan halaman edit
    public function edit($id){
        // cari student berdasarkan id
        $student = Student::find($id);

        // kirim student ke halaman view edit
        return view('admin.contents.student.edit',[
            'student' => $student
        ]);
    }

    // method menyimpan hasil update
    public function update($id, Request $request){

        $student = Student::find($id);

        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major'=> 'required',
            'class' => 'required'
        ]);

        $student->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'major'=> $request->major,
            'class' => $request->class
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
