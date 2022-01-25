<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDischargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discharges', function (Blueprint $table) {
            $table->id();
            $table->text('patient_id')->nullable();
            $table->text('time')->nullable();
            $table->text('place')->nullable();
            $table->text('opd')->nullable();
            $table->text('admission')->nullable();
            $table->longText('refer_to')->nullable();
            $table->text('pr')->nullable();
            $table->text('spo2')->nullable();
            $table->text('bp')->nullable();
            $table->text('gcs')->nullable();
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
        Schema::dropIfExists('discharges');
    }
}
