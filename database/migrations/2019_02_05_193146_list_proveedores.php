<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ListProveedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_proveedores', function (Blueprint $table) {
            $table->increments('id')->index()->comment('Ide del proveedor');
            $table->unsignedInteger('user_id')->comment('Ide Clave de la tabla usuario');
            $table->unsignedInteger('regimen_iva_id')->comment('FK Ide de regimen de iva');
            $table->string('tipo',100)->index()->comment('Tipo de persona');
            $table->string('tipo_identificacion',100)->comment('Tipo de identificacion, cedula,nit,tarjeta identidad...');
            $table->string('numero_documento',100)->comment('Numero de documento de identificacion');
            $table->string('nombre_legal',100)->comment('Nombre legal del proveedor');
            $table->string('direccion',100)->comment('Direccion del proveedor');
            $table->string('telefono_principal',100)->comment('Telefono principal del proveedor');
            $table->string('telefono_secundario',100)->comment('Telefono secundario del proveedor');
            $table->unsignedInteger('gran_contribuyente')->comment('Si es gran contribuyente 1=si ; 0=no');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('regimen_iva_id')->references('id')->on('list_regimen_iva');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('list_proveedores', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['regimen_iva_id']);
        });
        Schema::dropIfExists('list_proveedores');
    }
}
