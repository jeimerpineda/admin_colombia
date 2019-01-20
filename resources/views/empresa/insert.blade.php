@extends('layouts.principal')
@section('title') Agregar Empresa @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Empresa','Agregar'])!!}
	<div class="col-8 offset-2">
		<div class="card">
			<div class="card-header">
				Agregar Empresa
			</div>
			<div class="card-body">
				{!!\Basics::printErrors($errors->any(),$errors->all())!!}
				<form action="{{route('config.empresa.insert.form')}}" id="form_empresa" method="POST" class="col-8 offset-2">
					@csrf
					<div class="form-group row">
						<label for="nit" class="col-3 col-form-label">Nit:</label>
						<div class="col-9">
							<input required type="text" name="nit" class="form-control" value="{{old('nit')}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="razon" class="col-3 col-form-label">Razon Social:</label>
						<div class="col-9">
							<input required type="text" name="razon" class="form-control" value="{{old('razon_social')}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="direccion" class="col-3 col-form-label">Direccion:</label>
						<div class="col-9">
							<input required type="text" name="direccion" class="form-control" value="{{old('direccion')}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="correo" class="col-3 col-form-label">Correo:</label>
						<div class="col-9">
							<input required type="text" name="correo" class="form-control" value="{{old('correo')}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="tlf1" class="col-3 col-form-label">Telefono Principal:</label>
						<div class="col-9">
							<input required type="text" name="tlf1" class="form-control" value="{{old('telefono_principal')}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="tlf2" class="col-3 col-form-label">Telefono Segundario:</label>
						<div class="col-9">
							<input type="text" name="tlf2" class="form-control" value="{{old('telefono_segundario')}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="sucursal" class="col-3 col-form-label">Sucursal:</label>
						<div class="col-9">
							<input required type="text" name="sucursal" class="form-control" value="{{old('sucursal')}}">
						</div>
					</div>
					
					
					<div class="btn-group d-flex justify-content-center">
						<a href="{{route('config.empresa')}}" class="btn btn-link mr-2">
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