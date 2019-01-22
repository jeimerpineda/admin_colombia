@extends('layouts.principal')
@section('title') Facturaci&oacute;n @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Maestros','Facturaci&oacute;n'])!!}
	<div class="">
		<div class="card">
			<div class="card-header">
				<h3>Nueva Factura</h3>
			</div>
			<div class="card-body">
				{!!\Basics::printErrors($errors->any(),$errors->all())!!}

				{{-- DATOS FACTURA --}}
				<form action="" method="POST" accept-charset="utf-8"  class="cliente col-12">
					@csrf
					<div class="form-group row">
						<label for="seleccioncliente" class="col-sm-2 col-form-label">Cliente:</label>
						<div class="col-sm-2">
							<select data-placeholder="Seleccione una opción" name="cliente" class="select-cliente" >
								<option value=""></option>
								@foreach ($clientes as $cliente)
									<option value="{{ $cliente->id}}">{{ $cliente->dni.' '. $cliente->nombres .' '. $cliente->apellidos}}</option>
								@endforeach
							</select>
						</div>
						<label for="fecha" class="col-sm-2 col-form-label">Fecha:</label>
						<div class="col-sm-2">
							<input required type="date" name="fecha" id="fecha" max="" class="form-control fecha" value="{{old('fecha')}}">
						</div>
					</div>	
					<div class="form-group row">
						<label for="formasdepago" class="col-sm-2 col-form-label">Forma de Pago:</label>
						<div class="col-sm-2">
							<select data-placeholder="Seleccione una opción" name="formadepago" class="select-formapago" onchange="updateFechVenc($(this).val())">
								<option value=""></option>
								@foreach ($formasdepago as $formadepago)
								{{-- EN EL VALUE SE PASA EL VALOR DE DIAS PARA USARLO EN LA FUNCION --}}
									<option value="{{ $formadepago->id }}-{{ $formadepago->dias }}">{{ $formadepago->descripcion}}</option>
								@endforeach
							</select>
						</div>
						<label for="vencimiento" class="col-sm-2 col-form-label">Vencimiento:</label>
						<div class="col-sm-2">
							<input disabled type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control" value="">
						</div>
					</div>
				{{-- FIN DE DATOS FACTURA --}}
					<hr>
				{{-- DETALLE DE FACTURA --}}
					<div class="space-20"></div>
					<div class="table-responsive-sm-12">
						<div class="form-group text-center table-responsive-sm">
							<h5><b>Detalle de Factura</b></h5>
						</div>
						<div class="form-group row table-responsive-sm text-center">
							<div class="col-sm-1">
								<b title="Codigo">Codigo</b>
							</div>
							<div class="col-sm-2">
								<b title="Descripci&oacute;n">Descripci&oacute;n</b>
							</div>
							<div class="col-sm-1">
								<b title="Unidad de Medida">UM</b>
							</div>
							<div class="col-sm-1">
								<b title="Cantidad">Cant.</b>
							</div>
							<div class="col-sm-1">
								<b title="Precio Unitario">Precio Un.</b>
							</div>
							<div class="col-sm-1">
								<b title="Porcentaje de Descuento">% Dcto.</b>
							</div>
							<div class="col-sm-1">
								<b title="Valor de Descuento">Valor Dcto</b>
							</div>
							<div class="col-sm-1">
								<b>Impuestos</b>
							</div>
							<div class="col-sm-1">
								<b>Precio Total</b>
							</div>
							<div class="col-sm-1">
								<b>Opciones</b>
							</div>
						</div>
						<div class="form-group row table-responsive-sm text-center">
							<div class="col-sm-1">
								<input disabled type="text" name="codigo" id="codigo" class="form-control">
							</div>
							<div class="col-sm-2">
								<select data-placeholder="Seleccione una opción" name="producto" class="select-producto">
									<option value=""></option>
									@foreach ($productos as $producto)
										<option value="{{ $producto->id }}" > {{ $producto->descripcion}} </option>
									@endforeach
								</select>
							</div>
							<div class="col-sm-1">
								<input disabled type="text" name="unidadmedida" id="unidadmedida" class="form-control">
							</div>
							<div class="col-sm-1">
								<input disabled type="number" name="cantidad" id="cantidad" class="form-control">
							</div>
							<div class="col-sm-1">
								<input disabled type="text" name="precio_unitario" id="precio_unitario" class="form-control">
							</div>
							<div class="col-sm-1">
								<input disabled type="text" name="porc_descuento" id="porc_descuento" class="form-control">
							</div>
							<div class="col-sm-1">
								<input disabled type="text" name="valor_descuento" id="valor_descuento" class="form-control">
							</div>
							<div class="col-sm-1">
								<input disabled type="text" name="impuesto" id="impuesto" class="form-control">
							</div>
							<div class="col-sm-1">
								<input disabled type="text" name="precio_total" id="precio_total" class="form-control">
							</div>
							<div class="col-sm-1 btn-group">
								<button class="btn btn-outline-primary btn-sm" title="Editar"><i class="fa fa-pencil-alt"></i></button>
								<button class="btn btn-outline-danger btn-sm" title="Borrar"><i class="fa fa-trash"></i></button>
							</div>
						</div>
					</div>
				{{-- FIN DE DETALLE DE FACTURA --}}

					
				</form>
			</div>
		</div>
	</div>
@endsection

@section('js')
<script>
	var d = new Date();
	year = d.getFullYear();
	month = d.getMonth()+1;
	day = d.getDate();
	var fecha_actual = (year + '-' +(month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day);
	// VALIDAR QUE LA FECHA DE LA FACTURA NO SEA MAYOR A LA ACTUAL
	$(".fecha").attr('max', fecha_actual);
	// FIN VALIDACION DE FECHA


	$(function(){
		var j = jQuery.noConflict();
		$(".select-cliente").chosen({
			width:'100%',
			no_results_text:'No hay resultados para:'
		});

		$(".select-formapago").chosen({
			width:'100%',
			no_results_text:'No hay resultados para:'
		});

		$(".select-producto").chosen({
			width:'100%',
			no_results_text:'No hay resultados para:'
		});
	});
	
	// VALIDAR QUE LA FECHA DE VENCIMIENTO SE ACTUALICE DEPENDIENDO DE LA FORMA DE PAGO SELECCIONADA

	function updateFechVenc(formPago){
		var forma = formPago.split('-') ;
		var formaPago = forma[0];
		if (formaPago == 1) {  /*pago a contado*/
			$("#fecha_vencimiento").attr('value',fecha_actual);
		}else if((formaPago != 1) || (forma[1] > 0)){  /*pago a credito 30 dias*/
			  var fecha_venc = new Date(fecha_actual);
			  //dias a sumar
			  var dias = parseInt(forma[1]);
			  //nueva fecha sumada
			  fecha_venc.setDate(fecha_venc.getDate() + dias +1);
			  //formato de salida para la fecha
			  var ano = fecha_venc.getFullYear();
			  var mes = fecha_venc.getMonth() + 1;
			  var dia = fecha_venc.getDate();
			  var resultado = ano + '-' + (mes<10 ? '0' : '') + mes  + '-'+ (dia<10 ? '0' : '') + dia;
			  $("#fecha_vencimiento").attr('value',resultado);
		}else{
			$("#fecha_vencimiento").attr('value','');
		}
	};

</script>
@endsection