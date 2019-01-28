@extends('layouts.principal')
@section('title') Eliminar Formas de Pago @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Formas de Pago','Eliminar'])!!}
	<div class="col-8 offset-2">
		<div class="card">
			<div class="card-header">
				Eliminar Formas de Pago
			</div>
			<div class="card-body">
				<div class="alert alert-info">
					Esta acción borrará el registro de la base de datos. ¿Está segur@ que desea continuar?
				</div>
				<form action="{{route('config.formasdepago.delete.form')}}" id="form_bancos" method="POST" class="col-8 offset-2">
					@csrf
					<div class="form-group row">
						<label for="descripcion" class="col-2 col-form-label">Descripcion:</label>
						<div class="col-10">
							<input readonly type="text" name="descripcion" class="form-control" value="{{$formaspago->descripcion}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="dias" class="col-2 col-form-label">Dias:</label>
						<div class="col-10">
							<input required type="number" name="dias" class="form-control" value="{{$formaspago->dias}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-2 col-form-label">Status:</label>
						<div class="col-10">
							<select disabled name="status" id="status" class="custom-select">
								<option value="1" {{\Basics::selected(1,$formaspago->status)}}>Activo</option>
								<option value="0" {{\Basics::selected(0,$formaspago->status)}}>Inactivo</option>
							</select>
						</div>
					</div>
					<div class="btn-group d-flex justify-content-center">
						<a href="{{route('config.formasdepago')}}" class="btn btn-link mr-2">
							<i class="fa fa-arrow-left"></i> Volver
						</a>
						<button class="btn btn-danger">
							<i class="fa fa-times"></i> Si, continuar
						</button>
					</div>
					<input type="hidden" value="{{$formaspago->id}}" name="formaspago_id">
				</form>
			</div>
		</div>
	</div>
@endsection