<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClientesController extends Controller
{
    public function index() {
    	$clientes = \App\Clientes::orderBy('id','desc')->paginate(10);
    	return view('clientes.index',['listclientes'=>$clientes]);
    }

    public function insertPage() {
    	return view('clientes.insert');
    }

    public function insertForm(Request $request) {
    	$data = $request->validate([
    		'dni'=>'required|unique:list_clientes,dni',
    		'nombres'=>'required',
    		'apellidos'=>'required',
    		'direccion'=>'required',
    		'correo'=>'required',
    		'tlf1'=>'required',
    		'tlf2'=>'required',
    		'movil'=>'required',
    	]);
    	$clientes = new \App\Clientes;
    	$user = \Auth::user();
    	$clientes->user_id = $user->id;
    	$clientes->dni = $request->input('dni');
    	$clientes->nombres = $request->input('nombres');
    	$clientes->apellidos = $request->input('apellidos');
    	$clientes->direccion = $request->input('direccion');
    	$clientes->correo = $request->input('correo');
    	$clientes->telefono = $request->input('tlf1');
    	$clientes->telefono_oficina = $request->input('tlf2');
    	$clientes->movil = $request->input('movil');
    	$clientes->save();
    	return redirect()->route('config.clientes')->with([
    		'message'=>$clientes->nombres.' ha sido agregado correctamente'
    	]);
    }

    public function updatePage($cliente_ide) {
    	$clientes = \App\Clientes::findOrFail($cliente_ide);
    	return view('clientes.update',['listclientes'=>$clientes]);
    }

    public function updateForm(Request $request) {
    	$data = $request->validate([
    		'dni'=>'required',
    		'dni'=>Rule::unique('list_clientes', 'dni')->ignore($request->input('cliente_ide')),
    		'nombres'=>'required',
    		'apellidos'=>'required',
    		'direccion'=>'required',
    		'correo'=>'required',
    		'tlf1'=>'required',
    		'tlf2'=>'required',
    		'movil'=>'required',
    	]);
    	$clientes = \App\Clientes::findOrFail($request->input('cliente_ide'));
    	$user = \Auth::user();    	
    	$clientes->user_id = $user->id;
    	$clientes->dni = $request->input('dni');
    	$clientes->nombres = $request->input('nombres');
    	$clientes->apellidos = $request->input('apellidos');
    	$clientes->direccion = $request->input('direccion');
    	$clientes->correo = $request->input('correo');
    	$clientes->telefono = $request->input('tlf1');
    	$clientes->telefono_oficina = $request->input('tlf2');
    	$clientes->movil = $request->input('movil');
    	$clientes->save();
    	return redirect()->route('config.clientes.update',['cliente_ide'=>$request->input('cliente_ide')])->with([
    		'message'=>$clientes->dni.' ha sido actualizado correctamente'
    	]);
    }

    public function deletePage($cliente_ide) {
    	$clientes = \App\Clientes::findOrFail($cliente_ide);
    	return view('clientes.delete',['listclientes'=>$clientes]);
    }

    public function deleteForm(Request $request) {
    	$clientes = \App\Clientes::findOrFail($request->input('cliente_ide'));
    	$clientes->delete();
    	return redirect()->route('config.clientes')->with([
    		'message'=>$request->input('cliente_ide').' ha sido eliminado correctamente'
    	]);
    }
}
