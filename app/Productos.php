<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'productos';

    //Funcion para Salect de unidades de medida
    public function unidadmedida(){
 		return $this->belongsTo('App\UnidadMedida','id');
	}
	//Funcion para Salect Empresas
    public function empresa(){
 		return $this->belongsTo('App\Empresa','id');
	}
	//Funcion para Salect Impuestos
    public function impuesto(){
 		return $this->belongsTo('App\Impuestos','id');
	}

}
