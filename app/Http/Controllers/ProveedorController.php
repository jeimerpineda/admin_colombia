<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProveedorController extends Controller
{
    public function index() {
    	$proveedores = \App\Proveedor::orderBy('id','desc')->paginate(10);
    	return view('proveedor.index',['proveedores'=>$proveedores]);
    }

    public function insertPage() {
    	$regimeniva = \App\RegimenIva::All();
        $tipodocumento = \App\TipoDocumento::All();
    	return view('proveedor.insert',compact('regimeniva','tipodocumento'));
    }

    public function insertForm(Request $request) {
    	$data = $request->validate([
    		'nombre_legal'=>'required|unique:list_proveedores,nombre_legal',
    		'regimen_iva_id'=>'required',
    		'tipo'=>'required',
    		'tipo_identificacion'=>'required',
    		'numero_documento'=>'required',
    		'direccion'=>'required',
    		'telefono_principal'=>'required'
    	]);
    	$proveedor = new \App\Proveedor;
    	$user = \Auth::user();
    	$proveedor->user_id = $user->id;
    	$proveedor->regimen_iva_id = $request->input('regimen_iva_id');
    	$proveedor->tipo = $request->input('tipo');
    	$proveedor->tipo_identificacion = $request->input('tipo_identificacion');
    	$proveedor->numero_documento = $request->input('numero_documento');
    	$proveedor->nombre_legal = $request->input('nombre_legal');
    	$proveedor->direccion = $request->input('direccion');
    	$proveedor->telefono_principal = $request->input('telefono_principal');
    	$proveedor->telefono_secundario = $request->input('telefono_secundario');
    	$proveedor->gran_contribuyente = $request->input('gran_contribuyente');
    	$proveedor->save();
    	return redirect()->route('config.proveedor')->with([
    		'message'=>$proveedor->descripcion.' ha sido agregado correctamente'
    	]);
    }

    // public function insertFormFast(Request $request) {
    	// $data = $request->validate([
    	// 	'nombre_legal'=>'required|unique:list_proveedores,nombre_legal',
    	// 	'regimen_iva_id'=>'required',
    	// 	'tipo'=>'required',
    	// 	'tipo_identificacion'=>'required',
    	// 	'numero_documento'=>'required',
    	// 	'direccion'=>'required',
    	// 	'telefono_principal'=>'required'
    	// ]);
    	// $proveedor = new \App\Proveedor;
    	// $user = \Auth::user();
    	// $proveedor->user_id = $user->id;
    	// $proveedor->regimen_iva_id = $request->input('regimen_iva_id');
    	// $proveedor->tipo = $request->input('tipo');
    	// $proveedor->tipo_identificacion = $request->input('tipo_identificacion');
    	// $proveedor->numero_documento = $request->input('numero_documento');
    	// $proveedor->nombre_legal = $request->input('nombre_legal');
    	// $proveedor->direccion = $request->input('direccion');
    	// $proveedor->telefono_principal = $request->input('telefono_principal');
    	// $proveedor->telefono_secundario = $request->input('telefono_secundario');
    	// $proveedor->gran_contribuyente = $request->input('gran_contribuyente');
    	// $proveedor->save();
    //     return response()->json(\App\Proveedor::all());
    // }

    public function updatePage($proveedor_id) {
    	$proveedor = \App\Proveedor::findOrFail($proveedor_id);
        $regimeniva = \App\RegimenIva::All();
        $tipodocumento = \App\TipoDocumento::All();
    	return view('proveedor.update',compact('proveedor','regimeniva','tipodocumento'));
    }

    public function updateForm(Request $request) {
    	$data = $request->validate([
    		'nombre_legal'=>'required',
    		'nombre_legal'=>Rule::unique('list_proveedores','nombre_legal')->ignore($request->input('proveedor_id')),
    		'regimen_iva_id'=>'required',
    		'tipo'=>'required',
    		'tipo_identificacion'=>'required',
    		'numero_documento'=>'required',
    		'direccion'=>'required',
    		'telefono_principal'=>'required'
    	]);
    	$proveedor = \App\Proveedor::findOrFail($request->input('proveedor_id'));
    	$user = \Auth::user();
    	$proveedor->user_id = $user->id;
    	$proveedor->regimen_iva_id = $request->input('regimen_iva_id');
    	$proveedor->tipo = $request->input('tipo');
    	$proveedor->tipo_identificacion = $request->input('tipo_identificacion');
    	$proveedor->numero_documento = $request->input('numero_documento');
    	$proveedor->nombre_legal = $request->input('nombre_legal');
    	$proveedor->direccion = $request->input('direccion');
    	$proveedor->telefono_principal = $request->input('telefono_principal');
    	$proveedor->telefono_secundario = $request->input('telefono_secundario');
    	$proveedor->gran_contribuyente = $request->input('gran_contribuyente');
    	$proveedor->save();

    	return redirect()->route('config.proveedor.update',['proveedor_id'=>$request->input('proveedor_id')])->with([
    		'message'=>$proveedor->nombre_legal.' ha sido actualizado correctamente'
    	]);
    }

    public function deletePage($proveedor_id) {
    	$proveedor = \App\Proveedor::findOrFail($proveedor_id);
        $regimeniva = \App\RegimenIva::All();
        $tipodocumento = \App\TipoDocumento::All();
    	return view('proveedor.delete',compact('proveedor','regimeniva','tipodocumento'));
    }

    public function deleteForm(Request $request) {
    	$proveedor = \App\Proveedor::findOrFail($request->input('proveedor_id'));
    	$proveedor->delete();
    	return redirect()->route('config.proveedor')->with([
    		'message'=>$request->input('nombre_legal').' ha sido eliminado correctamente'
    	]);
    }
}
