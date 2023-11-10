<?php

namespace App\Http\Controllers;

use App\Models\MutasiMesin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MutasiMesinController extends Controller
{
    public function index()
    {
        $data = MutasiMesin::orderBy('id', 'asc')->paginate(2);
        return view('mutasi_mesin/index')->with('data', $data);
    }

    /////////////////////////////////////////////////////////////////////////////

    public function create()
    {
        return view('mutasi_mesin/create');
    }

    public function store(Request $request)
    {
        //agar field masih terisi
        Session::flash('IdMutasi', $request->IdMutasi);
        Session::flash('tanggal_mutasi', $request->tanggal_mutasi);
        Session::flash('lokasi_asal', $request->lokasi_asal);
        Session::flash('lokasi_tujuan', $request->lokasi_tujuan);

        $request->validate([
            'IdMutasi' => 'required|numeric',
            'tanggal_mutasi' => 'required',
            'lokasi_asal' => 'required',
            'lokasi_tujuan' => 'required'
        ], [
            'IdMutasi.numeric' => 'Id wajib diisi dengan angka',
            'IdMutasi.required' => 'Id wajib diisi',
            'tanggal_mutasi.required' => 'Tanggal Mutasi wajib diisi',
            'lokasi_asal.required' => 'Lokasi Asal wajib diisi',
            'lokasi_tujuan.required' => 'Lokasi Tujuan wajib diisi',
        ]);
        $data = [
            'id' => $request->input('IdMutasi'),
            'tanggal_mutasi' => $request->input('tanggal_mutasi'),
            'lokasi_asal' => $request->input('lokasi_asal'),
            'lokasi_tujuan' => $request->input('lokasi_tujuan'),
        ];
        MutasiMesin::create($data);
        return redirect('mutasi_mesin')->with('success', 'Data berhasil dimasukkan');
    }

    /////////////////////////////////////////////////////////////////////////////

    public function show($id)
    {
        $data = MutasiMesin::where('id', $id)->first();
        return view('mutasi_mesin/show')->with('data', $data);
    }

    /////////////////////////////////////////////////////////////////////////////

    public function edit($id)
    {
        $data = MutasiMesin::where('id', $id)->first();
        return view('mutasi_mesin/edit')->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_mutasi' => 'required',
            'lokasi_asal' => 'required',
            'lokasi_tujuan' => 'required'
        ], [
            'tanggal_mutasi.required' => 'Tanggal Mutasi wajib diisi',
            'lokasi_asal.required' => 'Lokasi Asal wajib diisi',
            'lokasi_tujuan.required' => 'Lokasi Tujuan wajib diisi',
        ]);
        $data = [
            'tanggal_mutasi' => $request->input('tanggal_mutasi'),
            'lokasi_asal' => $request->input('lokasi_asal'),
            'lokasi_tujuan' => $request->input('lokasi_tujuan'),
        ];
        MutasiMesin::where('id', $id)->update($data);
        return redirect('mutasi_mesin')->with('success', 'Berhasil update data');
    }

    /////////////////////////////////////////////////////////////////////////////

    public function destroy($id)
    {
        MutasiMesin::where('id', $id)->delete();
        return redirect('mutasi_mesin')->with('success', 'Berhasil menghapus data');
    }
}
