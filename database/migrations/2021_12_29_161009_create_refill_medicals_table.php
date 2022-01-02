<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefillMedicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refill_medicals', function (Blueprint $table) {
            $table->id();
            $table->text('refill_date')->nullable();
            $table->text('refill_quantity')->nullable();
            $table->longText('note')->nullable();
            $table->text('doctor_id')->nullable();
            $table->text('medical_list_id')->nullable();
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
        Schema::dropIfExists('refill_medicals');
    }
}
