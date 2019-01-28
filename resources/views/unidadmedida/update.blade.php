@extends('layouts.principal')
@section('title') Actualizar Unidad de Medida @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Unidades de Medida','Actualizar'])!!}
	<div class="col-8 offset-2">
		<div class="card">
			<div class="card-header">
				Actualizar Unidad de Medida
			</div>
			<div class="card-body">
				{!!\Basics::printMessage('message')!!}
				{!!\Basics::printErrors($errors->any(),$errors->all())!!}
				<form action="{{route('config.unidadmedida.update.form')}}" id="form_unidadmedida" method="POST" class="col-8 offset-2">
					@csrf
					<div class="form-group row">
						<label for="descripcion" class="col-3 col-form-label">Descripci&oacute;:</label>
						<div class="col-9">
							<input required type="text" name="descripcion" class="form-control" value="{{$unidmed->descripcion}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-2 col-form-label">Status:</label>
						<div class="col-10">
							<select name="status" id="status" class="custom-select">
								<option value="1" {{\Basics::selected(1,$unidmed->status)}}>Activo</option>
								<option value="0" {{\Basics::selected(0,$unidmed->status)}}>Inactivo</option>
							</select>
						</div>
					</div>
					<div class="btn-group d-flex justify-content-center">
						<a href="{{route('config.unidadmedida')}}" class="btn btn-link mr-2">
							<i class="fa fa-arrow-left"></i> Volver
						</a>
						<button class="btn btn-primary">
							<i class="fa fa-save"></i> Guardar Cambios
						</button>
					</div>
					<input type="hidden" value="{{$unidmed->id}}" name="unidmed_id">
				</form>
			</div>
		</div>
	</div>
@endsection