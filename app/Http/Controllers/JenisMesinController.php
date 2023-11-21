<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisMesin;
use Illuminate\Support\Facades\Session;


class JenisMesinController extends Controller
{
    public function index()
    {
        $data = JenisMesin::orderBy('id', 'asc')->paginate(2);
        return view('jenis_mesin/index')->with('data', $data);
    }

    /////////////////////////////////////////////////////////////////////////////

    public function create()
    {
        return view('jenis_mesin/create');
    }

    public function store(Request $request)
    {
        //agar field masih terisi
        Session::flash('idJenis', $request->idJenis);
        Session::flash('nama_jenis_mesin', $request->nama_jenis_mesin);
        Session::flash('total_mesin', $request->total_mesin);

        $request->validate([
            'idJenis' => 'required|numeric',
            'nama_jenis_mesin' => 'required',
            // 'total_mesin' => 'required|numeric'
        ], [
            'idJenis.numeric' => 'Id wajib diisi dengan angka',
            'idJenis.required' => 'Id wajib diisi',
            'nama_jenis_mesin.required' => 'Nama Jenis Mesin wajib diisi',
            // 'total_mesin.numeric' => 'Total Mesin wajib diisi dengan angka',
            // 'total_mesin.required' => 'Total Mesin wajib diisi'
        ]);
        $data = [
            'id' => $request->input('idJenis'),
            'nama_jenis_mesin' => $request->input('nama_jenis_mesin'),
            // 'total_mesin' => $request->input('total_mesin')
        ];
        JenisMesin::create($data);
        return redirect('jenis_mesin')->with('success', 'Data berhasil dimasukkan');
    }

    /////////////////////////////////////////////////////////////////////////////

    public function show($id)
    {
        $data = JenisMesin::where('id', $id)->first();
        return view('jenis_mesin/show')->with('data', $data);
    }

    /////////////////////////////////////////////////////////////////////////////

    public function edit($id)
    {
        $data = JenisMesin::where('id', $id)->first();
        return view('jenis_mesin/edit')->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jenis_mesin' => 'required',
            // 'total_mesin' => 'required|numeric'
        ], [
            'nama_jenis_mesin.required' => 'Nama Jenis Mesin wajib diisi',
            // 'total_mesin.numeric' => 'Total Mesin wajib diisi dengan angka',
            // 'total_mesin.required' => 'Total Mesin wajib diisi'
        ]);
        $data = [
            'nama_jenis_mesin' => $request->input('nama_jenis_mesin'),
            // 'total_mesin' => $request->input('total_mesin')
        ];
        JenisMesin::where('id', $id)->update($data);
        return redirect('jenis_mesin')->with('success', 'Berhasil update data');
    }

    /////////////////////////////////////////////////////////////////////////////

    public function destroy($id)
    {
        JenisMesin::where('id', $id)->delete();
        return redirect('jenis_mesin')->with('success', 'Berhasil menghapus data');
    }
}
