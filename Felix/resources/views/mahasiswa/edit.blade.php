@extends('layout.main')
@section('title', 'Ubah Mahasiswa')
@section('content')
    <h2>Daftar prodi</h2>
    <p>Ini halaman Ubah Mahasiswa</p>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Default form</h4>
                <p class="card-description">
                  Basic form layout
                </p>
                <form class="forms-sample" action="{{  route('mahasiswa.update', $mahasiswa['id']) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Mahasiswa</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Mahasiswa" value="{{ old('nama') ? old('nama') : $mahasiswa['nama']}}">
                        @error('nama')
                            {{ $message }}
                        @enderror
                    </div>
                  {{-- NPM --}}
                    <div class="form-group">
                        <label for="npm">NPM</label>
                        <input type="text" class="form-control" name="npm" placeholder="npm" value="{{ old('npm') ? old('npm') : $mahasiswa['npm']}}" readonly>
                        @error('npm')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  {{-- tempat lahir --}}
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" placeholder="tempat_lahir" value="{{ old('tampat_lahir') ? old('tampat_lahir') : $mahasiswa['tampat_lahir']}}">
                        @error('tempat_lahir')
                            {{ $message }}
                        @enderror
                    </div>
                  {{-- tanggal Lahir --}}
                    <div class="form-group">
                        <label for="tanggal_lahir">tanggal lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" placeholder="tanggal_lahir" value="{{ old('tanggal_lahir') ? old('tanggal_lahir') : $mahasiswa['tanggal_lahir']}}">
                        @error('tanggal_lahir')
                            {{ $message }}
                        @enderror
                    </div>
                  {{-- alamat --}}
                    <div class="form-group">
                        <label for="alamat">alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="alamat" value="{{ old('alamat') ? old('alamat') : $mahasiswa['alamat']}}">
                        @error('alamat')
                            {{ $message }}
                        @enderror
                        </div>
                    {{-- kota --}}
                    <div class="form-group">
                      <label for="kota_id">Kota lahir</label>
                      <select name="kota_id" id="" class="form-control" placeholder="Palembang">
                          @foreach ($kota as $kotas)
                              <option value="{{ $kotas["id"] }}" {{ (old('kota_id') == $kotas ['id'] ? 'selected' : ($mahasiswa['kota_id']
                              == $kotas['id'] ? 'selected' : null)) }}> {{ $kotas["nama"] }} </option>
                          @endforeach
                      </select>
                      @error('kota_id')
                          {{ $message }}
                      @enderror
                    </div>
                    {{-- prodi --}}
                     <div class="form-group">
                      <label for="prodi_id">Prodi</label>
                      <select name="prodi_id" id="" class="form-control" placeholder="prodi_id Teknik">
                          @foreach ($prodi as $prot)
                              <option value="{{ $prot["id"] }}" {{ (old('prodi_id') == $prot ['id'] ? 'selected' : 
                              ($mahasiswa['prodi_id'] == $prot['id'] ? 'selected' : null)) }}>  {{ $prot["nama"] }} </option>
                          @endforeach
                      </select>
                      @error('prodi_id')
                          {{ $message }}
                      @enderror
                    </div>
                    {{-- url foto --}}
                    <div class="form-group">
                      <label for="url_foto">File Foto</label>
                      <input type="file" class="form-control" name="url_foto"  >
                      @error('url_foto')
                          {{ $message }}
                      @enderror
                    </div>
                
                
                  <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                  <a href="{{ url('mahasiswa') }}" class="btn btn-light">Back</a>
                
                </form>
              </div>
            </div>
          </div>
      </div>
@endsection
