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

        Schema::create('tbl_usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vusuario')->unique();
            $table->string('vch_nombres');
            $table->string('vch_apellidos');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
            $table->integer('int_tipo');
            $table->string('vch_pais');
            $table->integer('int_sexo');
            $table->string('vch_img');
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
        //Schema::drop('users');
        Schema::drop('tbl_usuario');
    }
}
