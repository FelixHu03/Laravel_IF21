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
                                        <td><img src="{{ url('foto/' . $mhs['url_foto']) }}" alt=""></td>
                                        <td>{{ $mhs['npm'] }}</td>
                                        <td>{{ $mhs['nama'] }}</td>
                                        <td>{{ $mhs['Prodi']['nama'] }} </td>
                                        <td>{{ $mhs['kota']['nama'] }} </td>
                                        <td><a href="{{ route('mahasiswa.show', $mhs['id']) }}"
                                                class="btn btn-sm btn-info btn-rounded"> Show</a>
                                            <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="bten btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>

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
                text: "{{ session('success') }}",
                icon: "success"
            });
        </script>
    @endif
@endsection
