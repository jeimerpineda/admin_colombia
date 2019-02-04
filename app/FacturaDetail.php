<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturaDetail extends Model
{
	protected $table = 'facturas_detalles';

    public function user() {
    	return $this->belongsTo('App\User','user_id');
    }

    public function facturacion() {
    	return $this->belongsTo('App\Facturacion','facturas_id');
    }

    public function producto() {
    	return $this->belongsTo('App\Productos','productos_id');
    }
}
