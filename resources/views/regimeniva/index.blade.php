@extends('layouts.principal')
@section('title') Regimen de Iva @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Regimen de Iva','Lista',])!!}
	<div class="container-fluid">
		<div class="btn-group d-flex justify-content-end mb-3">
			<a href="{{route('config.regimeniva.insert')}}" class="btn btn-dark btn-sm">
				<i class="fa fa-plus"></i> Agregar Regimen de Iva
			</a>
		</div>
		{!!\Basics::printMessage('message')!!}
		@if($regimeniva->isEmpty())
			<div class="alert alert-info">
				No se encontraron registros
			</div>
		@else
			<div class="table-responsive">

				<table class="table table-sm table-hover" id="card-table">

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
						@foreach($regimeniva as $regimen)
							<tr>
								<td>{{$regimen->id}}</td>
								<td>{{$regimen->descripcion}}</td>
								<td>{{($regimen->status==1) ? 'Activo' : 'Inactivo'}}</td>
								<td>{{$regimen->created_at}}</td>
								<td>{{$regimen->updated_at}}</td>
								<td>
									<div class="btn-group">
										<a href="{{route('config.regimeniva.update',['unidmed_id'=>$regimen->id])}}" class="btn btn-outline-primary btn-sm">
											<i class="fa fa-edit"></i>
										</a>
										<a href="{{route('config.regimeniva.delete',['unidmed_id'=>$regimen->id])}}" class="btn btn-outline-danger btn-sm">
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
				{{$regimeniva->links()}}
			</div>
		@endempty
	</div>

@endsection
@section('js')
<script>
	$('#card-table').cardtable();
</script>

@endsection