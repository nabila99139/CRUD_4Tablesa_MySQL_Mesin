@extends('layout/aplikasi')

@section('konten_mutasi_mesin')

<div>
    <h1>Detail Mutasi Mesin</h1>
    <p>Nama Jenis Mesin: {{ $data->tanggal_mutasi }}</p>
    
    {{-- <p>
        <b>Status Mesin</b> {{ $data->status_mesin }}
    </p>
    <p>
        <b>Lokasi</b> {{ $data->lokasi_mesin }}
    </p> --}}
    <a class="btn btn-secondary" href="/mutasi_mesin">Kembali ke Daftar</a>
</div>

@endsection
