<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {

            $table->increments('id');

            $table->string('patient_number')->unique();
            $table->string('name')->nullable();

            $table->string('id_card_number')->nullable();
            $table->string('id_card')->nullable();

            $table->string('patient_father_name')->nullable();

            $table->string('jalan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('residence')->nullable();

            $table->string('home_phone_number')->nullable();
            $table->string('handphone_phone_number')->nullable();
            $table->string('office_phone_number')->nullable();
            $table->string('fax_phone_number')->nullable();
            $table->string('wa_phone_number')->nullable();

            $table->string('golongan_darah')->nullable();
            $table->date('dateOfBirth')->nullable();
            $table->string('sex')->nullable();
            $table->string('marrital_status')->nullable();
            $table->string('religion')->nullable();

            $table->string('email')->nullable();
            $table->string('nationality')->nullable();
            $table->string('tribe')->nullable();
            $table->string('language')->nullable();
            $table->string('occupation')->nullable();
            $table->string('clinic_info')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
