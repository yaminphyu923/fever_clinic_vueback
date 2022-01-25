<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deads', function (Blueprint $table) {
            $table->id();
            $table->text('patient_id')->nullable();
            $table->text('dead_time')->nullable();
            $table->text('cause')->nullable();
            $table->text('doctor_id')->nullable();
            $table->longText('note')->nullable();
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
        Schema::dropIfExists('deads');
    }
}
