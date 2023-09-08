<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('form_id');
            $table->string('label');
            $table->string('slug');
            $table->string('type');
            $table->string('name');
            $table->longText('description');
            $table->string('placeholder');
            $table->longText('options')->nullable();
            $table->boolean('required');
            $table->integer('order');
            $table->timestamps();

            $table->foreign('form_id')->references('id')->on('fields');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fields');
    }
}
