<?php

use App\Models\User;
use App\Models\Department;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDepartmentTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('user_department', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Department::class)->references('id')->on('department')->onDelete('CASCADE')->nullable();
            $table->foreignIdFor(User::class)->references('id')->on('users')->onDelete('CASCADE')->nullable();
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
        Schema::dropIfExists('user_department');
    }
}
