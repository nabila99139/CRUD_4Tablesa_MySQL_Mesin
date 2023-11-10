<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisMesin extends Model
{
    use HasFactory;

    protected $table = "jenis_mesin";
    protected $fillable = ['id', 'nama_jenis_mesin', 'total_mesin'];

}
