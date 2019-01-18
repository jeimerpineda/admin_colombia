@extends('layouts.principal')
@section('title') Agregar Producto @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Productos','Agregar'])!!}
	<div class="col-8 offset-2">
		<div class="card">
			<div class="card-header">
				Agregar Producto
			</div>
			<div class="card-body">
				{!!\Basics::printErrors($errors->any(),$errors->all())!!}
				<form action="{{route('config.productos.insert.form')}}" id="form_productos" method="POST" class="col-8 offset-2">
					@csrf
					<div class="form-group row">
						<label for="codigo" class="col-3 col-form-label">Código:</label>
						<div class="col-9">
							<input required type="text" name="codigo" class="form-control" value="{{old('codigo_barra')}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="descripcion" class="col-3 col-form-label">Descripción:</label>
						<div class="col-9">
							<input required type="text" name="descripcion" class="form-control" value="{{old('descripcion')}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="existen" class="col-3 col-form-label">Existencia:</label>
						<div class="col-9">
							<input required type="text" name="existen" class="form-control" value="{{old('existen')}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="existencia_minima" class="col-3 col-form-label">Existencia Mínima:</label>
						<div class="col-9">
							<input required type="text" name="existencia_minima" class="form-control" value="{{old('existencia_minima')}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="costo" class="col-3 col-form-label">Costo:</label>
						<div class="col-9">
							<input required type="text" name="costo" class="form-control" value="{{old('costo')}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="costo_dolar" class="col-3 col-form-label">Costo Dolar:</label>
						<div class="col-9">
							<input required type="text" name="tlf1" class="form-control" value="{{old('costo_dolar')}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="precio_venta1" class="col-3 col-form-label">Precio de Venta 1:</label>
						<div class="col-9">
							<input required type="text" name="precio_venta1" class="form-control" value="{{old('precio_venta1')}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="precio_venta2" class="col-3 col-form-label">Precio de Venta 2:</label>
						<div class="col-9">
							<input required type="text" name="precio_venta2" class="form-control" value="{{old('precio_venta2')}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="precio_venta_dolar1" class="col-3 col-form-label">Precio de Venta Dolar 1:</label>
						<div class="col-9">
							<input required type="text" name="precio_venta_dolar1" class="form-control" value="{{old('precio_venta_dolar1')}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="precio_venta_dolar2" class="col-3 col-form-label">Precio de Venta Dolar 2:</label>
						<div class="col-9">
							<input required type="text" name="precio_venta_dolar2" class="form-control" value="{{old('precio_venta_dolar2')}}">
						</div>
					</div>

					<div class="form-group row">
						<label for="unimed_id" class="col-3 col-form-label">Unidad de Medida:</label>
						<div class="col-9">
							<select name="unimed_id" id="status" class="custom-select">
 								@foreach($listunimed as $bc)
   								<option value="{{$bc->unidadmedida->id}}"> 
   									{{ $bc->unidadmedida->descripcion }} 
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
							<select name="empre_id" id="status" class="custom-select">
 								@foreach($listempre as $bc2)
   								<option value="{{$bc2->empresa->id}}"> 
   									{{ $bc2->empresa->razon_social }} 
   								</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="descuento" class="col-3 col-form-label"> Descuento:</label>
						<div class="col-9">
							<input required type="text" name="descuento" class="form-control" value="{{old('porcentaje_descuento')}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="impuestos_id" class="col-3 col-form-label">Impuesto:</label>
						<div class="col-9">
							<select name="impuestos_id" id="impuestos_id" class="custom-select">
 								@foreach($listempre as $bc3)
   								<option value="{{$bc3->impuesto->id}}"> 
   									{{ $bc3->impuesto->descripcion }} 
   								</option>
								@endforeach
							</select>
						</div>
					</div>
					
					<div class="btn-group d-flex justify-content-center">
						<a href="{{route('config.productos')}}" class="btn btn-link mr-2">
							<i class="fa fa-arrow-left"></i> Volver
						</a>
						<button class="btn btn-primary">
							<i class="fa fa-save"></i> Crear
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection