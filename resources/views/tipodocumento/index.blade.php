@extends('layouts.principal')
@section('title') Tipo de Documento @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Tipo de Documento','Lista',])!!}
	<div class="container-fluid">
		<div class="btn-group d-flex justify-content-end mb-3">
			<a href="{{route('config.tipodocumento.insert')}}" class="btn btn-dark btn-sm">
				<i class="fa fa-plus"></i> Agregar Tipo de Documento
			</a>
		</div>
		{!!\Basics::printMessage('message')!!}
		@if($tipodocumento->isEmpty())
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
						@foreach($tipodocumento as $tipo)
							<tr>
								<td>{{$tipo->id}}</td>
								<td>{{$tipo->descripcion}}</td>
								<td>{{($tipo->status==1) ? 'Activo' : 'Inactivo'}}</td>
								<td>{{$tipo->created_at}}</td>
								<td>{{$tipo->updated_at}}</td>
								<td>
									<div class="btn-group">
										<a href="{{route('config.tipodocumento.update',['tipo_id'=>$tipo->id])}}" class="btn btn-outline-primary btn-sm">
											<i class="fa fa-edit"></i>
										</a>
										<a href="{{route('config.tipodocumento.delete',['tipo_id'=>$tipo->id])}}" class="btn btn-outline-danger btn-sm">
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
				{{$tipodocumento->links()}}
			</div>
		@endempty
	</div>

@endsection
@section('js')
<script>
	$('#card-table').cardtable();
</script>

@endsection