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
                    @can('create', App\Model\Mahasiswa::class)
                        <a href="{{ url('mahasiswa/create') }}" class="btn btn-inverse-dark btn-fw">Tambah</a>
                    @endcan
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>NPM</th>
                                    <th>Nama</th>
                                    <th>Nama Prodi</th>
                                    <th>Asal Kota</th>
                                    <th>Confirm</th>
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
                                                @can('update', $mhs)
                                            <a href="{{ route('mahasiswa.edit', $mhs['id']) }}"
                                                class="btn btn-sm btn-info btn-rounded">Ubah</a>
                                                @endcan
                                            @can('delete', $mhs)
                                            <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="post"
                                                style="display: inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-sm btn-danger btn-rounded show_confirm"
                                                    data-toggle="tooltip" data-nama="{{ $mhs['nama'] }}"
                                                    title="Hapus">Hapus</button>
                                            </form>
                                            @endcan
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

@endsection
