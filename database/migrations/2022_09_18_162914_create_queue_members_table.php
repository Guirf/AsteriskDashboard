<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueueMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queue_members', function (Blueprint $table) {
            $table->id('uniqueid');
            $table->string('membername');
            $table->string('queue_name');
            $table->string('interface');
            $table->integer('penalty')->nullable();
            $table->boolean('paused')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('queue_members');
    }
}
