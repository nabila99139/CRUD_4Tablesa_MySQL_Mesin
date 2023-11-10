@extends('layout/aplikasi')

@section('konten_mesin')

<form method="post" action="{{ '/mesin/'.$data->barcode_id }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="barcode_id" class="form-label">Barcode Id</label>
        <input type="text" class="form-control" id="barcode_id" name="barcode_id" value="{{ $data->barcode_id }}">
    </div>
    <div class="mb-3">
        <label for="status_mesin" class="form-label">Status Mesin</label>
        <select class="form-select" id="status_mesin" name="status_mesin">
            <option value="" selected disabled>Pilih Status Mesin</option>
            @foreach(['mesin baru', 'mesin dipakai', 'mesin rusak', 'mesin dijual'] as $status_option)
                <option value="{{ $status_option }}" @if($data->status_mesin == $status_option) selected @endif>{{ $status_option }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="lokasi_mesin" class="form-label">Lokasi Mesin</label>
        <input type="text" class="form-control" id="lokasi_mesin" name="lokasi_mesin" value="{{ $data->lokasi_mesin }}">
    </div>
    {{-- <div class="mb-3">
        <label for="tanggal_pencatatan" class="form-label">Tanggal Pencatatan</label>
        <input type="date" class="form-control" id="tanggal_pencatatan" name="tanggal_pencatatan" value="{{ $data->tanggal_pencatatan }}">
    </div> --}}
    <div class="mb-3">
        <label for="tanggal_pencatatan" class="form-label">Tanggal Pencatatan</label>
        <input type="date" class="form-control" id="tanggal_pencatatan" name="tanggal_pencatatan" value="{{ \Carbon\Carbon::parse($data->tanggal_pencatatan)->format('Y-m-d') }}">
    </div>    
    {{-- <div class="mb-3">
        <label for="jenis_mesin_id" class="form-label">Jenis Mesin</label>
        <select class="form-select" id="jenis_mesin_id" name="jenis_mesin_id">
            <option value="" selected disabled>Pilih Jenis Mesin</option>
            @foreach($jenis_mesin_options as $jenis_mesin)
                <option value="{{ $jenis_mesin->id }}">{{ $jenis_mesin->nama_jenis_mesin }}</option>
            @endforeach
        </select>
    </div> --}}
    <div class="mb-3">
        <label for="jenis_mesin_id" class="form-label">Id Jenis Mesin</label>
        <select class="form-select" id="jenis_mesin_id" name="jenis_mesin_id">
            <option value="" selected disabled>Pilih Jenis Mesin</option>
            @foreach($jenis_mesin_options as $jenis_mesin)
                {{-- <option value="{{ $jenis_mesin->id }}" @if($data->jenis_mesin_id == $jenis_mesin->id) selected @endif>{{ $jenis_mesin->nama_jenis_mesin }}</option> --}}
                <option value="{{ $jenis_mesin->id }}" @if($data->jenis_mesin_id == $jenis_mesin->id) selected @endif>{{ $jenis_mesin->id }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label for="merk_mesin_id" class="form-label">Id Merk Mesin</label>
        <select class="form-select" id="merk_mesin_id" name="merk_mesin_id">
            <option value="" selected disabled>Pilih Merk Mesin</option>
            @foreach($merk_mesin_options as $merk_mesin)
                {{-- <option value="{{ $merk_mesin->id }}" @if($data->merk_mesin_id == $merk_mesin->id) selected @endif>{{ $merk_mesin->nama_merk_mesin }}</option> --}}
                <option value="{{ $merk_mesin->id }}" @if($data->merk_mesin_id == $merk_mesin->id) selected @endif>{{ $merk_mesin->id }}</option>
                @endforeach
        </select>
    </div>

    {{-- <div class="mb-3">
        <label for="merk_mesin_id" class="form-label">Merk Mesin</label>
        <select class="form-select" id="merk_mesin_id" name="merk_mesin_id">
            <option value="" selected disabled>Pilih Merk Mesin</option>
            @foreach($merk_mesin_options as $merk_mesin)
                <option value="{{ $merk_mesin->id }}" @if($data->merk_mesin_id == $merk_mesin->id) selected @endif>{{ $merk_mesin->nama_merk_mesin }}</option>
            @endforeach
        </select>
    </div> --}}

    <div class="mb-3">
        <label for="mutasi_mesin_id" class="form-label">Id Mutasi Mesin</label>
        <select class="form-select" id="mutasi_mesin_id" name="mutasi_mesin_id">
            <option value="" selected disabled>Pilih Mutasi Mesin</option>
            @foreach($mutasi_mesin_options as $mutasi_mesin)
                {{-- <option value="{{ $mutasi_mesin->id }}" @if($data->merk_mesin_id == $mutasi_mesin->id) selected @endif>{{ $mutasi_mesin->tanggal_mutasi }}</option> --}}
                <option value="{{ $mutasi_mesin->id }}" @if($data->merk_mesin_id == $mutasi_mesin->id) selected @endif>{{ $mutasi_mesin->id }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@endsection
