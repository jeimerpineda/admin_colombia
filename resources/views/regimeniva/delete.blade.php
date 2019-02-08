@extends('layouts.principal')
@section('title') Eliminar Regimen de Iva @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Regimen de Iva','Eliminar'])!!}

	<div class="col-xs-6 col-md-6 offset-md-3 offset-xs-3">

		<div class="card">
			<div class="card-header">
				Eliminar Regimen de Iva
			</div>
			<div class="card-body">
				<div class="alert alert-info">
					Esta acción borrará el registro de la base de datos. ¿Está segur@ que desea continuar?
				</div>
				<form action="{{route('config.regimeniva.delete.form')}}" id="form_regimeniva" method="POST" class="col-md-8 col-xs-6 col-form-label offset-md-2 offset-xs-3">
					@csrf
					<div class="form-group row">

						<label for="descripcion" class="col-md-4 col-xs-12 col-form-label">Descripci&oacute;n:</label>
						<div class="col-md-8 col-xs-12">
							<input disabled readonly type="text" name="descripcion" class="form-control" value="{{$regimeniva->descripcion}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-md-4 col-xs-12 col-form-label">Status:</label>
						<div class="col-md-8 col-xs-12">

							<select disabled name="status" id="status" class="custom-select">
								<option value="1" {{\Basics::selected(1,$regimeniva->status)}}>Activo</option>
								<option value="0" {{\Basics::selected(0,$regimeniva->status)}}>Inactivo</option>
							</select>
						</div>
					</div>
					<div class="btn-group d-flex justify-content-center">
						<a href="{{route('config.regimeniva')}}" class="btn btn-link mr-2">
							<i class="fa fa-arrow-left"></i> Volver
						</a>
						<button class="btn btn-danger">
							<i class="fa fa-times"></i> Si, continuar
						</button>
					</div>
					<input type="hidden" value="{{$regimeniva->id}}" name="regimen_id">
				</form>
			</div>
		</div>
	</div>
@endsection