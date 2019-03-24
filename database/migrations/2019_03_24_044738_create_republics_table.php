<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateRepublicsTable
 * @author Heron Eugenio
 */
class CreateRepublicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('republics', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->string('name');
            $table->string('email');
            $table->string('description')->nullable();
            $table->integer('member');
            $table->integer('vacancy');
            $table->unsignedInteger('type_id')->index();
            $table->unsignedInteger('address_id')->index();
            $table->timestamps();
        });
        Schema::table('republics', function (Blueprint $table) {
            $table->foreign('type_id')->references('id')->on('types');
        });
        Schema::table('republics', function (Blueprint $table) {
            $table->foreign('address_id')->references('id')->on('adresses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('republics');
    }
}
