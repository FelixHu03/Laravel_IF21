 @extends('layout.main')
 @section('title', 'Daftar Fakultas')
 @section('content')
     
    <h2>Daftar Fakultas</h2>
    <p>Ini halaman daftar fakultas</p>

    @foreach ($fakultas as $fakulta)
    {{ $fakulta['nama'] }} {{ $fakulta['singkatan'] }}<br>
        
    @endforeach
@endsection

