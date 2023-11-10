@extends('layout/aplikasi')

@section('konten_merk_mesin')

<h1>Tabel Merk Mesin</h1>

<a href="/merk_mesin/create" class="btn btn-primary">Tambah Data</a>
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
                <td>{{ $item->nama_merk_mesin }}</td>
                <td>
                    <a class="btn btn-secondary btn-sm" href="{{ url('/merk_mesin/'.$item->id) }}">Lihat Detail</a>
                    <a class="btn btn-warning btn-sm" href="{{ url('/merk_mesin/'.$item->id.'/edit') }}">Edit</a>
                    <form onsubmit="return confirm('Anda yakin ingin menghapus data ini?')" class="d-inline" action="{{ '/merk_mesin/'.$item->id }}" method="post">
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