<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TipoDocumentoController extends Controller
{
    public function index() {
    	$tipodocumento = \App\TipoDocumento::orderBy('id','desc')->paginate(10);
    	return view('tipodocumento.index',['tipodocumento'=>$tipodocumento]);
    }

    public function insertPage() {
    	return view('tipodocumento.insert');
    }

    public function insertForm(Request $request) {
    	$data = $request->validate([
    		'descripcion'=>'required|unique:list_tipo_documento,descripcion',
    		'status'=>'required',
    	]);
    	$tipodocumento = new \App\TipoDocumento;
    	$user = \Auth::user();
    	$tipodocumento->user_id = $user->id;
    	$tipodocumento->descripcion = $request->input('descripcion');
    	$tipodocumento->status = $request->input('status');
    	$tipodocumento->save();
    	return redirect()->route('config.tipodocumento')->with([
    		'message'=>$tipodocumento->descripcion.' ha sido agregado correctamente'
    	]);
    }

    public function insertFormFast(Request $request) {
        $data = $request->validate([
            'descripcion'=>'required|unique:list_tipo_documento,descripcion',
            'status'=>'required',
        ]);
        $tipodocumento = new \App\TipoDocumento;
        $user = \Auth::user();
        $tipodocumento->user_id = $user->id;
        $tipodocumento->descripcion = $request->input('descripcion');
        $tipodocumento->status = $request->input('status');
        $tipodocumento->save();
        return response()->json(\App\TipoDocumento::all());
    }

    public function updatePage($tipodocumento_id) {
    	$tipodocumento = \App\TipoDocumento::findOrFail($tipodocumento_id);
    	return view('tipodocumento.update',['tipodocumento'=>$tipodocumento]);
    }

    public function updateForm(Request $request) {
    	$data = $request->validate([
    		'descripcion'=>'required',
            'descripcion'=>Rule::unique('list_tipo_documento', 'descripcion')->ignore($request->input('tipodocumento_id')),
    		'status'=>'required',
    	]);
    	$tipodocumento = \App\TipoDocumento::findOrFail($request->input('tipodocumento_id'));
    	$user = \Auth::user();
    	$tipodocumento->user_id = $user->id;
    	$tipodocumento->descripcion = $request->input('descripcion');
    	$tipodocumento->status = $request->input('status');
    	$tipodocumento->save();
    	return redirect()->route('config.tipodocumento.update',['tipodocumento_id'=>$request->input('tipodocumento_id')])->with([
    		'message'=>$tipodocumento->descripcion.' ha sido actualizado correctamente'
    	]);
    }

    public function deletePage($tipodocumento_id) {
    	$tipodocumento = \App\TipoDocumento::findOrFail($tipodocumento_id);
    	return view('tipodocumento.delete',['tipodocumento'=>$tipodocumento]);
    }

    public function deleteForm(Request $request) {
    	$tipodocumento = \App\TipoDocumento::findOrFail($request->input('tipodocumento_id'));
    	$tipodocumento->delete();
    	return redirect()->route('config.tipodocumento')->with([
    		'message'=>$request->input('descripcion').' ha sido eliminado correctamente'
    	]);
    }
}
