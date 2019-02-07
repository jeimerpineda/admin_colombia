@extends('layouts.principal')
@section('title') Agregar Proveedor @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Proveedores','Agregar'])!!}

	<div class="col-10 offset-1 col-xs-10 col-md-10 offset-md-1 offset-xs-1">

		<div class="card">
			<div class="card-header">
				Agregar Proveedor
			</div>
			<div class="card-body">
				{!!\Basics::printErrors($errors->any(),$errors->all())!!}

				<form action="{{route('config.proveedor.insert.form')}}" id="form_proveedor" method="POST" class="col-md-12 col-xs-12 col-form-label">
					@csrf
					<div class="form-row">
						<div class="form-group col-12 col-md-4">
							<label for="tipo" class="col-12 col-form-label">Tipo:</label>
							<div class="input-group">
								<select name="tipo" id="tipo" class="custom-select">
									<option value=""></option>
		   							<option value="0">Persona Natural</option>
		   							<option value="1">Persona Juridica</option>
								</select>
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="tipo_identificacion" class="col-12 col-form-label">Tipo de Identificación:</label>
							<div class="input-group">
								<select name="tipo_identificacion" id="tipodocumento" class="custom-select">
									<option value=""></option>
	 								@foreach($tipodocumento as $tipo_documento)
		   								<option value="{{$tipo_documento->id}}"> 
		   									{{ $tipo_documento->descripcion }} 
		   								</option>
									@endforeach
								</select>
								<div class="input-group-append">
									<button data-toggle="modal" data-target="#tipo_documento" type="button" class="btn btn-outline-dark btn-sm"><i class="fa fa-plus-circle fa-lg"></i></button>
								</div>
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="numero_documento" class="col-12 col-form-label">Número de Documento:</label>
							<div class="col-12">
								<input required type="text" name="numero_documento" class="form-control" value="{{old('numero_documento')}}">
							</div>
						</div>
					</div>
					
					<div class="form-row">
						<div class="form-group col-12 col-md-4">
							<label for="nombre_legal" class="col-12 col-form-label">Nombre Legal:</label>
							<div class="col-12">
								<input required type="text" name="nombre_legal" class="form-control" value="{{old('nombre_legal')}}">
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="direccion" class="col-12 col-form-label">Dirección:</label>
							<div class="col-12">
								<input required type="text" name="direccion" class="form-control" value="{{old('direccion')}}">
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="telefono_principal" class="col-12 col-form-label">Teléfono Principal:</label>
							<div class="col-12">
								<input required type="text" name="telefono_principal" class="form-control" value="{{old('telefono_principal')}}">
							</div>
						</div>
					</div>
					
					<div class="form-row">
						<div class="form-group col-12 col-md-4">
							<label for="telefono_secundario" class="col-12 col-form-label">Teléfono Secundario:</label>
							<div class="col-12">
								<input type="text" name="telefono_secundario" class="form-control" value="{{old('telefono_secundario')}}">
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="direccion" class="col-12 col-form-label">Régimen de Iva:</label>
							<div class="input-group">
								<select name="regimen_iva_id" id="regimen_iva_id" class="custom-select">
									<option value=""></option>
	 								@foreach($regimeniva as $regimen)
		   								<option value="{{$regimen->id}}"> 
		   									{{ $regimen->descripcion }} 
		   								</option>
									@endforeach
								</select>
								<div class="input-group-append">
									<button data-toggle="modal" data-target="#regimen_iva" type="button" class="btn btn-outline-dark btn-sm"><i class="fa fa-plus-circle fa-lg"></i></button>
								</div>
							</div>
						</div>
						<div class="form-group col-12 col-md-4">
							<label for="telefono_principal" class="col-12 col-form-label">Gran Contribuyente:</label>
							<div class="col-12 offset-2">
								<label class="radio-inline"><input type="radio" name="gran_contribuyente" value="1" checked> Si </label>
								<label class="radio-inline offset-2"><input type="radio" name="gran_contribuyente" value="0"> No </label>
							</div>
						</div>
					</div>					

					<div class="btn-group d-flex justify-content-center">
						<a href="{{route('config.proveedor')}}" class="btn btn-link mr-2">
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

	@include('tipodocumento.TipoDocumento_fastInsert')
	@include('regimeniva.RegimenIva_fastInsert')

@endsection