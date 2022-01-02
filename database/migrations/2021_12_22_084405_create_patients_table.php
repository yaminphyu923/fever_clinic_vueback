<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("gender")->nullable();
            $table->string("age")->nullable();
            $table->string("dob")->nullable();
            $table->string("nrc")->nullable();
            $table->string("phone")->nullable();
            $table->string("address")->nullable();
            $table->string("nextKin")->nullable();
            $table->string("attendent")->nullable();
            $table->string("occupation")->nullable();
            $table->string("symptoms")->nullable();
            $table->string("travelHistory")->nullable();
            $table->string("remark")->nullable();
            $table->string("date")->nullable();
            $table->string("user_id")->nullable();
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
        Schema::dropIfExists('patients');
    }
}
