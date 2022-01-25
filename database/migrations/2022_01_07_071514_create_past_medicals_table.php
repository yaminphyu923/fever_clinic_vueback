<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePastMedicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('past_medicals', function (Blueprint $table) {
            $table->id();
            $table->text('patient_id')->nullable();
            $table->longText('dm')->nullable();
            $table->longText('ht')->nullable();
            $table->longText('ihd')->nullable();
            $table->longText('stroke')->nullable();
            $table->longText('renal')->nullable();
            $table->longText('liver')->nullable();
            $table->longText('bleeding')->nullable();
            $table->text('como')->nullable();
            $table->longText('comobidity')->nullable();
            $table->longText('past')->nullable();
            $table->longText('drug')->nullable();
            $table->longText('drug_allergy')->nullable();
            $table->longText('last_meal')->nullable();
            $table->longText('smoking')->nullable();
            $table->longText('alcohol')->nullable();
            $table->longText('pregnancy')->nullable();
            $table->longText('recent_drugs')->nullable();
            $table->longText('regular_drugs')->nullable();
            $table->longText('medication')->nullable();
            $table->longText('system_enquery')->nullable();
            $table->longText('pre_hospital')->nullable();
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
        Schema::dropIfExists('past_medicals');
    }
}
