<?php

namespace App\Http\Controllers;

use App\Models\MerkMesin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MerkMesinController extends Controller
{
    public function index()
    {
        $data = MerkMesin::orderBy('id', 'asc')->paginate(2);
        return view('merk_mesin/index')->with('data', $data);
    }

    /////////////////////////////////////////////////////////////////////////////

        public function create()
        {
            return view('merk_mesin/create');
        }
    
        public function store(Request $request)
        {
            //agar field masih terisi
            Session::flash('IdMerk', $request->IdMerk);
            Session::flash('nama_merk_mesin', $request->nama_merk_mesin);
    
            $request->validate([
                'IdMerk' => 'required|numeric',
                'nama_merk_mesin' => 'required',
            ], [
                'IdMerk.numeric' => 'Id wajib diisi dengan angka',
                'IdMerk.required' => 'Id wajib diisi',
                'nama_merk_mesin.required' => 'Nama Merk Mesin wajib diisi',
            ]);
            $data = [
                'id' => $request->input('IdMerk'),
                'nama_merk_mesin' => $request->input('nama_merk_mesin'),
            ];
            MerkMesin::create($data);
            return redirect('merk_mesin')->with('success', 'Data berhasil dimasukkan');
        }
    
    /////////////////////////////////////////////////////////////////////////////
    
    public function show($id)
    {
        $data = MerkMesin::where('id', $id)->first();
        return view('merk_mesin/show')->with('data', $data);
    }

    /////////////////////////////////////////////////////////////////////////////

    public function edit($id)
    {
        $data = MerkMesin::where('id', $id)->first();
        return view('merk_mesin/edit')->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_merk_mesin' => 'required',
        ], [
            'nama_merk_mesin.required' => 'Nama Jenis Mesin wajib diisi',
        ]);
        $data = [
            'nama_merk_mesin' => $request->input('nama_merk_mesin'),
        ];
        MerkMesin::where('id', $id)->update($data);
        return redirect('merk_mesin')->with('success', 'Berhasil update data');
    }

    /////////////////////////////////////////////////////////////////////////////

    public function destroy($id)
    {
        MerkMesin::where('id', $id)->delete();
        return redirect('merk_mesin')->with('success', 'Berhasil menghapus data');
    }

}
