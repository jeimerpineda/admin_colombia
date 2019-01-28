@extends('layouts.principal')
@section('title') Impuestos @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Impuestos','Lista',])!!}
	<div class="container-fluid">
		<div class="btn-group d-flex justify-content-end mb-3">
			<a href="{{route('config.impuestos.insert')}}" class="btn btn-dark btn-sm">
				<i class="fa fa-plus"></i> Agregar Impuesto
			</a>
		</div>
		{!!\Basics::printMessage('message')!!}
		@if($impuestos->isEmpty())
			<div class="alert alert-info">
				No se encontraron registros
			</div>
		@else
			<div class="table-responsive">
				<table class="table table-sm table-hover" id="card-table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Impuesto</th>
							<th>Status</th>
							<th>Creado</th>
							<th>Modificado</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($impuestos as $impuesto)
							<tr>
								<td>{{$impuesto->id}}</td>
								<td>{{$impuesto->descripcion}}</td>
								<td>{{($impuesto->status==1) ? 'Activo' : 'Inactivo'}}</td>
								<td>{{$impuesto->created_at}}</td>
								<td>{{$impuesto->updated_at}}</td>
								<td>
									<div class="btn-group">
										<a href="{{route('config.impuestos.update',['impuestos_id'=>$impuesto->id])}}" class="btn btn-outline-primary btn-sm">
											<i class="fa fa-edit"></i>
										</a>
										<a href="{{route('config.impuestos.delete',['impuestos_id'=>$impuesto->id])}}" class="btn btn-outline-danger btn-sm">
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
				{{$impuestos->links()}}
			</div>
		@endempty
	</div>
@endsection
@section('js')
<script>
	$('#card-table').cardtable();
</script>
@endsection