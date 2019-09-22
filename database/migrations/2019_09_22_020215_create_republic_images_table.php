<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepublicImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('republic_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('directory')->nullable();
            $table->unsignedInteger('republic_id')->nullable();
            $table->timestamps();
        });
        Schema::table('republic_images', function (Blueprint $table) {
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
        Schema::dropIfExists('republic_images');
    }
}
