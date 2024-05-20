<!DOCTYPE html>
<html lang="en">

@include('admin.partials._head');

<body>

    @include('admin.partials._header');

    @include('admin.partials._sidebar');

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>General Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">General</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Default Table</h5>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Pasien</th>
                    <th scope="col">Nama Pasien</th>
                    <th scope="col">Tgl Lahir</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($list_pasien as $pasien)
                        
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <td>{{ $pasien->kode }}</td>
                        <td>{{ $pasien->nama }}</td>
                        <td>{{ $pasien->tgl_lahir }}</td>
                        <td>
                            <a href="">View</a> | <a href="">Edit</a> | <a href="">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End Default Table Example -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  @include('admin.partials._footer');

  @include('admin.partials._scripts');

</body>

</html>