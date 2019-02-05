@extends('layouts.principal')
@section('title') Facturación @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Maestros','Facturación'])!!}
	
	<div class="container-fluid bg-white">
		<div class="row no-gutters">
			{{-- First column,  Deployed to print add customer form and product input field --}}
			<div class="col-lg-4 col-sm-6 border-right border-secondary">
				{{-- Top row, customer form --}}
				<div class="row no-gutters border-bottom border-secondary pb-5">
					<div class="col-12 ">
						<form action="" class="">
							<div class="form-group row no-gutters">
								{{-- <label for="" class="col-12 col-form-label">Fecha</label> --}}
								<div class="col-10">
									<input type="date" class="form-control form-control-sm" value="{{date('m/d/Y')}}">
								</div>	
							</div>
							{{-- client_id --}}
							<div class="form-group row no-gutters">
								{{-- <label for="client_id" class="col-12 col-form-label">Cliente:</label> --}}
								<div class="col-10">
									<select data-placeholder="Seleccione Cliente" name="client_id" id="client_id" multiple class="chosen custom-select chosen-custom">
										<option value=""></option>
		 								@foreach($clientes as $cliente)
			   								<option value="{{$cliente->id}}"> 
			   									{{ $cliente->nombres }} {{ $cliente->apellidos }} - {{ $cliente->dni }} 
			   								</option>
										@endforeach
									</select>
								</div>
								<div class="col-2">
									<button data-toggle="modal" data-target="#clientes" type="button" class="btn btn-outline-dark btn-sm ml-2 "><i class="fa fa-plus-circle fa-lg"></i></button>
								</div>
							</div>
						</form>

						<form action="{{route('facturacion.addProduct')}}" id="form-add-product" method="POST">
							@csrf
							{{-- cantidad --}}
							<div class="form-group row no-gutters">
								{{-- <label for="productos_id" class="col-12 col-form-label">Cantidad:</label> --}}
								<div class="col-10">
									<input type="number" class="form-control from-control-sm" name="cantidad" value="1" min="1" step="1" onblur="j('#productos_id_chosen .chosen-search-input').focus();">
								</div>
							</div>
							{{-- productos_id --}}
							<div class="form-group row no-gutters">
								{{-- <label for="productos_id" class="col-12 col-form-label">Producto:</label> --}}
								<div class="col-10">
									<select data-placeholder="Seleccione Producto" name="productos_id" id="productos_id" multiple class="chosen custom-select chosen-custom">
										<option value=""></option>
		 								@foreach($productos as $producto)
			   								<option value="{{$producto->id}}"> 
			   									{{ $producto->codigo_barrra }} - {{ $producto->descripcion }} 
			   								</option>
										@endforeach
									</select>
								</div>
								<div class="col-2">
									<button type="submit" class="btn btn-primary btn-sm ml-2">
										<i class="fa fa-check fa-lg"></i>
									</button>
								</div>
							</div>
							<input type="hidden" name="facturas_id" id="facturas_id" value="0">
						</form>
					</div>
				</div>
				{{-- End Top row --}}
				{{-- Bottom left row, product details. It's gonna work on click over the product detail at right column --}}
				<div class="row no-gutters pr-4">
					<div class="col-12">
						<form id="product-details" action="{{route('facturacion.editProduct')}}" method="POST">
							@csrf
							<input type="hidden" name="factura_detalles_id" id="factura_detalles_id">
						</form>
						<div class="col-12 mt-5  d-none" id="table-details-product">
							<div class="row no-gutters bg-dark text-white">
								<h6 class="pt-2 px-3 mb-2 d-block"><strong>Detalle producto:</strong></h6>
							</div>

							<table class="table">
								<tr>
									<th>Código</th>
									<td id="table_codigo_barrra"></td>
								</tr>
								<tr>
									<th>Descripción</th>
									<td id="table_descripcion"></td>
								</tr>
								<tr>
									<th>Un. Medida</th>
									<td id="table_unidad_medida_descripcion"></td>
								</tr>
								<tr>
									<th>Precio Un.</th>
									<td id="table_precio_venta1"></td>
								</tr>
								<tr>
									<th>Cantidad</th>
									<td id="table_cantidad"></td>
								</tr>
								<tr>
									<th>Descuento</th>
									<td id="table_descuento"></td>
								</tr>
								<tr>
									<th>Impuestos</th>
									<td id="table_impuesto"></td>
								</tr>
								<tr>
									<th>Precio Total</th>
									<td id="table_total_pagar"></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				{{-- Bottom left row --}}
			</div>
			{{-- End first column --}}
			{{-- Second column, Product details, retail price, price, description and options --}}
			<div class="col-lg-7 offset-lg-1 col-sm-6">
				<div class="row no-gutters bg-dark text-white">
					<h6 class="pt-2 px-3 mb-2 d-block"><strong>Venta Actual:</strong></h6>
				</div>
				<div class="row no-gutters factura-details-list" id="responses">
					<div class="card col-12 card-detail" id="init-card">
						<div class="card-body pt-3 pb-1">
							<p>
								<span class="float-right border-left pl-3">
									<strong>0.00</strong>
								</span>
								<span class="pr-2">
									0 x ******
								</span>
							</p>
						</div>
					</div>
				</div>
				<div class="row no-gutters bg-dark text-white">
					<h6 class="pt-2 px-3 mb-2 d-block"><strong>Totales:</strong></h6>
				</div>
				<div class="row no-gutters">
					<div class="col-lg-5 offset-lg-7">
						<table class="table w-100">
							<tr>
								<th class="text-right">Total sin impuestos:</th>
								<td class="text-right total_sin_impuestos">0.00</td>
							</tr>
							<tr>
								<th class="text-right">Total de impuestos:</th>
								<td class="text-right total_impuestos">0.00</td>
							</tr>
							<tr>
								<th class="text-right">Total a pagar:</th>
								<td class="text-right total_pagar">0.00</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			{{-- End Second column --}}
		</div>
	</div>

	@include('clientes.Clientes_FastInsert')
	
@endsection

@section('scripts')
	<script src="{{asset('js/facturacion.js')}}"></script>
@endsection