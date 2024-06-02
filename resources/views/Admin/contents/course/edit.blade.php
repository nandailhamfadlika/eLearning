@extends('Admin.main')

@section('content')
    


<div class="pagetitle">
    <h1>Edit Course</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
        <li class="breadcrumb-item">course</li>
        <li class="breadcrumb-item">Edit course</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="card">
        <div class="card-body py-4">
            <form action="/admin/course/update/{{ $course->id }}" method="post" class="mt-3">
                @method("PUT")
                @csrf
                <div class="mb-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $course->name ?? ""}}">
                </div>

                
                <div class="mb-2">
                    <label for="category" class="form-label">category</label>
                    <select name="category" id="category" class="form-select">
                        <option value="">Pilih Jurusan</option>
                        <option value="Pemrograman" {{ $course->category == 'Pemrograman' ? 'selected' : '' }}>Pemrograman</option>
                        <option value="Pelajaran Umum"{{ $course->category == 'Pelajaran Umum' ? 'selected' : '' }}>Pelajaran Umum</option>
                        <option value="Extra Class"{{ $course->category == 'Extra Class' ? 'selected' : '' }}>Extra Class</option>
                    </select>
                </div>
                
                <div class="mb-2">
                    <label for="desc" class="form-label">desc</label>
                    <input type="text" name="desc" id="desc" class="form-control" value="{{ $course->desc ?? ""}}">
                </div>

                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </section>

  @endsection