<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spent_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('month')->nullable();
            $table->float('value')->nullable();
            $table->unsignedInteger('republic_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('spent_id')->nullable();
            $table->boolean('buy')->default(0);
            $table->timestamps();
        });
        Schema::table('spent_histories', function(Blueprint $table) {
            $table->foreign('republic_id')->references('id')->on('republics');
        });
        Schema::table('spent_histories', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spent_histories');
    }
}
