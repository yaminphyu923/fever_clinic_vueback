<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestigationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigations', function (Blueprint $table) {
            $table->id();
            $table->text('patient_id')->nullable();
            $table->text('doctor_id')->nullable();
            $table->text('date_requested')->nulllable();
            $table->text('date_analysis')->nulllable();
            $table->text('doctor_test')->nullable();
            $table->text('queue')->nullable();
            $table->text('image')->nullable();
            $table->text('exam_request')->nullable();
            $table->text('note')->nullable();
            $table->text('value')->nullable();
            $table->text('remark')->nullable();
            $table->text('lab_name')->nullable();
            $table->text('lab_unit')->nullable();
            $table->text('lab_range')->nullable();
            $table->text('group_id')->nullable();
            $table->text('labcategory_id')->nullable();
            $table->text('user_id')->nulllable();
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
        Schema::dropIfExists('investigations');
    }
}
