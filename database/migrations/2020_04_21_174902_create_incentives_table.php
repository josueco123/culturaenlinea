<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncentivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incentives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('call_id');
            $table->unsignedBigInteger('type_id');
            $table->longtext('name');
            $table->string('slug')->unique();
            $table->string('code');
            $table->unsignedBigInteger('line_id');
            $table->string('value');
            $table->string('quantity');
            $table->unsignedBigInteger('area_id');
            $table->longText('method');
            $table->longText('contact');
            $table->longtext('description')->nulleable();
            $table->date('start_at');
            $table->date('finish_at');
            $table->date('execution_start');
            $table->date('execution_finish');
            $table->timestamps();


            $table->foreign('call_id')->references('id')->on('calls')->onDelete('cascade');
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('incentive_types')->onDelete('cascade');
            $table->foreign('line_id')->references('id')->on('lines_action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incentives');
    }
}
