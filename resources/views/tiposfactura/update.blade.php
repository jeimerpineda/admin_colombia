@extends('layouts.principal')
@section('title') Actualizar Tipos de Factura @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Tipos de Factura','Actualizar'])!!}
	<div class="col-xs-6 col-md-6 offset-md-3 offset-xs-3">
		<div class="card">
			<div class="card-header">
				Actualizar Tipos de Factura
			</div>
			<div class="card-body">
				{!!\Basics::printMessage('message')!!}
				{!!\Basics::printErrors($errors->any(),$errors->all())!!}
				<form action="{{route('config.tiposdefactura.update.form')}}" id="form_tipfacturas" method="POST" class="col-md-8 col-xs-6 col-form-label offset-md-2 offset-xs-3">
					@csrf
					<div class="form-group row">
						<label for="descripcion" class="col-md-4 col-xs-12 col-form-label">Descripción:</label>
						<div class="col-md-8 col-xs-12">
							<input required type="text" name="descripcion" class="form-control" value="{{$tiposdefacturas->descripcion}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-md-4 col-xs-12 col-form-label">Status:</label>
						<div class="col-md-8 col-xs-12 col-form-label">
							<select name="status" id="status" class="custom-select">
								<option value="1" {{\Basics::selected(1,$tiposdefacturas->status)}}>Activo</option>
								<option value="0" {{\Basics::selected(0,$tiposdefacturas->status)}}>Inactivo</option>
							</select>
						</div>
					</div>
					
					<div class="btn-group d-flex justify-content-center">
						<a href="{{route('config.tiposdefactura')}}" class="btn btn-link mr-2">
							<i class="fa fa-arrow-left"></i> Volver
						</a>
						<button class="btn btn-primary">
							<i class="fa fa-save"></i> Guardar Cambios
						</button>
					</div>
					<input type="hidden" value="{{$tiposdefacturas->id}}" name="tipfacturas_ide">
				</form>
			</div>
		</div>
	</div>
@endsection