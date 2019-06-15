<?php

use Illuminate\Support\Facades\Schema;
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
            $table->unsignedInteger('id_tp_usuario');
            $table->foreign('id_tp_usuario')
                  ->references('id_tp_usuario')
                  ->on('tipo_usuarios')
                  ->onDelete('cascade');
            $table->unsignedInteger('id_departamento');
            $table->foreign('id_departamento')
                  ->references('id_depto')
                  ->on('departamentos')
                  ->onDelete('cascade');
            $table->string('name');
            $table->string('login')->unique();
            $table->string('email')->nullable();
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
