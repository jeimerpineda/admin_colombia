@extends('layouts.principal')
@section('title') Empresa @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Empresa','Lista',])!!}
	<div class="container-fluid">
		<div class="btn-group d-flex justify-content-end mb-3">
			<a href="{{route('config.empresa.insert')}}" class="btn btn-dark btn-sm">
				<i class="fa fa-plus"></i> Agregar Empresa
			</a>
		</div>
		{!!\Basics::printMessage('message')!!}
		@if($listempresa->isEmpty())
			<div class="alert alert-info">
				No se encontraron registros
			</div>
		@else
			<div class="table-responsive">
				<table class="table table-sm table-hover" id="card-table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nit</th>
							<th>Razon Social</th>
							<th>Direccion</th>
							<th>Correo</th>
							<th>Telefono Principal</th>
							<th>Telefono Segundario</th>
							<th>Sucursal</th>
							<th>Creado</th>
							<th>Modificado</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($listempresa as $empresa)
							<tr>
								<td>{{$empresa->id}}</td>
								<td>{{$empresa->nit}}</td>
								<td>{{$empresa->razon_social}}</td>
								<td>{{$empresa->direccion}}</td>
								<td>{{$empresa->correo}}</td>
								<td>{{$empresa->telefono_principal}}</td>
								<td>{{$empresa->telefono_segundario}}</td>
								<td>{{($empresa->sucursal==1) ? 'Principal' : 'Sucursal'}}</td>
								<td>{{$empresa->created_at}}</td>
								<td>{{$empresa->updated_at}}</td>
								<td>
									<div class="btn-group">
										<a href="{{route('config.empresa.update',['empresa_id'=>$empresa->id])}}" class="btn btn-outline-primary btn-sm">
											<i class="fa fa-edit"></i>
										</a>
										<a href="{{route('config.empresa.delete',['empresa_ide'=>$empresa->id])}}" class="btn btn-outline-danger btn-sm">
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
				{{$listempresa->links()}}
			</div>
		@endempty
	</div>
@endsection
@section('js')
<script>
	$('#card-table').cardtable();
</script>
@endsection