@extends('layout.main')
@section('title', 'Tambah Fakultas')
@section('content')
    <h2>Daftar Fakultas</h2>
    <p>Ini halaman Tambah fakultas</p>
    <form action="{{  route('fakultas.store') }}" method="post">
        @csrf
        Nama Fakultas <input type="text" name="nama" id="" value="{{ old('nama') }}"><br>
        
        @error('nama')
            {{ $message }}
        @enderror
        <br>
        Singkatan <input type="text" name="singkatan" id="" value="{{ old('singkatan') }}"><br>
        
        @error('singkatan')
            {{ $message }}
        @enderror <br>
        <button type="submit">Simpan</button>
    </form>
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Default form</h4>
            <p class="card-description">
              Basic form layout
            </p>
            <form class="forms-sample">
              <div class="form-group">
                <label for="nama">Nama Fakultas</label>
                <input type="text" class="form-control" id="nama" placeholder="nama" value="{{ old('nama') }}">
                @error('nama')
                    {{ $message }}
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="exampleInputConfirmPassword1">Confirm Password</label>
                <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
              </div>
              <div class="form-check form-check-flat form-check-primary">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input">
                  Remember me
                <i class="input-helper"></i></label>
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>
@endsection
