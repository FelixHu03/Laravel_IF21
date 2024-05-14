@extends('layout.main')
@section('title', 'Tambah Fakultas')
@section('content')
    <h2>Daftar Fakultas</h2>
    <p>Ini halaman Tambah fakultas</p>
    <form action="{{  route('fakultas.store') }}" method="post">
        @csrf
        Nama Fakultas <input type="text" name="nama" id=""><br>
        Singkatan <input type="text" name="singkatan" id=""><br>
        <button type="submit">Simpan</button>
    </form>
@endsection
