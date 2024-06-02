@extends('Admin.main')

@section('content')
    


<div class="pagetitle">
    <h1>Course</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
        <li class="breadcrumb-item active">Courses</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="card">
        <div class="card-body py-4">
            <a href="/admin/course/create" class="btn btn-primary m-3">+ Course</a>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Nomor</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Desc</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($courses as $course)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->category }}</td>
                        <td>{{ $course->desc }}</td>
                        <td>
                            <a href="/admin/course/edit/{{ $course->id }}" class="btn btn-warning my-2 mx-2">Edit</a>
                            <form action="/admin/course/delete/{{ $course->id }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are u sure want to delete?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                        
                    @endforeach
                </table>
            </div>
        </div>
    </div>
  </section>

  @endsection