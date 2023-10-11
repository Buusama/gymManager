<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->date('birthday')->nullable();
            $table->enum('gender', ['Male', 'Female']);
            $table->enum('status', ['Active', 'Inactive'])->default('Inactive');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->enum('role', [0, 1, 2, 3, 4, 5])->default(0);
            $table->string('description')->nullable();
            $table->enum('active', [0, 1])->default(0);
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
