<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesin', function (Blueprint $table) {
            $table->id('barcode_id');

            $table->unsignedBigInteger('jenis_mesin_id');
            $table->unsignedBigInteger('merk_mesin_id');
            $table->unsignedBigInteger('mutasi_mesin_id');

            $table->enum('status_mesin', ['mesin_baru', 'mesin_dipakai', 'mesin_rusak', 'mesin_dijual']);
            $table->string('lokasi_mesin');
            $table->timestamp('tanggal_pencatatan');
            
            $table->foreign('jenis_mesin_id')->references('id')->on('jenis_mesin');
            $table->foreign('merk_mesin_id')->references('id')->on('merk_mesin');
            $table->foreign('mutasi_mesin_id')->references('id')->on('mutasi_mesin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mesin');
    }
};
