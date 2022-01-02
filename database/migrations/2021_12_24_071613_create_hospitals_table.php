<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->text('patient_id')->nullable();
            $table->text('date')->nullable();
            $table->text('admission')->nullable();
            $table->text('bed_id')->nullable();
            $table->text('doctor_multiple_id')->nullable();
            $table->text('doctor_incharge_id')->nullable();
            $table->text('police_case')->nullable();
            $table->text('fever')->nullable();
            $table->text('sore_throat')->nullable();
            $table->text('chills')->nullable();
            $table->text('shaking_chills')->nullable();
            $table->text('taste_smell')->nullable();
            $table->text('malaise')->nullable();
            $table->text('odema')->nullable();
            $table->text('date_onset')->nullable();
            $table->text('date_covid')->nullable();
            $table->text('refer_to')->nullable();
            $table->longText('others')->nullable();
            $table->text('user_id')->nullable();
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
        Schema::dropIfExists('hospitals');
    }
}
