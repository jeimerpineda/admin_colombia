<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListCalendarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_calendario', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('Ide Clave de la tabla usuario');
            $table->string('ano',2)->comment('Año del calendario');
            $table->date('fecha_inicio')->comment('Fecha de inicio calendario');
            $table->date('fecha_fin')->comment('Fecha de fin calendario');
            $table->string('status',2)->comment('0 para Abierto, 1 para cerrado del mes');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('list_calendario', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('list_calendario');
    }
}
