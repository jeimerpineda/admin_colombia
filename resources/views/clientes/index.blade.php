@extends('layouts.principal')
@section('title') Clientes @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Clientes','Lista',])!!}
	<div class="container-fluid">
		<div class="btn-group d-flex justify-content-end mb-3">
			<a href="{{route('config.clientes.insert')}}" class="btn btn-dark btn-sm">
				<i class="fa fa-plus"></i> Agregar Cliente
			</a>
		</div>
		{!!\Basics::printMessage('message')!!}
		@if($listclientes->isEmpty())
			<div class="alert alert-info">
				No se encontraron registros
			</div>
		@else
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Dni</th>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>Dirección</th>
							<th>Correo</th>
							<th>Teléfono</th>
							<th>Teléfono Oficina</th>
							<th>Móvil</th>
							<th>Creado</th>
							<th>Modificado</th>
							<th>Opciones</th>

						</tr>
					</thead>
					<tbody>
						@foreach($listclientes as $clientes)
							<tr>
								<td>{{$clientes->id}}</td>
								<td>{{$clientes->dni}}</td>
								<td>{{$clientes->nombres}}</td>
								<td>{{$clientes->apellidos}}</td>
								<td>{{$clientes->direccion}}</td>
								<td>{{$clientes->correo}}</td>
								<td>{{$clientes->telefono}}</td>
								<td>{{$clientes->telefono_oficina}}</td>
								<td>{{$clientes->movil}}</td>
								<td>{{$clientes->created_at}}</td>
								<td>{{$clientes->updated_at}}</td>
								<td>
									<div class="btn-group">
										<a href="{{route('config.clientes.update',['cliente_id'=>$clientes->id])}}" class="btn btn-outline-primary btn-sm">
											<i class="fa fa-edit"></i>
										</a>
										<a href="{{route('config.clientes.delete',['cliente_id'=>$clientes->id])}}" class="btn btn-outline-danger btn-sm">
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
				{{$listclientes->links()}}
			</div>
		@endempty
	</div>
@endsection