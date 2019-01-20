@extends('layouts.principal')
@section('title') Tipos de Factura @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Tipos de Factura','Lista',])!!}
	<div class="container-fluid">
		<div class="btn-group d-flex justify-content-end mb-3">
			<a href="{{route('config.tiposdefacturas.insert')}}" class="btn btn-dark btn-sm">
				<i class="fa fa-plus"></i> Agregar Tipo de Factura
			</a>
		</div>
		{!!\Basics::printMessage('message')!!}
		@if($tiposdefacturas->isEmpty())
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
						@foreach($tiposdefacturas as $tiposfactura)
							<tr>
								<td>{{$tiposfactura->id}}</td>
								<td>{{$tiposfactura->descripcion}}</td>
								<td>{{($tiposfactura->status==1) ? 'Activo' : 'Inactivo'}}</td>
								<td>{{$tiposfactura->created_at}}</td>
								<td>{{$tiposfactura->updated_at}}</td>
								<td>
									<div class="btn-group">
										<a href="{{route('config.tiposdefacturas.update',['tipfacturas_id'=>$tiposfactura->id])}}" class="btn btn-outline-primary btn-sm">
											<i class="fa fa-edit"></i>
										</a>
										<a href="{{route('config.tiposdefacturas.delete',['tipfacturas_ide'=>$tiposfactura->id])}}" class="btn btn-outline-danger btn-sm">
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
				{{$tiposdefacturas->links()}}
			</div>
		@endempty
	</div>
@endsection