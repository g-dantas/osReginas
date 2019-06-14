<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOsBodiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('os_body', function (Blueprint $table) {
            $table->increments('id_os_body');
            $table->unsignedInteger('id_header_os');
            $table->foreign('id_header_os')
                  ->references('id_header_os')
                  ->on('os_header')
                  ->onDelete('cascade');
            $table->dateTime('data_os_body');
            $table->unsignedInteger('id_usuario_body');
            $table->foreign('id_usuario_body')
                  ->references('id_usuario')
                  ->on('usuarios')
                  ->onDelete('cascade');
            $table->longText('texto_body');
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
        Schema::dropIfExists('os_body');
    }
}
