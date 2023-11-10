@extends('layout/aplikasi')

@section('konten_jenis_mesin')
    <div>
        <h1>Detail Jenis Mesin</h1>
        <p>Nama Jenis Mesin: {{ $data->nama_jenis_mesin }}</p>
        
        {{-- <p>
            <b>Status Mesin</b> {{ $data->status_mesin }}
        </p>
        <p>
            <b>Lokasi</b> {{ $data->lokasi_mesin }}
        </p> --}}
        <a class="btn btn-secondary" href="/jenis_mesin">Kembali ke Daftar</a>
    </div>
@endsection