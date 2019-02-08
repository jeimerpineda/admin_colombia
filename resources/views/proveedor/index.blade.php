@extends('layouts.principal')
@section('title') Proveedores @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Proveedores','Lista',])!!}
	<div class="container-fluid">
		<div class="btn-group d-flex justify-content-end mb-3">
			<a href="{{route('config.proveedor.insert')}}" class="btn btn-dark btn-sm">
				<i class="fa fa-plus"></i> Agregar Proveedor
			</a>
		</div>
		{!!\Basics::printMessage('message')!!}
		@if($proveedores->isEmpty())
			<div class="alert alert-info">
				No se encontraron registros
			</div>
		@else
			<div class="table-responsive">
				<table class="table table-sm table-hover" id="card-table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nombre Legal</th>
							<th>Tipo</th>
							<th>Tipo de Documento</th>
							<th>Número de Documento</th>
							<th>Dirección</th>
							<th>Teléfono Principal</th>
							<th>Teléfono Secundario</th>
							<th>¿Gran Contribuyente?</th>
							<th>Regimen de Iva</th>
							<th>Creado</th>
							<th>Modificado</th>
							<th>Opciones</th>

						</tr>
					</thead>
					<tbody>
						@foreach($proveedores as $proveedor)
							<tr>
								<td>{{$proveedor->id}}</td>
								<td>{{$proveedor->nombre_legal}}</td>
								<td>{{ ($proveedor->tipo == 0) ? 'Persona Natural' : 'Persona Juridica' }}</td>
								<td>{{$proveedor->TipoDocumento->descripcion}}</td>
								<td>{{$proveedor->numero_documento}}</td>
								<td>{{$proveedor->direccion}}</td>
								<td>{{$proveedor->telefono_principal}}</td>
								<td>{{$proveedor->telefono_secundario}}</td>
								<td>{{($proveedor->gran_contribuyente==1) ? 'si' : 'No'}}</td>
								<td>{{$proveedor->regimeniva->descripcion}}</td>
								<td>{{$proveedor->created_at}}</td>
								<td>{{$proveedor->updated_at}}</td>
								<td>
									<div class="btn-group">
										<a href="{{route('config.proveedor.update',['producto_id'=>$proveedor->id])}}" class="btn btn-outline-primary btn-sm">
											<i class="fa fa-edit"></i>
										</a>
										<a href="{{route('config.proveedor.delete',['producto_id'=>$proveedor->id])}}" class="btn btn-outline-danger btn-sm">
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
				{{$proveedores->links()}}
			</div>
		@endempty
	</div>
@endsection
@section('js')
<script>
	$('#card-table').cardtable();
</script>
@endsection