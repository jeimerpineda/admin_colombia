<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FormasPagoController extends Controller
{
    public function index() {
    	$forpagos = \App\FormasPago::orderBy('id','desc')->paginate(10);
    	return view('formaspago.index',['formaspagos'=>$forpagos]);
    }

    public function insertPage() {
    	return view('formaspago.insert');
    }

    public function insertForm(Request $request) {
    	$data = $request->validate([
    		'descripcion'=>'required|unique:list_formas_pagos,descripcion',
    		'dias'=>'required',
    		'status'=>'required',
    	]);
    	$forpagos = new \App\FormasPago;
    	$user = \Auth::user();
    	$forpagos->user_id = $user->id;
    	$forpagos->descripcion = $request->input('descripcion');
    	$forpagos->dias = $request->input('dias');
    	$forpagos->status = $request->input('status');
    	$forpagos->save();
    	return redirect()->route('config.formasdepago')->with(['Forma de Pago '.
    		'message'=>$forpagos->descripcion.' ha sido agregado correctamente'
    	]);
    }

    public function updatePage($formaspago_id) {
    	$forpagos = \App\FormasPago::findOrFail($formaspago_id);
    	return view('formaspago.update',['formaspagos'=>$forpagos]);
    }

    public function updateForm(Request $request) {
    	$data = $request->validate([
    		'descripcion'=>'required',
            'descripcion'=>Rule::unique('list_formas_pagos', 'descripcion')->ignore($request->input('formaspago_id')),
            'dias'=>'required',
    		'status'=>'required',
    	]);
    	$forpagos = \App\FormasPago::findOrFail($request->input('formaspago_id'));
    	$user = \Auth::user();
    	$forpagos->user_id = $user->id;
    	$forpagos->descripcion = $request->input('descripcion');
    	$forpagos->dias = $request->input('dias');
    	$forpagos->status = $request->input('status');
    	$forpagos->save();
    	return redirect()->route('config.formasdepago.update',['formaspago_id'=>$request->input('formaspago_id')])->with([
    		'message'=>'Forma de pago '.$forpagos->descripcion.' ha sido actualizado correctamente'
    	]);
    }

    public function deletePage($formaspago_id) {
    	$forpagos = \App\FormasPago::findOrFail($formaspago_id);
    	return view('formaspago.delete',['formaspago'=>$forpagos]);
    }

    public function deleteForm(Request $request) {
    	$forpagos = \App\FormasPago::findOrFail($request->input('formaspago_id'));
    	$forpagos->delete();
    	return redirect()->route('config.formasdepago')->with([
    		'message'=>'El Registro '.$request->input('descripcion').' ha sido eliminado correctamente'
    	]);
    }
}
