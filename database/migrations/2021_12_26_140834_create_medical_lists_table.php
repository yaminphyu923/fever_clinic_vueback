<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_lists', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('quantity')->nullable();
            $table->text('in_date')->nullable();
            $table->text('out_date')->nullable();
            $table->text('out_quantity')->nullable();
            $table->text('last_stock_date')->nullable();
            $table->text('refill_date')->nullable();
            $table->text('refill_quantity')->nullable();
            $table->text('medical_category_id')->nullable();
            $table->text('remain')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('medical_lists');
    }
}
