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
            $table->string('name', 255);
            $table->string('description', 255)->nullable();
            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->integer('status_flag');
            $table->unsignedInteger('republic_id');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('assignments', function (Blueprint $table) {
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
        Schema::table('assignments', function (Blueprint $table) {
            $table->dropForeign('assignments_republic_id_foreign');
        });
        Schema::dropIfExists('assignments');
    }
}
