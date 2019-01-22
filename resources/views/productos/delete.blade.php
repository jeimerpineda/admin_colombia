@extends('layouts.principal')
@section('title') Eliminar Producto @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Productos','Eliminar'])!!}
	<div class="col-8 offset-2">
		<div class="card">
			<div class="card-header">
				Eliminar Producto
			</div>
			<div class="card-body">
				<div class="alert alert-info">
					Esta acción borrará el registro de la base de datos. ¿Está segur@ que desea continuar?
				</div>
				<form action="{{route('config.productos.delete.form')}}" id="form_productos" method="POST" class="col-8 offset-2">
					@csrf
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
							<input required type="text" name="unimed_id" class="form-control" value="{{ $producto->unimed->descripcion }}">
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
							<input required type="text" name="empre_id" class="form-control" value="{{ $producto->empresa->razon_social }}">
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
								<input required type="text" name="impuestos_id" class="form-control" value="{{ $producto->impuestos->descripcion }}">
						</div>
					</div>
					<div class="btn-group d-flex justify-content-center">
						<a href="{{route('config.clientes')}}" class="btn btn-link mr-2">
							<i class="fa fa-arrow-left"></i> Volver
						</a>
						<button class="btn btn-danger">
							<i class="fa fa-times"></i> Si, continuar
						</button>
					</div>
					<input type="hidden" value="{{$producto->id}}" name="producto_id">
				</form>
			</div>
		</div>
	</div>
@endsection