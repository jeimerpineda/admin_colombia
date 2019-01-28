<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id')->comment('Ide Clave de la tabla productos');
            $table->unsignedInteger('user_id')->comment('Ide Clave de la tabla usuario');
            $table->string('codigo_barrra',20)->comment('codigo barras');
            $table->string('descripcion',100)->comment('Descripcion del produto');
            $table->double('existen', 8, 2)->comment('Cantida actual del produto');
            $table->double('existencia_minima', 8, 2)->comment('Cantida minima del produto');
            $table->double('costo', 8, 2)->comment('Costo en modena del produto');
            $table->double('costo_dolar', 8, 2)->comment('Costo en dolares del produto');
            $table->double('precio_venta1', 8, 2)->comment('1 precio de venta del produto');
            $table->double('precio_venta2', 8, 2)->comment('2 precio de venta del produto');
            $table->double('precio_venta_dolar1', 8, 2)->comment('1 precio de venta en dolares del produto');
            $table->double('precio_venta_dolar2', 8, 2)->comment('2 precio de venta en dolares del produto');
            $table->unsignedInteger('unimed_id')->comment('Codigo de unidad de medida de produtos');
            $table->string('servicio', 2)->comment('0 no es un servicio, 1 si e servicio el produto');
            $table->unsignedInteger('empre_id')->comment('Codigo de la empresa a que pertenece el producto');
            $table->double('porcentaje_descuento', 8, 2)->comment('Porcentaje de descuento del produto');
            $table->unsignedInteger('impuestos_id')->comment('Impuesto del produto');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('unimed_id')->references('id')->on('list_unidmed');
            $table->foreign('empre_id')->references('id')->on('list_empresa');
            $table->foreign('impuestos_id')->references('id')->on('list_impuestos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('list_productos', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['unimed_id']);
            $table->dropForeign(['empre_id']);
            $table->dropForeign(['impuestos_id']);
        });
        Schema::dropIfExists('list_productos');
    }
}
