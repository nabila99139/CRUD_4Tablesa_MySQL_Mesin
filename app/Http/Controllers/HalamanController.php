<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    //
    function index(){
        // $judul = "Halaman Judul";
        $data = [
            'judul' => 'Ini adalah halaman index',
            'kontak' => [
                'email' => 'nabilamiss99@gmail.com',
                'alamat' => 'Pati'
            ]
            ];
        // return view("halaman/index")->with('judul', $judul);
        return view("halaman/index")->with($data);
    }
}

