@extends('layout/aplikasi')

@section('konten_jenis_mesin')

    <form method="post" action="{{ '/jenis_mesin/'.$data->id }}">
        <a class="btn btn-secondary" href="/jenis_mesin">Kembali ke Daftar</a>
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="IdJenis" class="form-label">Nomor Id</label>
            <input type="text" class="form-control"  id="IdJenis" name="idJenis" value="{{ $data->id }}" disabled>
        </div>
        <div class="mb-3">
            <label for="nama_jenis_mesin" class="form-label">Nama Jenis Mesin</label>
            <input type="text" class="form-control"  id="nama_jenis_mesin" name="nama_jenis_mesin" value="{{ $data->nama_jenis_mesin }}">
        </div>
        {{-- <div class="mb-3">
            <label for="total_mesin" class="form-label">Total Mesin</label>
            <input type="text" class="form-control" id="total_mesin" name="total_mesin" value="{{ $data->total_mesin }}">
        </div> --}}
        <button type="submit" class="btn btn-primary">Update Data</button>
    </form>

@endsection