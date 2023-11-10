@extends('layout/aplikasi')

@section('konten_mutasi_mesin')

<form method="post" action="/mutasi_mesin">
    @csrf
    <div class="mb-3">
        <label for="IdMutasi" class="form-label">Nomor Id</label>
        <input type="text" class="form-control"  id="IdMutasi" name="IdMutasi" value="{{ Session::get('IdMutasi') }}">
    </div>
    <div class="mb-3">
        <label for="tanggal_mutasi" class="form-label">Tanggal Mutasi</label>
        <input type="date" class="form-control" id="tanggal_mutasi" name="tanggal_mutasi" value="{{ Session::get('tanggal_mutasi') }}">
    </div>
    <div class="mb-3">
        <label for="lokasi_asal" class="form-label">Lokasi Asal</label>
        <input type="text" class="form-control"  id="lokasi_asal" name="lokasi_asal" value="{{ Session::get('lokasi_asal') }}">
    </div><div class="mb-3">
        <label for="lokasi_tujuan" class="form-label">Lokasi Tujuan</label>
        <input type="text" class="form-control"  id="lokasi_tujuan" name="lokasi_tujuan" value="{{ Session::get('lokasi_tujuan') }}">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>


@endsection
