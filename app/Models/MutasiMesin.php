<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MutasiMesin extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "mutasi_mesin";
    protected $fillable = ['id', 'tanggal_mutasi', 'lokasi_asal', 'lokasi_tujuan'];
}
