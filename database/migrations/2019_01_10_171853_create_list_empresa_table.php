<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_empresa', function (Blueprint $table) {
            $table->increments('id')->index()->comment('Ide de la tabla empresa');
            $table->unsignedInteger('user_id')->comment('Ide Clave de la tabla usuario');
            $table->string('nit',20)->comment('nit del cliente');
            $table->string('razon_social',100)->comment('Nombre de la empresa');
            $table->string('direccion',200)->comment('Direccion de la empresa');
            $table->string('correo',100)->comment('Correo de la empresa');
            $table->string('telefono_principal',100)->comment('Telefono de la empresa');
            $table->string('telefono_segundario',100)->comment('Telefono2 de la empresa');
            $table->string('sucursal',100)->comment('0 es principal, 1 es sucursal, 2 es otra camara de comercio aparte');
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
        Schema::table('list_empresa', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('list_empresa');
    }
}
