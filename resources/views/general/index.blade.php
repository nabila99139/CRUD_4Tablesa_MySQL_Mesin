@extends('layout/aplikasi')

@section('konten_general')

<h1>Daftar Semua Tabel</h1>

<div class="row g-3 align-items-center mt-3 mb-3">
    <div class="col-auto">
        <form action="/semua_table" method="GET">
            <input class="form-control me-2" name="search" type="search" placeholder="Pencarian" aria-label="Search">
        </form>
    </div>
</div>


<table class="table">
    <thead>
        <tr>
            <th>barcode id</th>
            <th>Status Mesin</th>
            <th>Lokasi Mesin</th>
            <th>Tama Jenis Mesin</th>
            <th>Nanggal Pencatatan</th>
            <th>Nama Merk Mesin</th>
            <th>Lokasi Asal</th>
            <th>Lokasi Tujuan</th>
            <th>Tanggal Mutasi Mesin</th>
            <th>Tombol Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->barcode_id }}</td>
                <td>{{ $item->status_mesin }}</td>
                <td>{{ $item->lokasi_mesin }}</td>
                <td>{{ $item->tanggal_pencatatan }}</td>
                <td>{{ $item->nama_jenis_mesin }}</td>
                <td>{{ $item->nama_merk_mesin }}</td>
                <td>{{ $item->lokasi_asal }}</td>
                <td>{{ $item->lokasi_tujuan }}</td>
                <td>{{ $item->tanggal_mutasi }}</td>
                {{-- <td><a class="btn btn-secondary btn-sm" href="{{ url($item->barcode_id) }}">Detail</a></td> --}}
                {{-- <td><a class="btn btn-secondary btn-sm" href="{{ route('detail', ['id' => $item->barcode_id]) }}">Detail</a></td> --}}
                <td><a class="btn btn-secondary btn-sm" href="{{ route('detail', ['id' => $item->barcode_id]) }}">Detail</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

    {{ $data->links() }}

@endsection 