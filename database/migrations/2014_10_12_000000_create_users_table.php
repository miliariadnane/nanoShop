<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            //$table->uuid('id')->primary();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('username');
            $table->date('birthDate');
            $table->string('email')->unique();
            $table->string('phoneNumber');
            $table->string('address')->nullable();
            $table->string('avatar')->nullable();
            $table->char('sexe');
            $table->boolean('status');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
}
