@extends('layouts.principal')
@section('title') Formas de Pago @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Formas de Pago','Lista',])!!}
	<div class="container-fluid">
		<div class="btn-group d-flex justify-content-end mb-3">
			<a href="{{route('config.formasdepago.insert')}}" class="btn btn-dark btn-sm">
				<i class="fa fa-plus"></i> Agregar Formas de Pago
			</a>
		</div>
		{!!\Basics::printMessage('message')!!}
		@if($formaspagos->isEmpty())
			<div class="alert alert-info">
				No se encontraron registros
			</div>
		@else
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Descripcion</th>
							<th>Dias</th>
							<th>Status</th>
							<th>Creado</th>
							<th>Modificado</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($formaspagos as $formpagos)
							<tr>
								<td>{{$formpagos->id}}</td>
								<td>{{$formpagos->descripcion}}</td>
								<td>{{$formpagos->dias}}</td>
								<td>{{($formpagos->status==1) ? 'Activo' : 'Inactivo'}}</td>
								<td>{{$formpagos->created_at}}</td>
								<td>{{$formpagos->updated_at}}</td>
								<td>
									<div class="btn-group">
										<a href="{{route('config.formasdepago.update',['formaspago_id'=>$formpagos->id])}}" class="btn btn-outline-primary btn-sm">
											<i class="fa fa-edit"></i>
										</a>
										<a href="{{route('config.formasdepago.delete',['formaspago_id'=>$formpagos->id])}}" class="btn btn-outline-danger btn-sm">
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
				{{$formaspagos->links()}}
			</div>
		@endempty
	</div>
@endsection