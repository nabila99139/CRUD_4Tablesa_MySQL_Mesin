<?php

namespace App\Http\Controllers;

use App\Models\mesin;
use App\Models\MesinModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MesinController extends Controller
{
    //
    // function index(){
    //     // $data = mesin::all();
    //     $data = mesin::orderBy('barcode_id', 'asc')->paginate(1);
    //     return view('mesin/mesin')->with('data', $data);
    // } 

    // function index(){
    //     $data = DB::table('mesin')
    //         ->select('mesin.barcode_id', 'mesin.lokasi_mesin', 'mesin.Tanggal_pencatatan', 'jenis_mesin.nama_jenis_mesin', 'jenis_mesin.total_mesin')
    //         ->leftJoin('jenis_mesin', 'mesin.jenis_mesin_id', '=', 'jenis_mesin.id')
    //         ->orderBy('mesin.barcode_id', 'asc')
    //         ->paginate(1);
    
    //     return view('mesin/mesin')->with('data', $data);
    // }
    
    // function index(){
    //     $data = mesin::select('mesin.barcode_id', 'mesin.lokasi_mesin', 'mesin.Tanggal_pencatatan', 'jenis_mesin.nama_jenis_mesin', 'merk_mesin.nama_merk_mesin', 'mutasi_mesin.tanggal_mutasi', 'mutasi_mesin.lokasi_asal', 'mutasi_mesin.lokasi_tujuan')
    //         ->select('mesin.barcode_id', 'mesin.lokasi_mesin', 'mesin.Tanggal_pencatatan', 'jenis_mesin.nama_jenis_mesin', 'merk_mesin.nama_merk_mesin', 'mutasi_mesin.tanggal_mutasi', 'mutasi_mesin.lokasi_asal', 'mutasi_mesin.lokasi_tujuan')
    //         ->leftJoin('jenis_mesin', 'mesin.jenis_mesin_id', '=', 'jenis_mesin.id')
    //         ->leftJoin('merk_mesin', 'mesin.merk_mesin_id', '=', 'merk_mesin.id')
    //         ->leftJoin('mutasi_mesin', 'mesin.mutasi_mesin_id', '=', 'mutasi_mesin.id')
    //         ->orderBy('mesin.barcode_id', 'asc')
    //         ->paginate(1);
    
    //     return view('mesin/mesin')->with('data', $data);
    // } 

    // function detail($id){
    //     // return "<h1>Saya adalah Siswa dari Controller dengan ID: $id</h1>";
    //     $data = mesin::where('barcode_id', $id)->first();
    //     return view('mesin/detail')->with('data', $data);
    // }
}
