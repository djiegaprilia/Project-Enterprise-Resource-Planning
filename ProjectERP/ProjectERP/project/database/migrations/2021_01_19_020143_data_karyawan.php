<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataKaryawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_karyawans', function (Blueprint $table){
            $table->increments('id');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->integer('nip');
            $table->integer('no_hp');
            $table->string('agama');
            $table->string('alamat');
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
        Schema::dropIfExists('staff_hrms');
    }
}
