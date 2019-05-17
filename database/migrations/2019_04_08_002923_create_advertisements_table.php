<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * @author Heron Eugenio
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->string('description');
            $table->string('image')->nullable();
            $table->string('title');
            $table->float('value');
            $table->unsignedInteger('republic_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('image_id')->nullable();
            $table->tinyInteger('active_enum')->nullable()->default(0);
            $table->timestamps();
        });
        Schema::table('advertisements', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('advertisements', function(Blueprint $table) {
            $table->foreign('republic_id')->references('id')->on('republics');
        });
        Schema::table('advertisements', function(Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('advertisement_categories');
        });
        Schema::table('advertisements', function(Blueprint $table) {
            $table->foreign('image_id')->references('id')->on('advertisement_images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisements');
    }
}
