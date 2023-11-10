@extends('layout/aplikasi')

@section('konten_merk_mesin')

<form method="post" action="{{ '/merk_mesin/'.$data->id }}">
    <a class="btn btn-secondary" href="/jenis_mesin">Kembali ke Daftar</a>
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="IdMerk" class="form-label">Nomor Id</label>
        <input type="text" class="form-control"  id="IdMerk" name="IdMerk" value="{{ $data->id }}" disabled>
    </div>
    <div class="mb-3">
        <label for="nama_merk_mesin" class="form-label">Nama Merk Mesin</label>
        <input type="text" class="form-control"  id="nama_merk_mesin" name="nama_merk_mesin" value="{{ $data->nama_merk_mesin }}">
    </div>
    <button type="submit" class="btn btn-primary">Update Data</button>
</form>

@endsection