@extends('layouts.principal')
@section('title') Actualizar Producto @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Productos','Actualizar'])!!}
	<div class="col-12 offset-20">
		<div class="card">
			<div class="card-header">
				Actualizar Producto
			</div>
			<div class="card-body">
				{!!\Basics::printMessage('message')!!}
				{!!\Basics::printErrors($errors->any(),$errors->all())!!}
				<form action="{{route('config.productos.update.form')}}" id="form_productos" method="POST" class="col-12 offset-20">
					@csrf
					<div class="row">
  						<div class="col-sm-6">
    						<div class="card">
     						 <div class="card-body">
					<div class="form-group row">
						<label for="codigo" class="col-3 col-form-label">Código:</label>
						<div class="col-9">
							<input required type="text" name="codigo" class="form-control" value="{{$producto->codigo_barrra}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="descripcion" class="col-3 col-form-label">Descripción:</label>
						<div class="col-9">
							<input required type="text" name="descripcion" class="form-control" value="{{$producto->descripcion}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="existen" class="col-3 col-form-label">Existencia:</label>
						<div class="col-9">
							<input required type="text" name="existen" class="form-control" value="{{$producto->existen}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="existencia_minima" class="col-3 col-form-label">Existencia Mínima:</label>
						<div class="col-9">
							<input required type="text" name="existencia_minima" class="form-control" value="{{$producto->existencia_minima}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="costo" class="col-3 col-form-label">Costo:</label>
						<div class="col-9">
							<input required type="text" name="costo" class="form-control" value="{{$producto->costo}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="costo_dolar" class="col-3 col-form-label">Costo Dolar:</label>
						<div class="col-9">
							<input required type="text" name="costo_dolar" class="form-control" value="{{$producto->costo_dolar}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="precio_venta1" class="col-3 col-form-label">Precio de Venta 1:</label>
						<div class="col-9">
							<input required type="text" name="precio_venta1" class="form-control" value="{{$producto->precio_venta1}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="precio_venta2" class="col-3 col-form-label">Precio de Venta 2:</label>
						<div class="col-9">
							<input required type="text" name="precio_venta2" class="form-control" value="{{$producto->precio_venta2}}">
						</div>
					</div>
					</div>
    			</div>
  			</div>
  			<div class="col-sm-6">
					    <div class="card">
					      <div class="card-body">
					<div class="form-group row">
						<label for="precio_venta_dolar1" class="col-3 col-form-label">Precio de Venta Dolar 1:</label>
						<div class="col-9">
							<input required type="text" name="precio_venta_dolar1" class="form-control" value="{{$producto->precio_venta_dolar1}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="precio_venta_dolar2" class="col-3 col-form-label">Precio de Venta Dolar 2:</label>
						<div class="col-9">
							<input required type="text" name="precio_venta_dolar2" class="form-control" value="{{$producto->precio_venta_dolar2}}">
						</div>
					</div>

					<div class="form-group row">
						<label for="unimed_id" class="col-3 col-form-label">Unidad de Medida:</label>
						<div class="col-9">
							<select name="unimed_id" id="status" class="custom-select chosen">
 								<option value="{{$producto->unimed->id}}"> 
   									{{ $producto->unimed->descripcion }} 
   								</option>
 								@foreach($unidadmedida as $unidadmed)
   								<option value="{{$unidadmed->id}}"> 
   									{{ $unidadmed->descripcion }} 
   								</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-2 col-form-label">Servicio:</label>
						<div class="col-10">
							<select name="status" id="status" class="custom-select">
								<option value="1" {{\Basics::selected(1,old('status'))}}>Si</option>
								<option value="0" {{\Basics::selected(0,old('status'))}}>No</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="empre_id" class="col-3 col-form-label">Empresa:</label>
						<div class="col-9">
							<select name="empre_id" id="status" class="custom-select chosen">
 								<option value="{{$producto->empresa->id}}">
 										{{ $producto->empresa->razon_social }} 
   								</option>
 								@foreach($empresas as $empresa)
   								<option value="{{$empresa->id}}"> 
   									{{ $empresa->razon_social }} 
   								</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="descuento" class="col-3 col-form-label"> Descuento:</label>
						<div class="col-9">
							<input required type="text" name="descuento" class="form-control" value="{{$producto->porcentaje_descuento}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="impuestos_id" class="col-3 col-form-label">Impuesto:</label>
						<div class="col-9">
							<select name="impuestos_id" id="impuestos_id" class="custom-select chosen">
 								<option value="{{$producto->impuestos->id}}">
 										{{ $producto->impuestos->descripcion }} 
   								</option>
 								@foreach($impuestos as $impuesto)
   								<option value="{{$impuesto->id}}"> 
   									{{ $impuesto->descripcion }} 
   								</option>
								@endforeach
							</select>
						</div>
					</div>
					</div>
    			</div>
  			</div>
  		</div>
  		<br>
					<div class="btn-group d-flex justify-content-center">
						<a href="{{route('config.productos')}}" class="btn btn-link mr-2">
							<i class="fa fa-arrow-left"></i> Volver
						</a>
						<button class="btn btn-primary">
							<i class="fa fa-save"></i> Guardar Cambios
						</button>
					</div>
					<input type="hidden" value="{{$producto->id}}" name="producto_id">
				</form>
			</div>
		</div>
	</div>
@endsection
@section('js')
<script>
	$(function(){
		var j = jQuery.noConflict();
		$(".chosen").chosen({
			width:'100%',
			no_results_text:'No hay resultados para:',
			allow_single_deselect: true
		});
	});
</script>
@endsection