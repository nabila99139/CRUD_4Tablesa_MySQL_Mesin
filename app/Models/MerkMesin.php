<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerkMesin extends Model
{
    use HasFactory;

    protected $table = "merk_mesin";
    protected $fillable = ['id', 'nama_merk_mesin'];

}
