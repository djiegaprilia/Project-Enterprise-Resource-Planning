<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PesananPelanggan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan_pelanggan', function(Blueprint $table){
            $table->increments('id');
            $table->string('nama_barang', 50);
            $table->integer('jumlah');
            $table->double('harga');
            $table->date('tanggal_order');
            $table->string('tempat');
            $table->string('no_telp');
            $table->double('total_harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
