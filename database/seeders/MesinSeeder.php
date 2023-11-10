<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MesinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //nama table
        DB::table('mesin')->insert([
            'barcode_id' => 1,
            'jenis_mesin_id' => 1, // Gantilah dengan ID jenis mesin yang sesuai
            'merk_mesin_id' => 1, // Gantilah dengan ID merk mesin yang sesuai
            'status_mesin' => 'mesin_baru',
            'lokasi_mesin' => 'Lokasi Awal',
            'Tanggal_pencatatan' => date('Y-m-d H:i:s'), // Tanggal saat ini
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
