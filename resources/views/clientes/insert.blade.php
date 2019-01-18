@extends('layouts.principal')
@section('title') Agregar Clientes @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Clientes','Agregar'])!!}
	<div class="col-8 offset-2">
		<div class="card">
			<div class="card-header">
				Agregar Clientes
			</div>
			<div class="card-body">
				{!!\Basics::printErrors($errors->any(),$errors->all())!!}
				<form action="{{route('config.clientes.insert.form')}}" id="form_clientes" method="POST" class="col-8 offset-2">
					@csrf
					<div class="form-group row">
						<label for="dni" class="col-3 col-form-label">Dni:</label>
						<div class="col-9">
							<input required type="text" name="dni" class="form-control" value="{{$listclientes->dni}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="nombres" class="col-3 col-form-label">Nombres:</label>
						<div class="col-9">
							<input required type="text" name="nombres" class="form-control" value="{{old('nombres')}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="apellidos" class="col-3 col-form-label">Apellidos:</label>
						<div class="col-9">
							<input required type="text" name="apellidos" class="form-control" value="{{old('apellidos')}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="direccion" class="col-3 col-form-label">Dirección:</label>
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
						<label for="tlf1" class="col-3 col-form-label">Telefono:</label>
						<div class="col-9">
							<input required type="text" name="tlf1" class="form-control" value="{{old('telefono')}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="tlf2" class="col-3 col-form-label">Telefono oficina:</label>
						<div class="col-9">
							<input required type="text" name="tlf2" class="form-control" value="{{old('telefono_oficina')}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="movil" class="col-3 col-form-label">Movil:</label>
						<div class="col-9">
							<input required type="text" name="movil" class="form-control" value="{{old('movil')}}">
						</div>
					</div>
					<div class="btn-group d-flex justify-content-center">
						<a href="{{route('config.clientes')}}" class="btn btn-link mr-2">
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