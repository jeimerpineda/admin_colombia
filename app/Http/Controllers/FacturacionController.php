<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FacturacionController extends Controller
{
    public function index() {
    	$clientes = \App\Clientes::All();
    	return view('facturacion.index',['clientes'=>$clientes]);
    }
}
