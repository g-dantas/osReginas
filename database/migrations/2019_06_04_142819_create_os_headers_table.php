<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOsHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('os_header', function (Blueprint $table) {
            $table->increments('id_header_os');
            $table->unsignedInteger('id_usuario_header');
            $table->foreign('id_usuario_header')
                  ->references('id_usuario')
                  ->on('usuarios')
                  ->onDelete('cascade');
            $table->dateTime('data_hora_abertura_header');
            $table->unsignedInteger('status_header')
                  ->foreign('status_header')
                  ->references('id_status')
                  ->on('status_os')
                  ->onDelete('cascade');
            $table->dateTime('data_hora_fechamento_header')->nullable();
            $table->integer('fila_atendimento_header')->nullable();
            $table->unsignedInteger('id_defeito_header');
            $table->foreign('id_defeito_header')
                  ->references('id_defeito')
                  ->on('defeitos')
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
        Schema::dropIfExists('os_header');
    }
}
