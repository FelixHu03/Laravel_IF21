@extends('layout.main')
@section('title', 'Daftar Prodi')
@section('content')
    
   <h2>Daftar Prodi</h2>
   <p>Ini halaman daftar fakultas</p>

   @foreach ($prodis as $prodi)
   {{ $prodi['nama'] }} {{ $prodi['Fakultas']['nama'] }} | {{ $prodi['Fakultas']['singkatan'] }}<br>
       
   @endforeach
@endsection

