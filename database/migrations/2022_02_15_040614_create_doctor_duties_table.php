<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorDutiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_duties', function (Blueprint $table) {
            $table->id();
            $table->text('date')->nullable();
            $table->text('time_id')->nullable();
            $table->text('doctor_id')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('doctor_duties');
    }
}
