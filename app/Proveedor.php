<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
	protected $table = 'list_proveedores';

   	public function regimeniva() {
   		return $this->belongsTo('App\RegimenIva','regimen_iva_id');
   	}   	

   	public function TipoDocumento() {
   		return $this->belongsTo('App\RegimenIva','tipo_identificacion');
   	}
}
