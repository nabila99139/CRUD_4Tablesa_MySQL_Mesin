<?php

namespace App\Http\Controllers;

use App\Models\JenisMesin;
use App\Models\MerkMesin;
use App\Models\Mesin;
use App\Models\MutasiMesin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class mesinCE_Controller extends Controller
{
    public function index()
    {
        $data = Mesin::orderBy('barcode_id', 'asc')->paginate(2);
        return view('mesinCE/index')->with('data', $data);
    }

    /////////////////////////////////////////////////////////////////////////////

    public function create()
    {
        $jenis_mesin_options = JenisMesin::all();
        $merk_mesin_options = MerkMesin::all();
        $mutasi_mesin_options = MutasiMesin::all();

        return view('mesinCE.create', [
            'jenis_mesin_options' => $jenis_mesin_options,
            'merk_mesin_options' => $merk_mesin_options,
            'mutasi_mesin_options' => $mutasi_mesin_options,
        ]);
    }

    public function store(Request $request)
    {
        Session::flash('barcode_id', $request->barcode_id);
        Session::flash('status_mesin', $request->status_mesin);
        Session::flash('lokasi_mesin', $request->lokasi_mesin);
        Session::flash('tanggal_pencatatan', $request->tanggal_pencatatan);

        $request->validate([
            'barcode_id' => 'required|numeric',
            'status_mesin' => 'required',
            'lokasi_mesin' => 'required',
            'tanggal_pencatatan' => 'required',
            'jenis_mesin_id' => 'required|numeric',
            'merk_mesin_id' => 'required|numeric',
            'mutasi_mesin_id' => 'required|numeric',
        ], [
            'barcode_id.numeric' => 'Barcode Id wajib diisi dengan angka',
            'barcode_id.required' => 'Barcode Id wajib diisi',
            'status_mesin.required' => 'Status Mesin wajib diisi',
            'lokasi_mesin.required' => 'Lokasi Mesin wajib diisi',
            'tanggal_pencatatan.required' => 'Tanggal Pencatatan wajib diisi',
            'jenis_mesin_id.required' => 'Jenis Mesin wajib diisi',
            'jenis_mesin_id.numeric' => 'Jenis Mesin wajib diisi dengan angka',
            'merk_mesin_id.required' => 'Merk Mesin wajib diisi',
            'merk_mesin_id.numeric' => 'Merk Mesin wajib diisi dengan angka',
            'mutasi_mesin_id.required' => 'Mutasi Mesin wajib diisi',
            'mutasi_mesin_id.numeric' => 'Mutasi Mesin wajib diisi dengan angka',
        ]);

        $data = [
            'barcode_id' => $request->input('barcode_id'),
            'status_mesin' => $request->input('status_mesin'),
            'lokasi_mesin' => $request->input('lokasi_mesin'),
            'tanggal_pencatatan' => $request->input('tanggal_pencatatan'),
            'jenis_mesin_id' => $request->input('jenis_mesin_id'),
            'merk_mesin_id' => $request->input('merk_mesin_id'),
            'mutasi_mesin_id' => $request->input('mutasi_mesin_id'),
        ];

        Mesin::create($data);
        return redirect('mesinCE')->with('success', 'Data berhasil dimasukkan');
    }


    /////////////////////////////////////////////////////////////////////////////


    public function show($id)
    {
        $data = Mesin::where('barcode_id', $id)->first();
        return view('mesinCE/show')->with('data', $data);
    }

    /////////////////////////////////////////////////////////////////////////////

    public function edit($id)
    {
        $data = Mesin::where('barcode_id', $id)->first();
        $jenis_mesin_options = JenisMesin::all();
        $merk_mesin_options = MerkMesin::all();
        $mutasi_mesin_options = MutasiMesin::all();

        return view('mesinCE/edit', compact('data', 'jenis_mesin_options', 'merk_mesin_options', 'mutasi_mesin_options'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'barcode_id' => 'required|numeric',
            'status_mesin' => 'required',
            'lokasi_mesin' => 'required',
            'tanggal_pencatatan' => 'required',
            'jenis_mesin_id' => 'required|numeric',
            'merk_mesin_id' => 'required|numeric',
            'mutasi_mesin_id' => 'required|numeric',
        ], [
            'barcode_id.numeric' => 'Barcode Id wajib diisi dengan angka',
            'barcode_id.required' => 'Barcode Id wajib diisi',
            'status_mesin.required' => 'Status Mesin wajib diisi',
            'lokasi_mesin.required' => 'Lokasi Mesin wajib diisi',
            'tanggal_pencatatan.required' => 'Tanggal Pencatatan wajib diisi',
            'jenis_mesin_id.required' => 'Jenis Mesin wajib diisi',
            'jenis_mesin_id.numeric' => 'Jenis Mesin wajib diisi dengan angka',
            'merk_mesin_id.required' => 'Merk Mesin wajib diisi',
            'merk_mesin_id.numeric' => 'Merk Mesin wajib diisi dengan angka',
            'mutasi_mesin_id.required' => 'Mutasi Mesin wajib diisi',
            'mutasi_mesin_id.numeric' => 'Mutasi Mesin wajib diisi dengan angka',
        ]);
        $data = [
            'barcode_id' => $request->input('barcode_id'),
            'status_mesin' => $request->input('status_mesin'),
            'lokasi_mesin' => $request->input('lokasi_mesin'),
            'tanggal_pencatatan' => $request->input('tanggal_pencatatan'),
            'jenis_mesin_id' => $request->input('jenis_mesin_id'),
            'merk_mesin_id' => $request->input('merk_mesin_id'),
            'mutasi_mesin_id' => $request->input('mutasi_mesin_id'),

        ];
        Mesin::where('barcode_id', $id)->update($data);
        return redirect('mesinCE')->with('success', 'Berhasil update data');
    }

    /////////////////////////////////////////////////////////////////////////////

    public function destroy($id)
    {
        
    }
}
