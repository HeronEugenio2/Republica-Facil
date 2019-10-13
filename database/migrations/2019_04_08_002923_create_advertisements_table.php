<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('image')->default('https://www.nato-pa.int/sites/default/files/default_images/default-image.jpg');
            $table->string('title');
            $table->string('value');
            $table->string('cep');
            $table->string('address');
            $table->string('street');
            $table->string('city');
            $table->string('state');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('image_id')->nullable();
            $table->tinyInteger('active_flag')->nullable()->default(0);
            $table->timestamps();
        });
        Schema::table('advertisements', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
//        Schema::table('advertisements', function(Blueprint $table) {
//            $table->foreign('republic_id')->references('id')->on('republics');
//        });
        Schema::table('advertisements', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('advertisement_categories');
        });
        Schema::table('advertisements', function (Blueprint $table) {
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
