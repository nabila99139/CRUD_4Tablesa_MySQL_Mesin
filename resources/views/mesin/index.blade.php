@extends('layout/aplikasi')

@section('konten_mesin')

<h1>Tabel Mesin</h1>

<a href="/mesin/create" class="btn btn-primary">Tambah Data</a>
<table class="table">
    <thead>
        <tr>
            <th>Barcode Id</th>
            <th>Status Mesin</th>
            <th>Lokasi Mesin</th>
            <th>Tanggal Pencatatan</th>
            <th>Aksi</th>
        </tr>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->barcode_id }}</td>
                <td>{{ $item->status_mesin }}</td>
                <td>{{ $item->lokasi_mesin }}</td>
                <td>{{ $item->tanggal_pencatatan }}</td>
                <td>
                    <a class="btn btn-secondary btn-sm" href="{{ url('/mesin/'.$item->barcode_id) }}">Lihat Detail</a>
                    <a class="btn btn-warning btn-sm" href="{{ url('/mesin/'.$item->barcode_id.'/edit') }}">Edit</a>
                    <form onsubmit="return confirm('Anda yakin ingin menghapus data ini?')" class="d-inline" action="{{ '/mesin/'.$item->barcode_id }}" method="post">
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