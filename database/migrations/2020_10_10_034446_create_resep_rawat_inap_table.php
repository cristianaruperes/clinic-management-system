<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResepRawatInapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resep_rawat_inap', function (Blueprint $table) {
            
            $table->increments('id');
            
            $table->integer('rekam_medis_id')->unsigned();  

            $table->string('alergi')->nullable();
            $table->string('keterangan_alergi')->nullable();
            $table->string('hamil')->nullable();
            $table->string('menyusui')->nullable();

            $table->timestamps();

            $table->foreign('rekam_medis_id')->references('id')->on('rawat_inap')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resep_rawat_inap');
    }
}
