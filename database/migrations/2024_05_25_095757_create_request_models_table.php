<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_models', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title');
            $table->text('description');
            $table->integer('status')->unsigned();
            $table->integer('priority');
            $table->unsignedInteger('category_id');
            $table->integer('user_id')->unsigned();
            $table->string('manager');
            $table->dateTime('start_date');
            $table->dateTime('due_date');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
          

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_models');
    }
}
