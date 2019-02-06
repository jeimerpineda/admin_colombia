<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ImpuestoController extends Controller
{
    public function index() {
    	$impuestos = \App\Impuesto::orderBy('id','desc')->paginate(10);
    	return view('impuesto.index',['impuestos'=>$impuestos]);
    }

    public function insertPage() {
    	return view('impuesto.insert');
    }

    public function insertForm(Request $request) {
    	$data = $request->validate([
    		'descripcion'=>'required|unique:list_impuestos,descripcion',
    		'status'=>'required',
    	]);
    	$impuestos = new \App\Impuesto;
    	$user = \Auth::user();
    	$impuestos->user_id = $user->id;
    	$impuestos->descripcion = $request->input('descripcion');
    	$impuestos->status = $request->input('status');
    	$impuestos->save();
    	return redirect()->route('config.impuesto')->with([
    		'message'=>$impuestos->descripcion.' ha sido agregado correctamente'
    	]);
    }

    public function insertFormFast(Request $request) {
        $data = $request->validate([
            'descripcion'=>'required|unique:list_impuestos,descripcion',
            'status'=>'required',
        ]);
        $impuestos = new \App\Impuesto;
        $user = \Auth::user();
        $impuestos->user_id = $user->id;
        $impuestos->descripcion = $request->input('descripcion');
        $impuestos->status = $request->input('status');
        $impuestos->save();
        return response()->json(\App\Impuesto::all());
    }

    public function updatePage($impuesto_id) {
    	$impuestos = \App\Impuesto::findOrFail($impuesto_id);
    	return view('impuesto.update',['impuestos'=>$impuestos]);
    }

    public function updateForm(Request $request) {
    	$data = $request->validate([
    		'descripcion'=>'required',
            'descripcion'=>Rule::unique('list_impuestos', 'descripcion')->ignore($request->input('impuesto_id')),
    		'status'=>'required',
    	]);
    	$impuestos = \App\Impuesto::findOrFail($request->input('impuesto_id'));
    	$user = \Auth::user();
    	$impuestos->user_id = $user->id;
    	$impuestos->descripcion = $request->input('descripcion');
    	$impuestos->status = $request->input('status');
    	$impuestos->save();
    	return redirect()->route('config.impuesto.update',['impuesto_id'=>$request->input('impuesto_id')])->with([
    		'message'=>$impuestos->descripcion.' ha sido actualizado correctamente'
    	]);
    }

    public function deletePage($impuesto_id) {
    	$impuestos = \App\Impuesto::findOrFail($impuesto_id);
    	return view('impuesto.delete',['impuestos'=>$impuestos]);
    }

    public function deleteForm(Request $request) {
    	$impuestos = \App\Impuesto::findOrFail($request->input('impuesto_id'));
    	$impuestos->delete();
    	return redirect()->route('config.impuesto')->with([
    		'message'=>$request->input('descripcion').' ha sido eliminado correctamente'
    	]);
    }
}
