@extends('layout/aplikasi')

@section('konten_mutasi_mesin')

<form method="post" action="{{ '/mutasi_mesin/'.$data->id }}">
    <a class="btn btn-secondary" href="/mutasi_mesin">Kembali ke Daftar</a>
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="IdMutasi" class="form-label">Nomor Id</label>
        <input type="text" class="form-control"  id="IdMutasi" name="IdMutasi" value="{{ $data->id }}" disabled>
    </div>
    <div class="mb-3">
        <label for="tanggal_mutasi" class="form-label">Tanggal Mutasi</label>
        <input type="date" class="form-control" id="tanggal_mutasi" name="tanggal_mutasi" value="{{ $data->tanggal_mutasi }}">
    </div>
    <div class="mb-3">
        <label for="lokasi_asal" class="form-label">Lokasi Asal</label>
        <input type="text" class="form-control"  id="lokasi_asal" name="lokasi_asal" value="{{ $data->lokasi_asal }}">
    </div><div class="mb-3">
        <label for="lokasi_tujuan" class="form-label">Lokasi Tujuan</label>
        <input type="text" class="form-control"  id="lokasi_tujuan" name="lokasi_tujuan" value="{{ $data->lokasi_tujuan }}">
    </div>
    <button type="submit" class="btn btn-primary">Update Data</button>
</form>

@endsection
