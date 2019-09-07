<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->string('cpf')->index();
            $table->string('type_vote')->index();
            $table->integer('value');
            $table->unsignedInteger('republic_id')->index();
            $table->timestamps();
        });
        Schema::table('votes', function (Blueprint $table) {
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
