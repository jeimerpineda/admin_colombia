@extends('layouts.principal')
@section('title') Unidades de Medida @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Unidades de Medida','Lista',])!!}
	<div class="container-fluid">
		<div class="btn-group d-flex justify-content-end mb-3">
			<a href="{{route('config.unidadmedida.insert')}}" class="btn btn-dark btn-sm">
				<i class="fa fa-plus"></i> Agregar Unidad de Medida
			</a>
		</div>
		{!!\Basics::printMessage('message')!!}
		@if($unidadmedida->isEmpty())
			<div class="alert alert-info">
				No se encontraron registros
			</div>
		@else
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Descripción</th>
							<th>Status</th>
							<th>Creado</th>
							<th>Modificado</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($unidadmedida as $unidmed)
							<tr>
								<td>{{$unidmed->id}}</td>
								<td>{{$unidmed->descripcion}}</td>
								<td>{{($unidmed->status==1) ? 'Activo' : 'Inactivo'}}</td>
								<td>{{$unidmed->created_at}}</td>
								<td>{{$unidmed->updated_at}}</td>
								<td>
									<div class="btn-group">
										<a href="{{route('config.unidadmedida.update',['unidmed_id'=>$unidmed->id])}}" class="btn btn-outline-primary btn-sm">
											<i class="fa fa-edit"></i>
										</a>
										<a href="{{route('config.unidadmedida.delete',['unidmed_id'=>$unidmed->id])}}" class="btn btn-outline-danger btn-sm">
											<i class="fa fa-trash"></i>
										</a>
									</div>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="d-flex justify-content-center">
				{{$unidadmedida->links()}}
			</div>
		@endempty
	</div>
@endsection