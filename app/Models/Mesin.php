<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesin extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "mesin";
    protected $fillable = ['barcode_id', 'jenis_mesin_id', 'merk_mesin_id', 'mutasi_mesin_id', 'status_mesin', 'lokasi_mesin', 'tanggal_pencatatan'];

}
