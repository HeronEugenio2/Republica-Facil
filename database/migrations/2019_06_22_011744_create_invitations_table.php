<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('invitations', function(Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->string('email')->nullable();
            $table->integer('flag_accepted')->default(0);
            $table->unsignedInteger('republic_id')->nullable()->index();
            $table->unsignedInteger('user_id')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invitations');
    }
}
