<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('nombre', 80);
            $table->string('apellido', 80);
            $table->string('cedula', 10);
            $table->string('telf1', 11);
            $table->string('telf2', 11);
            $table->string('email', 120)->unique();
            $table->string('password');
            $table->enum('nivel',['admin','user']);
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
        Schema::drop('users');
    }
}
