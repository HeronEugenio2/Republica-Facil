<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->string('cpf')->index();
            $table->integer('value');
            $table->unsignedInteger('republic_id')->index();
            $table->timestamps();
        });
        Schema::table('vote', function (Blueprint $table) {
            $table->foreign('republic_id')->references('id')->on('republics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vote');
    }
}
