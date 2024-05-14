@extends('layout.main')
@section('title', 'Tambah prodi')
@section('content')
    <h2>Daftar prodi</h2>
    <p>Ini halaman Tambah prodi</p>
    <form action="{{  route('prodi.store') }}" method="post">
        @csrf
        Nama Prodi <input type="text" name="nama" id="" value="{{ old('nama') }}"><br>
        
        @error('nama')
            {{ $message }}
        @enderror
        <br>
        Fakultas_id <select name="fakultas_id" id="">
            @foreach ($fakultas as $item)
                <option value="{{ $item["id"] }}"> {{ $item["nama"] }} </option>
            @endforeach
        </select>
        
        @error('Fakultas_id')
            {{ $message }}
        @enderror <br>
        <button type="submit">Simpan</button>
    </form>
@endsection
