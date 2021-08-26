<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RekrutPegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekrut_pegawais', function (Blueprint $table){
            $table->increments('id');
            $table->string('nama_pegawai');
            $table->string('jenis_kelamin');
            $table->integer('no_hp');
            $table->string('agama');
            $table->string('alamat');
            $table->string('pendidikan');
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
