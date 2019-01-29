@extends('layouts.principal')
@section('title') Agregar Formas de Pago @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Formas de Pago','Agregar'])!!}
	<div class="col-xs-6 col-md-6 offset-md-3 offset-xs-3">
		<div class="card">
			<div class="card-header">
				Agregar Formas de Pago
			</div>
			<div class="card-body">
				{!!\Basics::printErrors($errors->any(),$errors->all())!!}
				<form action="{{route('config.formasdepago.insert.form')}}" id="form_bancos" method="POST" class="col-md-8 col-xs-6 col-form-label offset-md-2 offset-xs-3">
					@csrf
					<div class="form-group row">
						<label for="descripcion" class="col-md-4 col-xs-12 col-form-label">Descripci&oacute;n:</label>
						<div class="col-md-8 col-xs-12 col-form-label">
							<input required type="text" name="descripcion" class="form-control" value="{{old('descripcion')}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="dias" class="col-md-4 col-xs-12 col-form-label">D&iacute;as:</label>
						<div class="col-md-8 col-xs-12 col-form-label">
							<input required type="number" name="dias" min="0" class="form-control" value="{{old('dias')}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-md-4 col-xs-12 col-form-label">Status:</label>
						<div class="col-md-8 col-xs-12 col-form-label">
							<select name="status" id="status" class="custom-select">
								<option value="1" {{\Basics::selected(1,old('status'))}}>Activo</option>
								<option value="0" {{\Basics::selected(0,old('status'))}}>Inactivo</option>
							</select>
						</div>
					</div>
					
					<div class="btn-group d-flex justify-content-center">
						<a href="{{route('config.formasdepago')}}" class="btn btn-link mr-2">
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