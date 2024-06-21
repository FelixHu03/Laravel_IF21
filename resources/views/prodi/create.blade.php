@extends('layout.main')
@section('title', 'Tambah prodi')
@section('content')
    <h2>Daftar prodi</h2>
    <p>Ini halaman Tambah prodi</p>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Default form</h4>
                <p class="card-description">
                  Basic form layout
                </p>
                <form class="forms-sample" action="{{  route('prodi.store') }}" method="post">
                  @csrf
                  <div class="form-group">
                    <label for="nama">Nama Program Studi </label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama Progam Studi" value="{{ old('nama') }}">
                    @error('nama')
                        {{ $message }}
                    @enderror
                  </div>
                  {{-- singkatan --}}
                  <div class="form-group">
                    <label for="fakultas_id">Nama Fakultas</label>
                    <select name="fakultas_id" id="" class="form-control" placeholder="Fakultas Teknik">
                        @foreach ($fakultas as $item)
                            <option value="{{ $item["id"] }}"> {{ $item["nama"] }} </option>
                        @endforeach
                    </select>
                    @error('Fakultas_id')
                        {{ $message }}
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                  <a href="{{ url('prodi') }}" class="btn btn-light">Back</a>
                </form>
              </div>
            </div>
          </div>
      </div>
@endsection
