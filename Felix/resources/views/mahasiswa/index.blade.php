@extends('layout.main')
@section('title', 'index Mahasiswa')
@section('content')
    
   <h2>Daftar Prodi</h2>
   <p>Ini halaman daftar fakultas</p>
   <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
          <div class="card-body">
              <h4 class="card-title">Daftar Mahasiswa</h4>
              <p class="card-description">
              List Data Mahasiswa
              </p>
              <a href="{{ url('mahasiswa/create') }}" class="btn btn-inverse-dark btn-fw">Tambah</a>
              <div class="table-responsive">
              <table class="table table-hover">
                  <thead>
                  <tr>
                      <th>NPM</th>
                      <th>Nama</th>
                      <th>Nama Prodi</th>
                      <th>Asal Kota</th>
                  </tr>
                  </thead>
                  <tbody>
                     @foreach ($mahasiswa as $mhs)
                     <tr> 
                        <td>{{ $mhs['npm']}}</td>
                        <td>{{ $mhs['Prodi']['nama'] }} </td>
                        <td>{{ $mhs['kota']['singkatan'] }} </td>
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

