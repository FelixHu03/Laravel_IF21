@extends('layout.main')
@section('title', 'Mahasiswa')
@section('content')
    <div class="row">
        <div class="col-log-12 grid-margin">
            <ol>
                <li>{{ $mahasiswa['npm'] }}</li>
                <li>{{ $mahasiswa['nama'] }}</li>
                <li>{{ $mahasiswa['prodi']['nama'] }}</li>
            </ol>
        </div>
    </div>
@endsection