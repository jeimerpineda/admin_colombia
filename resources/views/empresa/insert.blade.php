@extends('layouts.principal')
@section('title') Agregar Empresa @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Empresa','Agregar'])!!}
	<div class="col-xs-6 col-md-10 offset-md-1 offset-xs-3">
		<div class="card">
			<div class="card-header">
				Agregar Empresa
			</div>
			<div class="card-body">
				{!!\Basics::printErrors($errors->any(),$errors->all())!!}
				<form action="{{route('config.empresa.insert.form')}}" id="form_empresa" method="POST" class="col-12">
					@csrf
					<div class="form-row">
					<div class="form-group col-12 col-md-4">
						<label for="nit" class="col-12 col-form-label">Nit:</label>
						<div class="col-12">
							<input required type="text" name="nit" class="form-control" value="{{old('nit')}}">
						</div>
					</div>
					<div class="form-group col-12 col-md-4">
						<label for="razon" class="col-12 col-form-label">Razon Social:</label>
						<div class="col-12">
							<input required type="text" name="razon" class="form-control" value="{{old('razon_social')}}">
						</div>
					</div>
					<div class="form-group col-12 col-md-4">
						<label for="direccion" class="col-12 col-form-label">Direccion:</label>
						<div class="col-12">
							<input required type="text" name="direccion" class="form-control" value="{{old('direccion')}}">
						</div>
					</div>
					<div class="form-group col-12 col-md-4">
						<label for="correo" class="col-12 col-form-label">Correo:</label>
						<div class="col-12">
							<input required type="text" name="correo" class="form-control" value="{{old('correo')}}">
						</div>
					</div>
						<div class="form-group col-12 col-md-4">
						<label for="tlf1" class="col-12 col-form-label">Telefono Principal:</label>
						<div class="col-12">
							<input required type="text" name="tlf1" class="form-control" value="{{old('telefono_principal')}}">
						</div>
					</div>
					<div class="form-group col-12 col-md-4">
						<label for="tlf2" class="col-12 col-form-label">Telefono Segundario:</label>
						<div class="col-12">
							<input type="text" name="tlf2" class="form-control" value="{{old('telefono_segundario')}}">
						</div>
					</div>
					</div>
					<div class="form-row">
					<div class="form-group col-12 col-md-4">
						<label for="sucursal" class="col-12 col-form-label">Sucursal:</label>
						<div class="col-12">
							<label class="radio-inline"><input type="radio" name="sucursal" value="1">  Principal  </label>
							<label class="radio-inline"><input type="radio" name="sucursal" value="0"> Sucursal </label>
						</div>
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