<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhyExaminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phy_examinations', function (Blueprint $table) {
            $table->id();
            $table->text('patient_id')->nullable();
            $table->text('temperature')->nullable();
            $table->longText('ecg')->nullable();
            $table->longText('rbs')->nullable();
            $table->text('spo2')->nullable();
            $table->text('bp')->nullable();
            $table->text('pr')->nullable();
            $table->text('rr')->nullable();
            $table->text('well_orientated')->nullable();
            $table->text('pain')->nullable();
            $table->text('voice')->nullable();
            $table->text('no_response')->nullable();
            $table->longText('general')->nullable();
            $table->longText('head_neck')->nullable();
            $table->longText('chest')->nullable();
            $table->longText('abdomen_pelvic')->nullable();
            $table->longText('spine')->nullable();
            $table->longText('upper_right')->nullable();
            $table->longText('upper_left')->nullable();
            $table->longText('lower_right')->nullable();
            $table->longText('lower_left')->nullable();
            $table->text('refer_case')->nullable();
            $table->longText('other')->nullable();
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
        Schema::dropIfExists('phy_examinations');
    }
}
