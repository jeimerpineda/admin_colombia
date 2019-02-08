@extends('layouts.principal')
@section('title') Eliminar Proveedor @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Proveedores','Eliminar'])!!}

	<div class="col-10 offset-1 col-xs-10 col-md-10 offset-md-1 offset-xs-1">

		<div class="card">
			<div class="card-header">
				Eliminar Proveedor
			</div>
			<div class="card-body">
				{!!\Basics::printMessage('message')!!}
				{!!\Basics::printErrors($errors->any(),$errors->all())!!}
				<form action="{{route('config.proveedor.delete.form')}}" id="form_proveedor" method="POST" class="col-md-12 col-xs-12 col-form-label">
					@csrf
					<div class="form-row">
						<div class="form-group col-12 col-md-4">
							<label for="tipo" class="col-12 col-form-label">Tipo:</label>
							<div class="input-group">
								<select name="tipo" id="tipo" class="custom-select" disabled>
									<option value=""></option>
		   							<option value="0" {{\Basics::selected(0,$proveedor->tipo)}}>Persona Natural</option>
		   							<option value="1" {{\Basics::selected(1,$proveedor->tipo)}}>Persona Juridica</option>
								</select>
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="tipo_identificacion" class="col-12 col-form-label">Tipo de Identificación:</label>
							<div class="input-group">
								<select name="tipo_identificacion" id="tipodocumento" class="custom-select" disabled>
									<option value=""></option>
	 								@foreach($tipodocumento as $tipo_documento)
		   								<option value="{{$tipo_documento->id}}" {{\Basics::selected($tipo_documento->id,$proveedor->tipo_identificacion)}}> 
		   									{{ $tipo_documento->descripcion }} 
		   								</option>
									@endforeach
								</select>
								<div class="input-group-append">
									<button data-toggle="modal" data-target="#tipo_documento" type="button" class="btn btn-outline-dark btn-sm" disabled><i class="fa fa-plus-circle fa-lg"></i></button>
								</div>
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="numero_documento" class="col-12 col-form-label">Número de Documento:</label>
							<div class="col-12">
								<input required type="text" name="numero_documento" class="form-control" value="{{ $proveedor->numero_documento }}" disabled>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-12 col-md-4">
							<label for="nombre_legal" class="col-12 col-form-label">Nombre Legal:</label>
							<div class="col-12">
								<input required type="text" name="nombre_legal" class="form-control" value="{{ $proveedor->nombre_legal }}" disabled>
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="direccion" class="col-12 col-form-label">Dirección:</label>
							<div class="col-12">
								<input required type="text" name="direccion" class="form-control" value="{{ $proveedor->direccion }}" disabled>
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="telefono_principal" class="col-12 col-form-label">Teléfono Principal:</label>
							<div class="col-12">
								<input required type="text" name="telefono_principal" class="form-control" value="{{ $proveedor->telefono_principal }}" disabled>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-12 col-md-4">
							<label for="telefono_secundario" class="col-12 col-form-label">Teléfono Secundario:</label>
							<div class="col-12">
								<input type="text" name="telefono_secundario" class="form-control" value="{{ $proveedor->telefono_secundario }}" disabled>
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="direccion" class="col-12 col-form-label">Régimen de Iva:</label>
							<div class="input-group">
								<select name="regimen_iva_id" id="regimen_iva_id" class="custom-select" disabled>
									<option value=""></option>
	 								@foreach($regimeniva as $regimen)
		   								<option value="{{$regimen->id}}" {{\Basics::selected($regimen->id,$proveedor->regimen_iva_id) }}> 
		   									{{ $regimen->descripcion }} 
		   								</option>
									@endforeach
								</select>
								<div class="input-group-append">
									<button data-toggle="modal" data-target="#regimen_iva" type="button" class="btn btn-outline-dark btn-sm" disabled><i class="fa fa-plus-circle fa-lg"></i></button>
								</div>
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="telefono_principal" class="col-12 col-form-label">Gran Contribuyente:</label>
							<div class="col-12 offset-2">
								<label class="radio-inline"><input disabled type="radio" name="gran_contribuyente" value="1" {{\Basics::checked(1,$proveedor->gran_contribuyente) }}> Si </label>
								<label class="radio-inline offset-2"><input disabled type="radio" name="gran_contribuyente" value="0" {{\Basics::checked(0,$proveedor->gran_contribuyente) }}> No </label>
							</div>
						</div>
					</div>
					<div class="btn-group d-flex justify-content-center">
						<a href="{{route('config.proveedor')}}" class="btn btn-link mr-2">
							<i class="fa fa-arrow-left"></i> Volver
						</a>
						<button class="btn btn-danger">
							<i class="fa fa-save"></i> Si, continuar
						</button>
					</div>
					<input type="hidden" value="{{$proveedor->id}}" name="proveedor_id">
				</form>
			</div>
		</div>
	</div>
@endsection