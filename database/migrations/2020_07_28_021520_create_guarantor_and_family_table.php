<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuarantorAndFamilyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guarantor_and_family', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->string('name');
            $table->string('relation_with_patient')->nullable();

            $table->string('jalan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('residence')->nullable();

            $table->string('home_phone_number')->nullable();
            $table->string('office_phone_number')->nullable();
            $table->string('handphone_phone_number')->nullable();
            $table->string('fax_phone_number')->nullable();
            $table->string('wa_phone_number')->nullable();
            $table->string('assurance')->nullable();

            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guarantor_and_family');
    }
}
