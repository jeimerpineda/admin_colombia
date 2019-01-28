@extends('layouts.principal')
@section('title') Eliminar Impuesto @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Impuesto','Eliminar'])!!}
	<div class="col-8 offset-2">
		<div class="card">
			<div class="card-header">
				Eliminar Impuesto
			</div>
			<div class="card-body">
				<div class="alert alert-info">
					Esta acción borrará el registro de la base de datos. ¿Está segur@ que desea continuar?
				</div>
				<form action="{{route('config.impuestos.delete.form')}}" id="form_bancos" method="POST" class="col-8 offset-2">
					@csrf
					<div class="form-group row">
						<label for="descripcion" class="col-12 col-form-label">Nombre:</label>
						<div class="col-12">
							<input disabled readonly type="text" name="descripcion" class="form-control" value="{{$impuestos->descripcion}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-12 col-form-label">Status:</label>
						<div class="col-12">
							<select disabled name="status" id="status" class="custom-select">
								<option value="1" {{\Basics::selected(1,$impuestos->status)}}>Activo</option>
								<option value="0" {{\Basics::selected(0,$impuestos->status)}}>Inactivo</option>
							</select>
						</div>
					</div>
					<div class="btn-group d-flex justify-content-center">
						<a href="{{route('config.impuestos')}}" class="btn btn-link mr-2">
							<i class="fa fa-arrow-left"></i> Volver
						</a>
						<button class="btn btn-danger">
							<i class="fa fa-times"></i> Si, continuar
						</button>
					</div>
					<input type="hidden" value="{{$impuestos->id}}" name="impuesto_id">
				</form>
			</div>
		</div>
	</div>
@endsection