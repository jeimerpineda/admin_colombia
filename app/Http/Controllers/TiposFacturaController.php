<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TiposFacturaController extends Controller
{
    public function index() {
    	$tipfacturas = \App\TiposFactura::orderBy('id','desc')->paginate(10);
    	return view('tiposfactura.index',['tiposdefacturas'=>$tipfacturas]);
    }

    public function insertPage() {
    	return view('tiposfactura.insert');
    }

    public function insertForm(Request $request) {
    	$data = $request->validate([
    		'descripcion'=>'required|unique:list_tipos_facturas,descripcion',
    		'status'=>'required',
    	]);
    	$tipfacturas = new \App\TiposFactura;
    	$user = \Auth::user();
    	$tipfacturas->user_id = $user->id;
    	$tipfacturas->descripcion = $request->input('descripcion');
    	$tipfacturas->status = $request->input('status');
    	$tipfacturas->save();
    	return redirect()->route('config.tiposdefacturas')->with([
    		'message'=>$tipfacturas->descripcion.' ha sido agregado correctamente'
    	]);
    }

    public function updatePage($tipfacturas_ide) {
    	$tipfacturas = \App\TiposFactura::findOrFail($tipfacturas_ide);
    	return view('tiposfactura.update',['tiposdefacturas'=>$tipfacturas]);
    }

    public function updateForm(Request $request) {
    	$data = $request->validate([
    		'descripcion'=>'required',
            'descripcion'=>Rule::unique('list_tipos_facturas', 'descripcion')->ignore($request->input('tipfacturas_ide')),
    		'status'=>'required',
    	]);
    	$tipfacturas = \App\TiposFactura::findOrFail($request->input('tipfacturas_ide'));
    	$user = \Auth::user();
    	$tipfacturas->user_id = $user->id;
    	$tipfacturas->descripcion = $request->input('descripcion');
    	$tipfacturas->status = $request->input('status');
    	$tipfacturas->save();
    	return redirect()->route('config.tiposdefacturas.update',['tipfacturas_ide'=>$request->input('tipfacturas_ide')])->with([
    		'message'=>$tipfacturas->descripcion.' ha sido actualizado correctamente'
    	]);
    }

    public function deletePage($tipfacturas_ide) {
    	$tipfacturas = \App\TiposFactura::findOrFail($tipfacturas_ide);
    	return view('tiposfactura.delete',['tiposdefacturas'=>$tipfacturas]);
    }

    public function deleteForm(Request $request) {
    	$tipfacturas = \App\TiposFactura::findOrFail($request->input('tipfacturas_ide'));
    	$tipfacturas->delete();
    	return redirect()->route('config.tiposdefacturas')->with([
    		'message'=>$request->input('descripcion').' ha sido eliminado correctamente'
    	]);
    }
}
