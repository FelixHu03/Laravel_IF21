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
                  </tr>
                  </thead>
                  <tbody>
                     @foreach ($prodis as $prodi)
                     <tr> 
                        <td>{{ $prodi['Fakultas']['singkatan'] }}</td>
                        <td>{{ $prodi['nama'] }} {{ $prodi['Fakultas']['nama'] }} </td>
                     </tr>      
                     @endforeach
                  </tbody>
              </table>
              </div>
          </div>
          </div>
      </div>
  </div>
@endsection

