@extends('layout/aplikasi')

@section('konten_merk_mesin')

<form method="post" action="/merk_mesin">
    @csrf
    <div class="mb-3">
        <label for="IdMerk" class="form-label">Nomor Id</label>
        <input type="text" class="form-control"  id="IdMerk" name="IdMerk" value="{{ Session::get('IdMerk') }}">
    </div>
    <div class="mb-3">
        <label for="nama_merk_mesin" class="form-label">Nama Merk Mesin</label>
        <input type="text" class="form-control"  id="nama_merk_mesin" name="nama_merk_mesin" value="{{ Session::get('nama_merk_mesin') }}">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@endsection