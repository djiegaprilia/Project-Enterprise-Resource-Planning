<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SalesInvoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_invoice', function(Blueprint $table){
            $table->increments('id');
            $table->integer('invoice');
            $table->integer('idsalesorder');
            $table->string('businesspartner',50);
            $table->integer('total');
            $table->string('pajak');
            $table->date('invoicedate');
            $table->date('duedate');
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
