<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spents', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->string('description');
            $table->date('dateSpent')->nullable();
            $table->float('value');
            $table->unsignedInteger('republic_id');
            $table->unsignedInteger('member')->nullable();
            $table->timestamps();
        });
        Schema::table('spents', function(Blueprint $table) {
            $table->foreign('republic_id')->references('id')->on('republics');
        });
        Schema::table('users', function(Blueprint $table) {
            $table->foreign('spent_id')->references('id')->on('spents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spents');
    }
}
