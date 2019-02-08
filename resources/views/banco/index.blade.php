@extends('layouts.principal')
@section('title') Bancos @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Bancos','Lista',])!!}
	<div class="container-fluid">
		<div class="btn-group d-flex justify-content-end mb-3">
			<a href="{{route('config.banco.insert')}}" class="btn btn-dark btn-sm">
				<i class="fa fa-plus"></i> Agregar Banco
			</a>
		</div>
		{!!\Basics::printMessage('message')!!}
		@if($bancos->isEmpty())
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
						@foreach($bancos as $banco)
							<tr>
								<td>{{$banco->id}}</td>
								<td>{{$banco->descripcion}}</td>
								<td>{{($banco->status==1) ? 'Activo' : 'Inactivo'}}</td>
								<td>{{$banco->created_at}}</td>
								<td>{{$banco->updated_at}}</td>
								<td>
									<div class="btn-group">
										<a href="{{route('config.banco.update',['banco_id'=>$banco->id])}}" class="btn btn-outline-primary btn-sm">
											<i class="fa fa-edit"></i>
										</a>
										<a href="{{route('config.banco.delete',['banco_id'=>$banco->id])}}" class="btn btn-outline-danger btn-sm">
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
				{{$bancos->links()}}
			</div>
		@endempty
	</div>
@endsection
@section('js')
<script>
	$('#card-table').cardtable();
</script>
@endsection