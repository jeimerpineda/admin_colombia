<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'productos';

   public function impuestos() {
   		return $this->belongsTo('App\Impuestos','impuestos_id');
   }

   public function unimed() {
   		return $this->belongsTo('App\UnidadMedida','unimed_id');
   }

   public function empresa()  {
   		return $this->belongsTo('App\Empresa','empre_id');
   }
}
