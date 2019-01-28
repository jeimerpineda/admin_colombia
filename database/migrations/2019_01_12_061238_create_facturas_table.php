<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->increments('id')->comment('Ide Clave de la tabla facturas');
            $table->unsignedInteger('user_id')->comment('Ide Clave de la tabla usuario');
            $table->unsignedInteger('empre_id')->comment('Codigo de la empresa a que pertenece la factura');
            $table->unsignedInteger('client_id')->comment('Codigo del cliente al que le pertenece la factura');
            $table->unsignedInteger('forpag_id')->comment('Codigo del formas de pagos al que le pertenece la factura');
            $table->date('fecha_creacion')->comment('Fecha de creacion de la factura');
            $table->date('fecha_vencimiento_forma_pago')->comment('Fecha terminacion de la forma_pago ');
            $table->string('nro_factura',100 )->comment('Numero que lleva la factura');
            $table->double('sub_total_sin_iva', 8, 2)->comment('Sub total de productos sin iva');
            $table->double('sub_total_con_iva', 8, 2)->comment('Sub total de productos con iva');
            $table->double('sub_total_general', 8, 2)->comment('Sub total de productos sin y con iva');
            $table->double('descuento', 8, 2)->comment('decuento en moneda aplicado a la factura');
            $table->double('total_general', 8, 2)->comment('Total de la factura');
            $table->string('factura_anulada',1 )->comment('0 no esta anulada, 1 esta anulada');
            $table->date('fecha_anulacion',1 )->comment('Fecha en la cual se anula la factura');
            $table->unsignedInteger('user_id_anulacion')->comment('Ide Clave de la tabla usuario que anulo');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('empre_id')->references('id')->on('list_empresa');
            $table->foreign('client_id')->references('id')->on('list_clientes');
            $table->foreign('forpag_id')->references('id')->on('list_formas_pagos');
            $table->foreign('user_id_anulacion')->references('id')->on('list_clientes');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facturas', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['empre_id']);
            $table->dropForeign(['client_id']);
            $table->dropForeign(['forpag_id']);
            $table->dropForeign(['user_id_anulacion']);
        });
        Schema::dropIfExists('facturas');
    }
}
