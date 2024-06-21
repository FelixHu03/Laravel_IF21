@extends('layout.main')
@section('title', 'Mahasiswa')
@section('content')
    <div class="row">
        <div class="col-log-12 grid-margin">
            <table class="table">
                <tbody>
                    <tr>
                        <th>Foto</th>
                    </tr>
                    <tr>
                        <th>NPM</th>
                        <td>{{ $mahasiswa['npm'] }}</td>
                    </tr>
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <td>{{ $mahasiswa['nama'] }}</td>
                    </tr>
                    <tr>
                        <th>Program Studi</th>
                        <td>{{ $mahasiswa['prodi']['nama'] }}</td>
                    </tr>
                    <tr>
                        <th>Tempat Tanggal Lahir</th>
                        <td>{{ $mahasiswa['tempat_lahir']}}, {{ $mahasiswa['tanggal_lahir']}}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $mahasiswa['alamat']}}</td>
                    </tr>
                    <tr>
                        <th>Kota</th>
                        <td>{{ $mahasiswa['kota']['nama'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection