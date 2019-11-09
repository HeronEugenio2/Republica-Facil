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
     * @return void
     */
    public function up()
    {
        Schema::create('republics', function(Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->string('image')->nullable()->default('http://semantic-ui.com/images/wireframe/image.png');
            $table->string('name');
            $table->string('email');
            $table->text('description')->nullable();
            $table->integer('qtdMembers')->default(0);
            $table->integer('qtdVacancies')->default(0);
            $table->integer('up')->default(0);
            $table->integer('down')->default(0);
            $table->float('value')->nullable()->default(0);
            $table->string('street')->nullable();
            $table->string('phone')->nullable();
            $table->string('district')->nullable();
            $table->string('cep')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('number')->nullable();
            $table->unsignedInteger('type_id')->index();
            $table->unsignedInteger('assignment_id')->nullable()->index();
            $table->unsignedInteger('user_id')->nullable()->index();
            $table->boolean('active_flag')->default(0)->index();
            $table->timestamps();
        });
        Schema::table('republics', function(Blueprint $table) {
            $table->foreign('type_id')->references('id')->on('types');
        });
        Schema::table('users', function(Blueprint $table) {
            $table->foreign('republic_id')->references('id')->on('republics');
        });
        Schema::table('republics', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('republics');
    }
}
