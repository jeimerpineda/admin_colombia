@extends('layouts.principal')
@section('title') Actualizar Formas de Pago @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Formas de Pago','Actualizar'])!!}
	<div class="col-8 offset-2">
		<div class="card">
			<div class="card-header">
				Actualizar Formas de Pago
			</div>
			<div class="card-body">
				{!!\Basics::printMessage('message')!!}
				{!!\Basics::printErrors($errors->any(),$errors->all())!!}
				<form action="{{route('config.formasdepago.update.form')}}" id="form_formaspago" method="POST" class="col-8 offset-2">
					@csrf
					<div class="form-group row">
						<label for="descripcion" class="col-2 col-form-label">Descripcion:</label>
						<div class="col-10">
							<input required type="text" name="descripcion" class="form-control" value="{{$formaspagos->descripcion}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="dias" class="col-2 col-form-label">Dias:</label>
						<div class="col-10">
							<input required type="number" min="0" name="dias" class="form-control" value="{{$formaspagos->dias}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-2 col-form-label">Status:</label>
						<div class="col-10">
							<select name="status" id="status" class="custom-select">
								<option value="1" {{\Basics::selected(1,$formaspagos->status)}}>Activo</option>
								<option value="0" {{\Basics::selected(0,$formaspagos->status)}}>Inactivo</option>
							</select>
						</div>
					</div>
					
					<div class="btn-group d-flex justify-content-center">
						<a href="{{route('config.formasdepago')}}" class="btn btn-link mr-2">
							<i class="fa fa-arrow-left"></i> Volver
						</a>
						<button class="btn btn-primary">
							<i class="fa fa-save"></i> Guardar Cambios
						</button>
					</div>
					<input type="hidden" value="{{$formaspagos->id}}" name="formaspago_id">
				</form>
			</div>
		</div>
	</div>
@endsection