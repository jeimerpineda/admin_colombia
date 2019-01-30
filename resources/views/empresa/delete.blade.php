@extends('layouts.principal')
@section('title') Eliminar Empresa @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Empresa','Eliminar'])!!}
	<div class="col-xs-6 col-md-10 offset-md-1 offset-xs-3">
		<div class="card">
			<div class="card-header">
				Eliminar Empresa
			</div>
			<div class="card-body">
				<div class="alert alert-info">
					Esta acción borrará el registro de la base de datos. ¿Está segur@ que desea continuar?
				</div>
				<form action="{{route('config.empresa.delete.form')}}" id="form_empresa" method="POST" class="col-12">
					@csrf
				<div class="form-row">
					<div class="form-group col-12 col-md-4">
						<label for="nit" class="col-12 col-form-label">Nit:</label>
						<div class="col-12">
							<input disabled required type="text" name="nit" class="form-control" value="{{$listempresa->nit}}">
						</div>
					</div>
					<div class="form-group col-12 col-md-4">
						<label for="razon" class="col-12 col-form-label">Razon Social:</label>
						<div class="col-12">
							<input disabled required type="text" name="razon" class="form-control" value="{{$listempresa->razon_social}}">
						</div>
					</div>
					<div class="form-group col-12 col-md-4">
						<label for="direccion" class="col-12 col-form-label">Direccion:</label>
						<div class="col-12">
							<input disabled required type="text" name="direccion" class="form-control" value="{{$listempresa->direccion}}">
						</div>
					</div>
					<div class="form-group col-12 col-md-4">
						<label for="correo" class="col-12 col-form-label">Correo:</label>
						<div class="col-12">
							<input disabled required type="text" name="correo" class="form-control" value="{{$listempresa->correo}}">
						</div>
					</div>
					<div class="form-group col-12 col-md-4">
						<label for="tlf1" class="col-12 col-form-label">Telefono Principal:</label>
						<div class="col-12">
							<input disabled required type="text" name="tlf1" class="form-control" value="{{$listempresa->telefono_principal}}">
						</div>
					</div>
					<div class="form-group col-12 col-md-4">
						<label for="tlf2" class="col-12 col-form-label">Telefono Segundario:</label>
						<div class="col-12">
							<input disabled type="text" name="tlf2" class="form-control" value="{{$listempresa->telefono_segundario}}">
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-12 col-md-4">
						<label for="sucursal" class="col-12 col-form-label">Sucursal:</label>
						<div class="col-12">
							<input disabled required type="text" name="sucursal" class="form-control" value="{{$listempresa->sucursal}}">
						</div>
					</div>
				</div>
					<div class="btn-group d-flex justify-content-center">
						<a href="{{route('config.empresa')}}" class="btn btn-link mr-2">
							<i class="fa fa-arrow-left"></i> Volver
						</a>
						<button class="btn btn-danger">
							<i class="fa fa-times"></i> Si, continuar
						</button>
					</div>
					<input type="hidden" value="{{$listempresa->id}}" name="empresa_ide">
				</form>
			</div>
		</div>
	</div>
@endsection