@extends('layout.main')
@section('title', 'Tambah Fakultas')
@section('content')
    <h2>Daftar Fakultas</h2>
    <p>Ini halaman Tambah fakultas</p>
    <form action="{{  url('fakultas/store') }}" method="post">
        @csrf
        <input type="text" name="nama" id=""><br>
        <input type="text" name="singkatan" id=""><br>
        <button type="submit"></button>
    </form>
@endsection
