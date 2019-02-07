@extends('layouts.principal')
@section('title') Eliminar Producto @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Productos','Eliminar'])!!}

	<div class="col-10 offset-1">

		<div class="card">
			<div class="card-header">
				Eliminar Producto
			</div>
			<div class="card-body">
				<div class="alert alert-info">

					Esto eliminará el registro por completo de la base de datos. ¿Realmente desea continuar? Tenga en cuenta que esta operación no puede ser revertida.
				</div>
				{!!\Basics::printErrors($errors->any(),$errors->all())!!}
				<form action="{{route('config.producto.delete.form')}}" id="form_productos" method="POST" class="col-12">
					@csrf
					<div class="form-row">
						<div class="form-group col-12 col-md-4">
							<label for="codigo" class="col-12 col-form-label">Código:</label>
							<div class="col-12">
								<input disabled required type="text" name="codigo" class="form-control" value="{{$producto->codigo_barrra}}">
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="descripcion" class="col-12 col-form-label">Descripción:</label>
							<div class="col-12">
								<input readonly required type="text" name="descripcion" class="form-control" value="{{$producto->descripcion}}">
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="existen" class="col-12 col-form-label">Existencia:</label>
							<div class="col-12">
								<input disabled required type="text" name="existen" class="form-control" value="{{$producto->existen}}">
							</div>
						</div>
					</div>
					
					<div class="form-row">
						<div class="form-group col-12 col-md-4">
							<label for="existencia_minima" class="col-12 col-form-label">Existencia Mínima:</label>
							<div class="col-12">
								<input disabled required type="text" name="existencia_minima" class="form-control" value="{{$producto->existencia_minima}}">
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="costo" class="col-12 col-form-label">Costo:</label>
							<div class="col-12">
								<input disabled required type="text" name="costo" class="form-control" value="{{$producto->costo}}">
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="precio_venta1" class="col-12 col-form-label">Precio de Venta 1:</label>
							<div class="col-12">
								<input disabled required type="text" name="precio_venta1" class="form-control" value="{{$producto->precio_venta1}}">
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-12 col-md-4">
							<label for="precio_venta2" class="col-12 col-form-label">Precio de Venta 2:</label>
							<div class="col-12">
								<input disabled required type="text" name="precio_venta2" class="form-control" value="{{$producto->precio_venta2}}">
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="unimed_id" class="col-12 col-form-label">Unidad de Medida:</label>
							<div class="input-group">
								<select disabled name="unimed_id" id="unidad_de_medida" class="custom-select">
	 								@foreach($unidadmedida as $unidadmed)
		   								<option value="{{$unidadmed->id}}" {{\Basics::selected($unidadmed->id,$producto->unimed_id)}}> 
		   									{{ $unidadmed->descripcion }} 
		   								</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="status" class="col-12 col-form-label">Servicio:</label>
							<div class="col-12">
								<select disabled name="status" id="status" class="custom-select">
									<option value="1" {{\Basics::selected(1,$producto->servicio)}}>Si</option>
									<option value="0" {{\Basics::selected(0,$producto->servicio)}}>No</option>
								</select>
							</div>
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-12 col-md-4">
							<label for="empre_id" class="col-12 col-form-label">Empresa:</label>
							<div class="input-group">
								<select disabled name="empre_id" id="empresa" class="custom-select">
	 								@foreach($empresas as $empresa)
		   								<option value="{{$empresa->id}}" {{\Basics::selected($empresa->id,$producto->empre_id)}}> 
		   									{{ $empresa->razon_social }} 
		   								</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="descuento" class="col-12 col-form-label"> Descuento:</label>
							<div class="col-12">
								<input disabled required type="text" name="descuento" class="form-control" value="{{$producto->porcentaje_descuento}}">
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="impuestos_id" class="col-12 col-form-label">Impuesto:</label>
							<div class="input-group">
								<select disabled name="impuestos_id" id="impuestos_id" class="custom-select">
	 								@foreach($impuestos as $impuesto)
		   								<option value="{{$impuesto->id}}" {{\Basics::selected($impuesto->id,$producto->impuestos_id)}}> 
		   									{{ $impuesto->descripcion }} 
		   								</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					
					<div class="btn-group d-flex justify-content-center mt-5">

						<a href="{{route('config.producto')}}" class="btn btn-link mr-2">
							<i class="fa fa-arrow-left"></i> Volver
						</a>
						<button class="btn btn-danger">

							<i class="fa fa-save"></i> Si, continuar
						</button>
					</div>
					<input type="hidden" name="producto_id" value="{{$producto->id}}">

				</form>
			</div>
		</div>
	</div>
@endsection