<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_stock', function (Blueprint $table) {
            
            $table->increments('id');
            
            $table->integer('medicine_id')->unsigned();
            $table->string('jumlah')->nullable();

            $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('cascade');
            
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
        Schema::dropIfExists('medicine_stock');
    }
}
