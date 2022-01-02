<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagings', function (Blueprint $table) {
            $table->id();
            $table->text('patient_id')->nullable();
            $table->text('doctor_id')->nullable();
            $table->text('date_requested')->nullable();
            $table->text('date_analysis')->nullable();
            $table->text('image1')->nullable();
            $table->text('image2')->nullable();
            $table->text('image3')->nullable();
            $table->text('image4')->nullable();
            $table->text('image5')->nullable();
            $table->text('image6')->nullable();
            $table->text('analysis')->nullable();
            $table->text('conclusion')->nullable();
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
        Schema::dropIfExists('imagings');
    }
}
