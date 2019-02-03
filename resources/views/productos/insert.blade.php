@extends('layouts.principal')
@section('title') Agregar Producto @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Productos','Agregar'])!!}

	<div class="col-10 offset-1">

		<div class="card">
			<div class="card-header">
				Agregar Producto
			</div>
			<div class="card-body">
				{!!\Basics::printErrors($errors->any(),$errors->all())!!}

				<form action="{{route('config.productos.insert.form')}}" id="form_productos" method="POST" class="col-12">
					@csrf
					<div class="form-row">
						<div class="form-group col-12 col-md-4">
							<label for="codigo" class="col-12 col-form-label">Código:</label>
							<div class="col-12">
								<input required type="text" name="codigo" class="form-control" value="{{old('codigo_barra')}}">
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="descripcion" class="col-12 col-form-label">Descripción:</label>
							<div class="col-12">
								<input required type="text" name="descripcion" class="form-control" value="{{old('descripcion')}}">
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="existen" class="col-12 col-form-label">Existencia:</label>
							<div class="col-12">
								<input required type="text" name="existen" class="form-control" value="{{old('existen')}}">
							</div>
						</div>
					</div>
					
					<div class="form-row">
						<div class="form-group col-12 col-md-4">
							<label for="existencia_minima" class="col-12 col-form-label">Existencia Mínima:</label>
							<div class="col-12">
								<input required type="text" name="existencia_minima" class="form-control" value="{{old('existencia_minima')}}">
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="costo" class="col-12 col-form-label">Costo:</label>
							<div class="col-12">
								<input required type="text" name="costo" class="form-control" value="{{old('costo')}}">
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="costo_dolar" class="col-12 col-form-label">Costo Dólar:</label>
							<div class="col-12">
								<input required type="text" name="costo_dolar" class="form-control" value="{{old('costo_dolar')}}">
							</div>
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-12 col-md-4">
							<label for="precio_venta1" class="col-12 col-form-label">Precio de Venta 1:</label>
							<div class="col-12">
								<input required type="text" name="precio_venta1" class="form-control" value="{{old('precio_venta1')}}">
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="precio_venta2" class="col-12 col-form-label">Precio de Venta 2:</label>
							<div class="col-12">
								<input required type="text" name="precio_venta2" class="form-control" value="{{old('precio_venta2')}}">
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="precio_venta_dolar1" class="col-12 col-form-label">Precio de Venta Dólar 1:</label>
							<div class="col-12">
								<input required type="text" name="precio_venta_dolar1" class="form-control" value="{{old('precio_venta_dolar1')}}">
							</div>
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-12 col-md-4">
							<label for="precio_venta_dolar2" class="col-12 col-form-label">Precio de Venta Dólar 2:</label>
							<div class="col-12">
								<input required type="text" name="precio_venta_dolar2" class="form-control" value="{{old('precio_venta_dolar2')}}">
							</div>
						</div>

						<div class="form-group col-12 col-md-4">
							<label for="unimed_id" class="col-12 col-form-label">Unidad de Medida:</label>
							<div class="input-group">
								<select name="unimed_id" id="unidad_de_medida" class="custom-select">
									<option value=""></option>
	 								@foreach($unidadmedida as $unidadmed)
		   								<option value="{{$unidadmed->id}}"> 
		   									{{ $unidadmed->descripcion }} 
		   								</option>
									@endforeach
								</select>
								<div class="input-group-append">
									<button data-toggle="modal" data-target="#unid_med" type="button" class="btn btn-outline-dark btn-sm"><i class="fa fa-plus-circle fa-lg"></i></button>
								</div>
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="status" class="col-12 col-form-label">Servicio:</label>
							<div class="col-12">
								<select name="status" id="status" class="custom-select">
									<option value="1" {{\Basics::selected(1,old('status'))}}>Si</option>
									<option value="0" {{\Basics::selected(0,old('status'))}}>No</option>
								</select>
							</div>
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-12 col-md-4">
							<label for="empre_id" class="col-12 col-form-label">Empresa:</label>
							<div class="input-group">
								<select name="empre_id" id="empresa" class="custom-select">
									<option value=""></option>
	 								@foreach($empresas as $empresa)
		   								<option value="{{$empresa->id}}"> 
		   									{{ $empresa->razon_social }} 
		   								</option>
									@endforeach
								</select>
								<div class="input-group-append">
									<button data-toggle="modal" data-target="#modal_empresa" type="button" class="btn btn-outline-dark btn-sm"><i class="fa fa-plus-circle fa-lg"></i></button>
								</div>
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="descuento" class="col-12 col-form-label"> Descuento:</label>
							<div class="col-12">
								<input required type="text" name="descuento" class="form-control" value="{{old('porcentaje_descuento')}}">
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="impuestos_id" class="col-12 col-form-label">Impuesto:</label>
							<div class="input-group">
								<select name="impuestos_id" id="impuestos_id" class="custom-select">
									<option value=""></option>
	 								@foreach($impuestos as $impuesto)
		   								<option value="{{$impuesto->id}}"> 
		   									{{ $impuesto->descripcion }} 
		   								</option>
									@endforeach
								</select>
								<div class="input-group-append">
									<button data-toggle="modal" data-target="#modal_impuesto" type="button" class="btn btn-outline-dark btn-sm"><i class="fa fa-plus-circle fa-lg"></i></button>
								</div>
							</div>
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


	@include('unidadmedida.UnidMedi_fastInsert')
	@include('empresa.Empresa_FastInsert')
	@include('impuestos.Impuestos_FastInsert')

@endsection