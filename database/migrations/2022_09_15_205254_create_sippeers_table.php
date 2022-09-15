<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSippeersTable extends Migration {

    public function up() {
        Schema::create('sippeers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->references('id')->on('users')->onDelete('CASCADE');
            $table->string('name');
            $table->string('ipaddr')->nullable();
            $table->string('port')->nullable();
            $table->enum('type', ['friend','user', 'peer'])->default('friend');
            $table->string('context');
            $table->string('secret');
            $table->enum('transport', ['udp', 'tls', 'ws'])->default('udp');
            $table->enum('dtmfmode', ['rfc2833', 'info',])->default('rfc2833');
            $table->string('nat')->nullable();
            $table->string('callgroup')->nullable();
            $table->string('pickupgroup')->nullable();
            $table->string('disallow')->nullable();
            $table->string('allow')->nullable();
            $table->string('qualify')->nullable();
            $table->string('fullname')->nullable();
            $table->string('allowtransfer')->nullable();
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
        Schema::dropIfExists('sippeers');
    }
}
