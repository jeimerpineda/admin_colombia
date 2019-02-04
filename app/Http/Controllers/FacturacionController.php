<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FacturacionController extends Controller
{
    public function index() {
    	$clientes = \App\Clientes::all()->sortBy('id');
    	// $formasdepago = \App\FormasPago::orderBy('id','asc')->get();
    	$productos = \App\Productos::all()->sortBy('id');
    	return view('facturacion.index',[
            'clientes'=>$clientes, 
            // 'formasdepago'=>$formasdepago, 
            'productos'=>$productos
        ]);
    }
    public function getProducto(Request $request){
    	$producto = \App\Productos::findOrFail($request->input('producto_id'));
    	$unimed = \App\UnidadMedida::findOrFail($producto->unimed_id);
    	$impuesto = \App\Impuestos::findOrFail($producto->impuestos_id);
    	return response()->json([$producto,$unimed,$impuesto]);
    }
}
