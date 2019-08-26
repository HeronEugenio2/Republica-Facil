<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->date('start');
            $table->date('end');
            $table->boolean('situation');
            $table->unsignedInteger('republic_id');
            $table->timestamps();
        });
        Schema::table('republics', function(Blueprint $table) {
            $table->foreign('assignment_id')->references('id')->on('assignments');
        });
        Schema::table('users', function(Blueprint $table) {
            $table->foreign('assignment_id')->references('id')->on('assignments');
        });
        Schema::table('assignments', function(Blueprint $table) {
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
        Schema::dropIfExists('assignments');
    }
}
