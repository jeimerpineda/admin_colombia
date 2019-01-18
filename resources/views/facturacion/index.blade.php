@extends('layouts.principal')
@section('title') Facturaci&oacute;n @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Maestros','Facturaci&oacute;n'])!!}
	<div class="">
		<div class="card">
			<div class="card-header">
				Nueva Factura
			</div>
			<div class="card-body">
				{!!\Basics::printErrors($errors->any(),$errors->all())!!}

				{{-- ENCABEZADO --}}
				<form action="" method="POST" accept-charset="utf-8"  class="cliente col-12">
					@csrf
					<div class="form-group row">
						<label for="seleccioncliente" class="col-1 col-form-label">Cliente:</label>
						<div class="col-2">
							<select data-placeholder="Seleccione una opción" class="select-cliente" >
								<option value=""></option>
								@foreach ($clientes as $cliente)
									<option value="{{ $cliente->id}}">{{ $cliente->dni.' '. $cliente->nombres .' '. $cliente->apellidos}}</option>
								@endforeach
							</select>
						</div>
						<label for="fecha" class="col-1 col-form-label">Fecha:</label>
						<div class="col-2">
							<input required type="date" name="fecha" id="fecha" max="" class="form-control fecha" value="{{old('fecha')}}">
						</div>
					</div>	
					<div class="form-group row">
						<label for="formasdepago" class="col-2 col-form-label">Forma de Pago:</label>
						<div class="col-2">
							<select data-placeholder="Seleccione una opción" class="select-formapago" onchange="updateFechVenc($(this).val())">
								<option value=""></option>
								@foreach ($formasdepago as $formadepago)
									<option value="{{ $formadepago->id}}">{{ $formadepago->descripcion}}</option>
								@endforeach
							</select>
						</div>
						<label for="vencimiento" class="col-1 col-form-label">Vencimiento:</label>
						<div class="col-2">
							<input readonly type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control" value="">
						</div>
					</div>
				</form>
				{{-- FIN DE ENCABEZADO --}}
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
			no_results_text:'No hay resultados para:',
			allow_single_deselect: true
		});

		$(".select-formapago").chosen({
			width:'100%',
			no_results_text:'No hay resultados para:',
			allow_single_deselect: true
		});
	});
	
	// VALIDAR QUE LA FECHA DE VENCIMIENTO SE ACTUALICE DEPENDIENDO DE LA FORMA DE PAGO SELECCIONADA

	function updateFechVenc(formPago){
		if (formPago == 1) {  /*pago a contado*/
			$("#fecha_vencimiento").attr('value',fecha_actual);
		}else if(formPago == 2 ){  /*pago a credito 30 dias*/
			// sumar 30 dias a la fecha actual
			// $("#fecha_vencimiento").attr('value',fecha_actual);
		}else{
			$("#fecha_vencimiento").attr('value','');
		}
	};

</script>
@endsection