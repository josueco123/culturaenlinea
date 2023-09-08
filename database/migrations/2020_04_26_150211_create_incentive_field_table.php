<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncentiveFieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incentive_field', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('incentive_id');
            $table->unsignedBigInteger('field_id');
            $table->timestamps();

            $table->foreign('incentive_id')->references('id')->on('incentives')->onDelete('cascade');
            $table->foreign('field_id')->references('id')->on('fields')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incentive_field');
    }
}
