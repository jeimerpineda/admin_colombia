<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListTiposFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_tipos_facturas', function (Blueprint $table) {
            $table->increments('id')->index()->comment('Clave del banco');
            $table->unsignedInteger('user_id')->comment('Ide Clave de la tabla usuario');
            $table->string('descripcion',100)->index()->comment('Descripcion de tipos de facturas');
            $table->string('status',2)->comment('Status de los tipos de facturas');
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
        Schema::table('list_tipos_facturas', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('list_tipos_facturas');
    }
}
