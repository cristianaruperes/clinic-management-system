<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {

            $table->increments('id');
            
            $table->string('kode_item')->unique();
            $table->string('jenis_produk')->nullable();
            $table->string('nama')->nullable();
            $table->string('harga_jual')->nullable();
            $table->string('harga_beli')->nullable();
            $table->string('satuan')->nullable();
            $table->string('stok_minimal')->nullable();
            $table->string('stok_sisa')->nullable();
            $table->string('stok_terpakai')->nullable();
            $table->date('tanggal_expired')->nullable();

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
        Schema::dropIfExists('medicines');
    }
}
