@extends('layout.main')
@section('title', 'Tambah Fakultas')
@section('content')
    <h2>Daftar Fakultas</h2>
    <p>Ini halaman Tambah fakultas</p>
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Default form</h4>
              <p class="card-description">
                Basic form layout
              </p>
              <form class="forms-sample" action="{{  route('fakultas.store') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="nama">Nama Fakultas</label>
                  <input type="text" class="form-control" name="nama" placeholder="nama" value="{{ old('nama') }}">
                  
                  @error('nama')
                      {{ $message }}
                  @enderror
                </div>
                <div class="form-group">
                  <label for="singkatan">Singkatan</label>
                  <input type="text" class="form-control" name="singkatan" placeholder="singkatan" value="{{ old('singkatan') }}">
                  
                  @error('singkatan')
                      {{ $message }}
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                <a href="{{ url('fakultas') }}" class="btn btn-light">Back</a>
              </form>
            </div>
          </div>
        </div>
    </div>
@endsection
