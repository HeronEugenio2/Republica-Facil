<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInformationsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('user_informations', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->string('name')->nullable();
            $table->date('date_birth')->nullable();
            $table->string('user_type_enum')->nullable();
            $table->string('email');
            $table->string('identification_type')->nullable();
            $table->string('identification_number')->nullable();
            $table->string('phone_area_code')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('phone_extension')->nullable();
            $table->string('profile_image_path')->nullable();
            $table->boolean('complete_image_path')->default(0);
            $table->unsignedInteger('user_id')->index();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('user_informations', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_informations');
    }
}
