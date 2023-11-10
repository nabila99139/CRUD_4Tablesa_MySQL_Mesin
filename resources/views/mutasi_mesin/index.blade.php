@extends('layout/aplikasi')

@section('konten_mutasi_mesin')

<h1>Tabel Mutasi Mesin</h1>

<a href="/mutasi_mesin/create" class="btn btn-primary">Tambah Data</a>

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Tanggal Mutasi</th>
            <th>Lokasi Asal</th>
            <th>Lokasi Tujuan</th>
            <th>Aksi</th>
        </tr>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->tanggal_mutasi }}</td>
                <td>{{ $item->lokasi_asal }}</td>
                <td>{{ $item->lokasi_tujuan }}</td>
                <td>
                    <a class="btn btn-secondary btn-sm" href="{{ url('/mutasi_mesin/'.$item->id) }}">Lihat Detail</a>
                    <a class="btn btn-warning btn-sm" href="{{ url('/mutasi_mesin/'.$item->id.'/edit') }}">Edit</a>
                    <form onsubmit="return confirm('Anda yakin ingin menghapus data ini?')" class="d-inline" action="{{ '/mutasi_mesin/'.$item->id }}" method="post">
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
