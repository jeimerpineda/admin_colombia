<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UnidadMedidaController extends Controller
{
    public function index() {
    	$unidadmedida = \App\UnidadMedida::orderBy('id','desc')->paginate(10);
    	return view('unidadmedida.index',['unidadmedida'=>$unidadmedida]);
    }

    public function insertPage() {
    	return view('unidadmedida.insert');
    }

    public function insertForm(Request $request) {
    	$data = $request->validate([
    		'descripcion'=>'required|unique:list_unidmed,descripcion',
    		'status'=>'required',
    	]);
    	$unidmed = new \App\UnidadMedida;
    	$user = \Auth::user();
    	$unidmed->user_id = $user->id;
    	$unidmed->descripcion = $request->input('descripcion');
    	$unidmed->status = $request->input('status');
    	$unidmed->save();
    	return redirect()->route('config.unidadmedida')->with([
    		'message'=>$unidmed->descripcion.' ha sido agregado correctamente'
    	]);
    }

    public function updatePage($unidmed_id) {
    	$unidmed = \App\UnidadMedida::findOrFail($unidmed_id);
    	return view('unidadmedida.update',['unidmed'=>$unidmed]);
    }

    public function updateForm(Request $request) {
    	$data = $request->validate([
    		'descripcion'=>'required',
            'descripcion'=>Rule::unique('list_unidmed', 'descripcion')->ignore($request->input('unidmed_id')),
    		'status'=>'required',
    	]);
    	$unidmed = \App\UnidadMedida::findOrFail($request->input('unidmed_id'));
    	$user = \Auth::user();
    	$unidmed->user_id = $user->id;
    	$unidmed->descripcion = $request->input('descripcion');
    	$unidmed->status = $request->input('status');
    	$unidmed->save();
    	return redirect()->route('config.unidadmedida.update',['unidmed_id'=>$request->input('unidmed_id')])->with([
    		'message'=>$unidmed->descripcion.' ha sido actualizado correctamente'
    	]);
    }

    public function deletePage($unidmed_id) {
    	$unidmed = \App\UnidadMedida::findOrFail($unidmed_id);
    	return view('unidadmedida.delete',['unidmed'=>$unidmed]);
    }

    public function deleteForm(Request $request) {
    	$unidmed = \App\UnidadMedida::findOrFail($request->input('unidmed_id'));
    	$unidmed->delete();
    	return redirect()->route('config.unidadmedida')->with([
    		'message'=>$request->input('descripcion').' ha sido eliminado correctamente'
    	]);
    }
}
