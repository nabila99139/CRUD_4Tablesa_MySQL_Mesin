@extends('layout/aplikasi')

@section('konten_jenis_mesin')


<h1>Tabel Jenis Mesin</h1>

<a href="/jenis_mesin/create" class="btn btn-primary">Tambah Data</a>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nama Jenis Mesin</th>
            <th>Aksi</th>
        </tr>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama_jenis_mesin }}</td>
                <td>
                    <a class="btn btn-secondary btn-sm" href="{{ url('/jenis_mesin/'.$item->id) }}">Lihat Detail</a>
                    <a class="btn btn-warning btn-sm" href="{{ url('/jenis_mesin/'.$item->id.'/edit') }}">Edit</a>
                    <form onsubmit="return confirm('Anda yakin ingin menghapus data ini?')" class="d-inline" action="{{ '/jenis_mesin/'.$item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </thead>
</table>

{{ $data->links() }}

@endsection

{{-- <table class="table">
    <thead>
        <tr>
            <th>barcode id</th>
            <th>lokasi mesin</th>
            <th>Jenis Mesin</th>
            <th>Merk Mesin</th>
            <th>Tanggal Mutasi Mesin</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->barcode_id }}</td>
                <td>{{ $item->lokasi_mesin }}</td>
                <td>{{ $item->nama_jenis_mesin }}</td>
                <td>{{ $item->nama_merk_mesin }}</td>
                <td>{{ $item->tanggal_mutasi }}</td>
                <td><a class="btn btn-secondary btn-sm" href="{{ url('/mesin/'. $item->barcode_id) }}">Detail</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

    {{ $data->links() }}
@endsection  --}}