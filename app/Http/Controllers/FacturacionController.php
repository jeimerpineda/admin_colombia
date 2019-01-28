<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FacturacionController extends Controller
{
    public function index() {
    	$clientes = \App\Clientes::orderBy('id','asc')->get();
    	$formasdepago = \App\FormasPago::orderBy('id','asc')->get();
    	$productos = \App\Productos::orderBy('id','asc')->get();
    	return view('facturacion.index',['clientes'=>$clientes, 'formasdepago'=>$formasdepago, 'productos'=>$productos],compact('clientes','formasdepago','productos'));
    }
}
