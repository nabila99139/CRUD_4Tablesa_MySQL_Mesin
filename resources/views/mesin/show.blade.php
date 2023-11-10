@extends('layout/aplikasi')

@section('konten_mesin')

<div>
    <h1>Detail Jenis Mesin</h1>
    <p>Status Mesin: {{ $data->status_mesin }}</p>
    <a class="btn btn-secondary" href="/mesin">Kembali ke Daftar</a>
</div>

@endsection