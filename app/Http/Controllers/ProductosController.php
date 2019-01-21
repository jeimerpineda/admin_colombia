<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductosController extends Controller
{
    public function index() {
    	$productos = \App\Productos::orderBy('id','desc')->paginate(10);
    	$empresas = \App\Empresa::All();
    	return view('productos.index',['listproductos'=>$productos],compact('empresas'));
    }

    public function insertPage() {
    	$unidadmedida = \App\UnidadMedida::All();
    	$empresas = \App\Empresa::All();
    	$impuestos = \App\Impuestos::All();
    	return view('productos.insert',compact('unidadmedida','empresas','impuestos'));
    }

    public function insertForm(Request $request) {
    	$data = $request->validate([
    		'codigo'=>'required|unique:productos,codigo_barrra',
    		'descripcion'=>'required',
    		'existen'=>'required',
    		'existencia_minima'=>'required',
    		'costo'=>'required',
    		'costo_dolar'=>'required',
    		'precio_venta1'=>'required',
    		'precio_venta2'=>'required',
    		'precio_venta_dolar1'=>'required',
    		'precio_venta_dolar2'=>'required',
    		'unimed_id'=>'required',
    		'status'=>'required',
    		'empre_id'=>'required',
    		'descuento'=>'required',
    		'impuestos_id'=>'required',
    	]);
    	$productos = new \App\Productos;
    	$user = \Auth::user();
    	$productos->user_id = $user->id;
    	$productos->codigo_barrra = $request->input('codigo');
    	$productos->descripcion = $request->input('descripcion');
    	$productos->existen = $request->input('existen');
    	$productos->existencia_minima = $request->input('existencia_minima');
    	$productos->costo = $request->input('costo');
    	$productos->costo_dolar = $request->input('costo_dolar');
    	$productos->precio_venta1 = $request->input('precio_venta1');
    	$productos->precio_venta2 = $request->input('precio_venta2');
    	$productos->precio_venta_dolar1 = $request->input('precio_venta_dolar1');
    	$productos->precio_venta_dolar2 = $request->input('precio_venta_dolar2');
    	$productos->unimed_id = $request->input('unimed_id');
    	$productos->servicio = $request->input('status');
    	$productos->empre_id = $request->input('empre_id');
    	$productos->porcentaje_descuento = $request->input('descuento');
    	$productos->impuestos_id = $request->input('impuestos_id');
    	$productos->save();
    	return redirect()->route('config.productos')->with([
    		'message'=>$productos->descripcion.' ha sido agregado correctamente'
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
