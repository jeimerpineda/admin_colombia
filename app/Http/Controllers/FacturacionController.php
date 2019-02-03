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


    public function getProducto($producto_id){
    	return response()->json(\App\Productos::findOrFail($producto_ide));
    }


	// CODIGO DE EJEMPLO DE PUBLIO

    // public function insertFast(Request $request) {
    //     $data = $request->validate([
    //         'name'=>'required',
    //         'email'=>'required|email'
    //     ]);
    //     $customer = new Customer();
    //     $user = \Auth::user();
    //     $customer->user_id = $user->id;
    //     $customer->name = $request->input('name');
    //     $customer->email = $request->input('email');
    //     $customer->save();
    //     return response()->json(\App\Customer::all());
    // }

}
