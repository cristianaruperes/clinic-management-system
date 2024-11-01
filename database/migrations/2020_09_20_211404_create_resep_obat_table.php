<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResepObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resep_obat', function (Blueprint $table) {
            
            $table->increments('id');
            
            $table->integer('resep_id')->unsigned();  
            $table->integer('medicine_id')->unsigned();

            $table->string('dosis')->nullable();
            $table->integer('jumlah')->nullable();
            $table->integer('harga')->nullable();

            $table->timestamps();

            $table->foreign('resep_id')->references('id')->on('resep')->onDelete('cascade');
            $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resep_obat');
    }
}
