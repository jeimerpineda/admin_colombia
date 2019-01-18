<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmpresaController extends Controller
{
    public function index() {
    	$empresa = \App\Empresa::orderBy('id','desc')->paginate(10);
    	return view('empresa.index',['listempresa'=>$empresa]);
    }

    public function insertPage() {
    	return view('empresa.insert');
    }

    public function insertForm(Request $request) {
    	$data = $request->validate([
    		'nit'=>'required|unique:list_empresa,nit',
    		'razon'=>'required',
    		'direccion'=>'required',
    		'correo'=>'required',
    		'tlf1'=>'required',
    		'sucursal'=>'required',
    	]);
    	$empresa = new \App\Empresa;
    	$user = \Auth::user();
    	$empresa->user_id = $user->id;
    	$empresa->nit = $request->input('nit');
    	$empresa->razon_social = $request->input('razon');
    	$empresa->direccion = $request->input('direccion');
    	$empresa->correo = $request->input('correo');
    	$empresa->telefono_principal = $request->input('tlf1');
    	$empresa->telefono_segundario = $request->input('tlf2');
    	$empresa->sucursal = $request->input('sucursal');
    	$empresa->save();
    	return redirect()->route('config.empresa')->with([
    		'message'=>$empresa->razon_social.' ha sido agregado correctamente'
    	]);
    }

    public function updatePage($empresa_ide) {
    	$empresa = \App\Empresa::findOrFail($empresa_ide);
    	return view('empresa.update',['listempresa'=>$empresa]);
    }

    public function updateForm(Request $request) {
    	$data = $request->validate([
    		'nit'=>'required',
    		'nit'=>Rule::unique('list_empresa', 'razon_social')->ignore($request->input('empresa_ide')),
    		'razon'=>'required',
    		'direccion'=>'required',
    		'correo'=>'required',
    		'tlf1'=>'required',
    		'sucursal'=>'required',
    	]);
    	$empresa = \App\Empresa::findOrFail($request->input('empresa_ide'));
    	$user = \Auth::user();
    	$empresa->nit = $request->input('nit');
    	$empresa->razon_social = $request->input('razon');
    	$empresa->direccion = $request->input('direccion');
    	$empresa->correo = $request->input('correo');
    	$empresa->telefono_principal = $request->input('tlf1');
    	$empresa->telefono_segundario = $request->input('tlf2');
    	$empresa->sucursal = $request->input('sucursal');
    	$empresa->save();
    	return redirect()->route('config.empresa.update',['empresa_ide'=>$request->input('empresa_ide')])->with([
    		'message'=>$empresa->descripcion.' ha sido actualizado correctamente'
    	]);
    }

    public function deletePage($empresa_ide) {
    	$empresa = \App\Empresa::findOrFail($empresa_ide);
    	return view('empresa.delete',['listempresa'=>$empresa]);
    }

    public function deleteForm(Request $request) {
    	$empresa = \App\Empresa::findOrFail($request->input('empresa_ide'));
    	$empresa->delete();
    	return redirect()->route('config.empresa')->with([
    		'message'=>$request->input('empresa_ide').' ha sido eliminado correctamente'
    	]);
    }
}
