@extends('layouts.principal')
@section('title') Productos @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Configuración','Productos','Lista',])!!}
	<div class="container-fluid">
		<div class="btn-group d-flex justify-content-end mb-3">
			<a href="{{route('config.producto.insert')}}" class="btn btn-dark btn-sm">
				<i class="fa fa-plus"></i> Agregar Producto
			</a>
		</div>
		{!!\Basics::printMessage('message')!!}
		@if($listproductos->isEmpty())
			<div class="alert alert-info">
				No se encontraron registros
			</div>
		@else
			<div class="table-responsive">
				<table class="table table-sm table-hover" id="card-table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Codigo</th>
							<th>Descripción</th>
							<th>Existencia</th>
							<th>Existencia Minima</th>
							<th>Costo</th>
							<th>Precio de Venta 1</th>
							<th>Precio de Venta 2</th>
							<th>Unidad de Medida</th>
							<th>Servicio</th>
							<th>Empresa</th>
							<th>Prcentaje Descuento</th>
							<th>Impuesto</th>
							<th>Creado</th>
							<th>Modificado</th>
							<th>Opciones</th>

						</tr>
					</thead>
					<tbody>
						@foreach($listproductos as $productos)
							<tr>
								<td>{{$productos->id}}</td>
								<td>{{$productos->codigo_barrra}}</td>
								<td>{{$productos->descripcion}}</td>
								<td>{{$productos->existen}}</td>
								<td>{{$productos->existencia_minima}}</td>
								<td>{{$productos->costo}}</td>
								<td>{{$productos->precio_venta1}}</td>
								<td>{{$productos->precio_venta2}}</td>
								<td>{{$productos->unimed->descripcion}}</td>
								<td>{{($productos->servicio==1) ? 'Servicio' : 'No es servicio'}}</td>
								<td>{{$productos->empresa->razon_social}}</td>
								<td>{{$productos->porcentaje_descuento}}</td>
								<td>{{$productos->impuestos->descripcion}}</td>
								<td>{{$productos->created_at}}</td>
								<td>{{$productos->updated_at}}</td>
								<td>
									<div class="btn-group">
										<a href="{{route('config.producto.update',['producto_id'=>$productos->id])}}" class="btn btn-outline-primary btn-sm">
											<i class="fa fa-edit"></i>
										</a>
										<a href="{{route('config.producto.delete',['producto_id'=>$productos->id])}}" class="btn btn-outline-danger btn-sm">
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
				{{$listproductos->links()}}
			</div>
		@endempty
	</div>
@endsection
@section('js')
<script>
	$('#card-table').cardtable();
</script>
@endsection