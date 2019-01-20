<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_clientes', function (Blueprint $table) {
            $table->increments('id')->index()->comment('Ide de la tabla clientes');
            $table->unsignedInteger('user_id')->comment('Ide Clave de la tabla usuario');
            $table->string('dni',20)->comment('DNI del cliente');
            $table->string('nombres',100)->comment('Nombre del cliente');
            $table->string('apellidos',100)->comment('Apellidos del cliente');
            $table->string('direccion',200)->comment('Direccion del cliente');
            $table->string('correo',100)->comment('Correo del cliente');
            $table->string('telefono',100)->comment('Telefono casa del cliente');
            $table->string('telefono_oficina',100)->comment('Telefono oficina del cliente');
            $table->string('movil',100)->comment('Telefono movil del cliente');
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
        Schema::table('list_clientes', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('list_clientes');
    }
}
