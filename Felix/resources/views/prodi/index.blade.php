@extends('layout.main')
@section('title', 'Daftar Prodi')
@section('content')
    
   <h2>Daftar Prodi</h2>
   <p>Ini halaman daftar fakultas</p>
   <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
          <div class="card-body">
              <h4 class="card-title">Daftar Fakultas</h4>
              <p class="card-description">
              List Data Fakultas
              </p>
              <a href="{{ url('prodi/create') }}" class="btn btn-inverse-dark btn-fw">Tambah</a>
              <div class="table-responsive">
              <table class="table table-hover">
                  <thead>
                  <tr>
                      <th>Nama Prodi</th>
                      <th>Nama Fakultas</th>
                      <th>Singkatan</th>
                  </tr>
                  </thead>
                  <tbody>
                     @foreach ($prodis as $prodi)
                     <tr> 
                        <td>{{ $prodi['nama']}}</td>
                        <td>{{ $prodi['Fakultas']['nama'] }} </td>
                        <td>{{ $prodi['Fakultas']['singkatan'] }} </td>
                     </tr>      
                     @endforeach
                  </tbody>
              </table>
              </div>
          </div>
          </div>
      </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @if (session('success'))
      <script>
        Swal.fire({
            title: "Good job!",
            text:"{{ session('success') }}",
            icon: "success"
        });
      </script>
  @endif
@endsection

