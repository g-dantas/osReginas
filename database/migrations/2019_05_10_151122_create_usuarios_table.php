<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->string('nome_usuario', 100);
            $table->string('login_usuario', 50);
            $table->string('senha_usuario');
            $table->unsignedInteger('id_depto_usuario');
            $table->foreign('id_depto_usuario')
                  ->references('id_depto')
                  ->on('departamentos')
                  ->onDelete('cascade');
            $table->unsignedInteger('id_tp_usuario');
            $table->foreign('id_tp_usuario')
                  ->references('id_tp_usuario')
                  ->on('tipo_usuarios')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('usuarios');
    }
}
