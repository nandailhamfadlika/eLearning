@extends('Admin.main')

@section('content')
    


<div class="pagetitle">
    <h1> Create Course</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
        <li class="breadcrumb-item">Course</li>
        <li class="breadcrumb-item">Create</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="card">
        <div class="card-body py-4">
            <form action="/admin/course/create" method="post" class="mt-3">
                @csrf
                <div class="mb-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                
                <div class="mb-2">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" id="category" class="form-select">
                        <option value="">Pilih kategori</option>
                        <option value="Pemrograman">Pemrograman</option>
                        <option value="Pelajaran Umum">Pelajaran Umum</option>
                        <option value="Extra Class">Extra Class</option>
                    </select>
                </div>
                
                <div class="mb-2">
                    <label for="desc" class="form-label">Desc</label>
                    <input type="text" name="desc" id="desc" class="form-control">
                </div>

                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </section>

  @endsection