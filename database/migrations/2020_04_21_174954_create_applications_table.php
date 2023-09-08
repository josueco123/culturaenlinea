<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('user_type_id');
            $table->unsignedBigInteger('incentive_id');
            $table->unsignedBigInteger('status_type_id');
            $table->unsignedBigInteger('call_id');
            $table->string('code');
            $table->Integer('step');

            $table->foreign('call_id')->references('id')->on('calls')->onDelete('cascade');
            $table->foreign('incentive_id')->references('id')->on('incentives')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_type_id')->references('id')->on('user_types')->onDelete('cascade');
            $table->foreign('status_type_id')->references('id')->on('status_types')->onDelete('cascade');
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
        Schema::dropIfExists('applications');
    }
}
