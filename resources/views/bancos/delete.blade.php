@extends('layouts.principal')
@section('title') Eliminar Banco @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Bancos','Eliminar'])!!}
	<div class="col-8 offset-2">
		<div class="card">
			<div class="card-header">
				Eliminar Banco
			</div>
			<div class="card-body">
				<div class="alert alert-info">
					Esta acción borrará el registro de la base de datos. ¿Está segur@ que desea continuar?
				</div>
				<form action="{{route('config.bancos.delete.form')}}" id="form_bancos" method="POST" class="col-8 offset-2">
					@csrf
					<div class="form-group row">
						<label for="descripcion" class="col-2 col-form-label">Nombre:</label>
						<div class="col-10">
							<input readonly type="text" name="descripcion" class="form-control" value="{{$banco->descripcion}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-2 col-form-label">Status:</label>
						<div class="col-10">
							<select disabled name="status" id="status" class="custom-select">
								<option value="1" {{\Basics::selected(1,$banco->status)}}>Activo</option>
								<option value="0" {{\Basics::selected(0,$banco->status)}}>Inactivo</option>
							</select>
						</div>
					</div>
					<!-- <div class="form-group row">
						<label for="descripcion" class="col-12 col-form-label">Descripción:</label>
						<div class="col-12">
							<textarea disabled style="resize: none;" class="form-control" name="descripcion" id="descripcion"></textarea>
						</div> 
					</div>-->
					<div class="btn-group d-flex justify-content-center">
						<a href="{{route('config.bancos')}}" class="btn btn-link mr-2">
							<i class="fa fa-arrow-left"></i> Volver
						</a>
						<button class="btn btn-danger" type="submit">
							<i class="fa fa-times"></i> Si, continuar
						</button>
					</div>
					<input type="hidden" value="{{$banco->id}}" name="banco_id">
				</form>
			</div>
		</div>
	</div>
@endsection