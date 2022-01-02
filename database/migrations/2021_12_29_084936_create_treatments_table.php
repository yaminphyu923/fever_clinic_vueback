<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->text('patient_id')->nullable();
            $table->longText('note')->nullable();
            $table->text('doctor_id')->nullable();
            $table->text('pharmacy')->nullable();
            $table->text('pre_date')->nullable();
            $table->text('queue')->nullable();
            $table->text('medical_list_id')->nullable();
            $table->text('dose')->nullable();
            $table->text('frequency')->nullable();
            $table->text('start_date')->nullable();
            $table->text('end_date')->nullable();
            $table->longText('remark')->nullable();
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
        Schema::dropIfExists('treatments');
    }
}
