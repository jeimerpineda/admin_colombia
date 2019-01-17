<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacturacionController extends Controller
{
    public function index() {
    	// $Factura = \App\Facturacion::orderBy('id','desc')->paginate(10);
    	return view('facturacion.index');
    }
}
