@extends('layout/aplikasi')

@section('konten_general')
    <div>
        <h1>hello</h1>        
        <p>
            <b>Status Mesin</b> {{ $data->status_mesin }}
        </p>
        <p>
            <b>Lokasi</b> {{ $data->lokasi_mesin }}
        </p>
        <a class="btn btn-secondary" href="/">Kembali ke Daftar</a>
    </div>
@endsection