<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Penjualan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function(Blueprint $table){
        $table->increments('id');
        $table->string('nama_barang', 50);
        $table->integer('jumlah');
        $table->double('harga');
        $table->date('tanggal_jual');
        $table->double('total_harga');
        $table->double('info_jual');
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
