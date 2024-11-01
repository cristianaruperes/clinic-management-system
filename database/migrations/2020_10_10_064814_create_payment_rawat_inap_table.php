<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentRawatInapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_rawat_inap', function (Blueprint $table) {
            
            $table->increments('id');
            
            $table->integer('rekam_medis_id')->unsigned();
            $table->integer('service_id')->unsigned();

            $table->timestamps();

            $table->foreign('rekam_medis_id')->references('id')->on('rawat_inap')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_rawat_inap');
    }
}
