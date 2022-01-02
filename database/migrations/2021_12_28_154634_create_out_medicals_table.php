<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutMedicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('out_medicals', function (Blueprint $table) {
            $table->id();
            $table->text('out_date')->nullable();
            $table->text('out_quantity')->nullable();
            $table->longText('note')->nullable();
            $table->text('approve_doctor')->nullable();
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
        Schema::dropIfExists('out_medicals');
    }
}
