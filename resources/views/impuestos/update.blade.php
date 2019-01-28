@extends('layouts.principal')
@section('title') Actualizar Impuesto @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Impuesto','Actualizar'])!!}
	<div class="col-10 offset-1">
		<div class="card">
			<div class="card-header">
				Actualizar Impuesto
			</div>
			<div class="card-body">
				{!!\Basics::printMessage('message')!!}
				{!!\Basics::printErrors($errors->any(),$errors->all())!!}
				<form action="{{route('config.impuestos.update.form')}}" id="form_bancos" method="POST" class="col-8 offset-2">
					@csrf
					<div class="form-group row">
						<label for="descripcion" class="col-12 col-form-label">Impuesto:</label>
						<div class="col-12">
							<input required type="text" name="descripcion" class="form-control" value="{{$impuestos->descripcion}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-12 col-form-label">Status:</label>
						<div class="col-12">
							<select name="status" id="status" class="custom-select">
								<option value="1" {{\Basics::selected(1,$impuestos->status)}}>Activo</option>
								<option value="0" {{\Basics::selected(0,$impuestos->status)}}>Inactivo</option>
							</select>
						</div>
					</div>
					
					<div class="btn-group d-flex justify-content-center">
						<a href="{{route('config.impuestos')}}" class="btn btn-link mr-2">
							<i class="fa fa-arrow-left"></i> Volver
						</a>
						<button class="btn btn-primary">
							<i class="fa fa-save"></i> Guardar Cambios
						</button>
					</div>
					<input type="hidden" value="{{$impuestos->id}}" name="impuesto_id">
				</form>
			</div>
		</div>
	</div>
@endsection