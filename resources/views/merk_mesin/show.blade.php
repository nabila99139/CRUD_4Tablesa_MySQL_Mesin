@extends('layout/aplikasi')

@section('konten_merk_mesin')

<div>
    <h1>Detail Jenis Mesin</h1>
    <p>Nama Merk Mesin: {{ $data->nama_merk_mesin }}</p>
    <a class="btn btn-secondary" href="/merk_mesin">Kembali ke Daftar</a>
</div>

@endsection