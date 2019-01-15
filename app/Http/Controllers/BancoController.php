<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BancoController extends Controller
{
    public function index() {
    	$bancos = \App\Banco::orderBy('id','desc')->paginate(10);
    	return view('bancos.index',['bancos'=>$bancos]);
    }

    public function insertPage() {
    	return view('bancos.insert');
    }

    public function insertForm(Request $request) {
    	$data = $request->validate([
    		'descripcion'=>'required|unique:list_bancos,descripcion',
    		'status'=>'required',
    	]);
    	$banco = new \App\Banco;
    	$user = \Auth::user();
    	$banco->user_id = $user->id;
    	$banco->descripcion = $request->input('descripcion');
    	$banco->status = $request->input('status');
    	$banco->save();
    	return redirect()->route('config.bancos')->with([
    		'message'=>$banco->descripcion.' ha sido agregado correctamente'
    	]);
    }

    public function updatePage($banco_id) {
    	$banco = \App\Banco::findOrFail($banco_id);
    	return view('bancos.update',['banco'=>$banco]);
    }

    public function updateForm(Request $request) {
    	$data = $request->validate([
    		'descripcion'=>'required',
            'descripcion'=>Rule::unique('list_bancos', 'descripcion')->ignore($request->input('banco_id')),
    		'status'=>'required',
    	]);
    	$banco = \App\Banco::findOrFail($request->input('banco_id'));
    	$user = \Auth::user();
    	$banco->user_id = $user->id;
    	$banco->descripcion = $request->input('descripcion');
    	$banco->status = $request->input('status');
    	$banco->save();
    	return redirect()->route('config.bancos.update',['banco_id'=>$request->input('banco_id')])->with([
    		'message'=>$banco->descripcion.' ha sido actualizado correctamente'
    	]);
    }

    public function deletePage($banco_id) {
    	$banco = \App\Banco::findOrFail($banco_id);
    	return view('bancos.delete',['banco'=>$banco]);
    }

    public function deleteForm(Request $request) {
    	$banco = \App\Banco::findOrFail($request->input('banco_id'));
    	$banco->delete();
    	return redirect()->route('config.bancos')->with([
    		'message'=>$request->input('descripcion').' ha sido eliminado correctamente'
    	]);
    }
}
