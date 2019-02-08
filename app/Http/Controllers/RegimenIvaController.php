<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegimenIvaController extends Controller
{
    public function index() {
    	$regimeniva = \App\RegimenIva::orderBy('id','desc')->paginate(10);
    	return view('regimeniva.index',['regimeniva'=>$regimeniva]);
    }

    public function insertPage() {
    	return view('regimeniva.insert');
    }

    public function insertForm(Request $request) {
    	$data = $request->validate([
    		'descripcion'=>'required|unique:list_regimen_iva,descripcion',
    		'status'=>'required',
    	]);
    	$regimeniva = new \App\RegimenIva;
    	$user = \Auth::user();
    	$regimeniva->user_id = $user->id;
    	$regimeniva->descripcion = $request->input('descripcion');
    	$regimeniva->status = $request->input('status');
    	$regimeniva->save();
    	return redirect()->route('config.regimeniva')->with([
    		'message'=>$regimeniva->descripcion.' ha sido agregado correctamente'
    	]);
    }

    public function insertFormFast(Request $request) {
        $data = $request->validate([
            'descripcion'=>'required|unique:list_regimen_iva,descripcion',
            'status'=>'required',
        ]);
        $regimeniva = new \App\RegimenIva;
        $user = \Auth::user();
        $regimeniva->user_id = $user->id;
        $regimeniva->descripcion = $request->input('descripcion');
        $regimeniva->status = $request->input('status');
        $regimeniva->save();
        return response()->json(\App\RegimenIva::all());
    }

    public function updatePage($regimen_id) {
    	$regimeniva = \App\RegimenIva::findOrFail($regimen_id);
    	return view('regimeniva.update',['regimeniva'=>$regimeniva]);
    }

    public function updateForm(Request $request) {
    	$data = $request->validate([
    		'descripcion'=>'required',
            'descripcion'=>Rule::unique('list_regimen_iva', 'descripcion')->ignore($request->input('regimen_id')),
    		'status'=>'required',
    	]);
    	$regimeniva = \App\RegimenIva::findOrFail($request->input('regimen_id'));
    	$user = \Auth::user();
    	$regimeniva->user_id = $user->id;
    	$regimeniva->descripcion = $request->input('descripcion');
    	$regimeniva->status = $request->input('status');
    	$regimeniva->save();
    	return redirect()->route('config.regimeniva.update',['regimen_id'=>$request->input('regimen_id')])->with([
    		'message'=>$regimeniva->descripcion.' ha sido actualizado correctamente'
    	]);
    }

    public function deletePage($regimen_id) {
    	$regimeniva = \App\RegimenIva::findOrFail($regimen_id);
    	return view('regimeniva.delete',['regimeniva'=>$regimeniva]);
    }

    public function deleteForm(Request $request) {
    	$regimeniva = \App\RegimenIva::findOrFail($request->input('regimen_id'));
    	$regimeniva->delete();
    	return redirect()->route('config.regimeniva')->with([
    		'message'=>$request->input('descripcion').' ha sido eliminado correctamente'
    	]);
    }
}
