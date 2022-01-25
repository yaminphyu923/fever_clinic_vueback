<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitoringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitorings', function (Blueprint $table) {
            $table->id();
            $table->text('patient_id')->nullable();
            $table->text('pr')->nullable();
            $table->text('crt')->nullable();
            $table->text('emergency')->nullable();
            $table->text('t')->nullable();
            $table->text('spo2')->nullable();
            $table->text('rbs')->nullable();
            $table->text('gcs')->nullable();
            $table->text('pupil')->nullable();
            $table->text('bp')->nullable();
            $table->text('urine')->nullable();
            $table->text('date')->nullable();
            $table->text('tx')->nullable();
            $table->text('pain_score')->nullable();
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
        Schema::dropIfExists('monitorings');
    }
}
