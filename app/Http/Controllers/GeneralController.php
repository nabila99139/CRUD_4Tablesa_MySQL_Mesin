<?php

namespace App\Http\Controllers;

use App\Models\Mesin;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    function index(Request $request)
    {
        // $data = Mesin::select('mesin.barcode_id', 'mesin.lokasi_mesin', 'mesin.status_mesin', 'mesin.tanggal_pencatatan', 'jenis_mesin.nama_jenis_mesin', 'merk_mesin.nama_merk_mesin', 'mutasi_mesin.tanggal_mutasi', 'mutasi_mesin.lokasi_asal', 'mutasi_mesin.lokasi_tujuan')
        //     ->select('mesin.barcode_id', 'mesin.lokasi_mesin', 'mesin.status_mesin', 'mesin.tanggal_pencatatan', 'jenis_mesin.nama_jenis_mesin', 'merk_mesin.nama_merk_mesin', 'mutasi_mesin.tanggal_mutasi', 'mutasi_mesin.lokasi_asal', 'mutasi_mesin.lokasi_tujuan')
        //     ->leftJoin('jenis_mesin', 'mesin.jenis_mesin_id', '=', 'jenis_mesin.id')
        //     ->leftJoin('merk_mesin', 'mesin.merk_mesin_id', '=', 'merk_mesin.id')
        //     ->leftJoin('mutasi_mesin', 'mesin.mutasi_mesin_id', '=', 'mutasi_mesin.id')
        //     ->orderBy('mesin.barcode_id', 'asc')
        //     ->paginate(3);

        // return view('general/index')->with('data', $data);

        $query = Mesin::select(
            'mesin.barcode_id',
            'mesin.lokasi_mesin',
            'mesin.status_mesin',
            'mesin.tanggal_pencatatan',
            'jenis_mesin.nama_jenis_mesin',
            'merk_mesin.nama_merk_mesin',
            'mutasi_mesin.tanggal_mutasi',
            'mutasi_mesin.lokasi_asal',
            'mutasi_mesin.lokasi_tujuan'
        )
            ->leftJoin('jenis_mesin', 'mesin.jenis_mesin_id', '=', 'jenis_mesin.id')
            ->leftJoin('merk_mesin', 'mesin.merk_mesin_id', '=', 'merk_mesin.id')
            ->leftJoin('mutasi_mesin', 'mesin.mutasi_mesin_id', '=', 'mutasi_mesin.id')
            ->orderBy('mesin.barcode_id', 'asc');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('mesin.barcode_id', 'LIKE', "%$search%")
                    ->orWhere('jenis_mesin.nama_jenis_mesin', 'LIKE', "%$search%")
                    ->orWhere('merk_mesin.nama_merk_mesin', 'LIKE', "%$search%")
                    ->orWhere('mutasi_mesin.lokasi_asal', 'LIKE', "%$search%")
                    ->orWhere('mutasi_mesin.lokasi_tujuan', 'LIKE', "%$search%")
                    ->orWhere('mesin.status_mesin', 'LIKE', "%$search%");
            });
        }

        $data = $query->paginate(3);

        return view('general/index')->with('data', $data);
    }

    function show($id)
    {
        // return "<h1>Saya adalah Siswa dari Controller dengan ID: $id</h1>";
        $data = Mesin::where('barcode_id', $id)->first();
        return view('general/show')->with('data', $data);
    }
}
