<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditTanggalPembayaranRawatInap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rawat_inap', function (Blueprint $table) {
            $table->dateTime('tanggal_pembayaran')->nullable()->change();
            $table->dateTime('tanggal_keluar')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rawat_inap', function (Blueprint $table) {
            //
        });
    }
}
