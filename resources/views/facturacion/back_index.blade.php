@extends('layouts.principal')
@section('title') Facturaci&oacute;n @endsection
@section('content')
	<style type="text/css" media="screen">
		.borde{
			border-top: 1px solid black;
			padding-top: 20px;
		}
	</style>
	{!!\Basics::Breadcrumb(['Maestros','Facturaci&oacute;n'])!!}
	<div class="">
		<div class="card">
			<div class="card-header">
				<h3>Nueva Factura</h3>
				<div class="select_aqui"></div>
			</div>
			<div class="card-body">
				{!!\Basics::printErrors($errors->any(),$errors->all())!!}

				{{-- DATOS FACTURA --}}
				<form action="" method="POST" accept-charset="utf-8"  class="cliente col-12">
					@csrf

						<label for="seleccioncliente" class="col-md-2 col-form-label">Cliente:</label>
						<div class="col-md-2">
							<select data-placeholder="Seleccione una opción" name="cliente" class="chosen" >

								<option value=""></option>
								@foreach ($clientes as $cliente)
									<option value="{{ $cliente->id}}">{{ $cliente->dni.' '. $cliente->nombres .' '. $cliente->apellidos}}</option>
								@endforeach
							</select>
						</div>
						<label for="fecha" class="col-md-2 col-form-label">Fecha:</label>
						<div class="col-md-2">
							<input required type="date" name="fecha" id="fecha" max="" class="form-control fecha" value="{{old('fecha')}}">
						</div>
					</div>	
					<div class="form-group row">

						<label for="formasdepago" class="col-md-2 col-form-label">Forma de Pago:</label>
						<div class="col-md-2">

							<select data-placeholder="Seleccione una opción" name="formadepago" class="chosen" onchange="updateFechVenc($(this).val())">

								<option value=""></option>
								@foreach ($formasdepago as $formadepago)
								{{-- EN EL VALUE SE PASA EL VALOR DE DIAS PARA USARLO EN LA FUNCION --}}
									<option value="{{ $formadepago->id }}-{{ $formadepago->dias }}">{{ $formadepago->descripcion}}</option>
								@endforeach
							</select>
						</div>
						<label for="vencimiento" class="col-md-2 col-form-label">Vencimiento:</label>
						<div class="col-md-2">
							<input disabled type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control" value="">
						</div>
					</div>
				{{-- FIN DE DATOS FACTURA --}}
					<hr>
				{{-- DETALLE DE FACTURA --}}
					<div class="space-20"></div>

					<div class="table-responsive-md">


						<div class="form-group text-center table-responsive-md">
							<h5><b>Detalle de Factura</b></h5>
						</div>
						<table id="table-factura" class="table tabla-responsiva table-md table-factura">

							<thead>
								<tr>
									<th>Codigo</th>
									<th>Descripci&oacute;n</th>
									<th title="Unidad de Medida">UM</th>

									<th title="Precio Unitario">Precio Un.</th>
									<th title="Cantidad">Cant.</th>

									<th title="Porcentaje de Descuento">% Dcto.</th>
									<th title="Valor de Descuento">Valor Dcto</th>
									<th title="Impuestos">Impuestos</th>
									<th title="Precio Total">Precio Total</th>
									<th title="Opciones">Opciones</th>
								</tr>
							</thead>
							<tbody>

									<td  width="12%"><input disabled type="text" name="codigo[]" id="codigo" class="form-control" value=""></td>
									<td>
										<select data-placeholder="Seleccione una opción" name="producto[]" id="producto" class="chosen select_prueba">

											<option value=""></option>
											@foreach ($productos as $producto)
												<option value="{{ $producto->id }}" > {{ $producto->descripcion}} </option>
											@endforeach
										</select>
									</td>

									<td width="10%"><input disabled type="text" name="unidadmedida[]" id="unidadmedida" class="form-control" value=""></td>
									<td id="precios">
										<select disabled data-placeholder="Seleccione una opción" name="precio_uni[]" id="precio_unitario" class="custom-select">
										</select>
									</td>
									<td width="8%"><input disabled type="number" min="1" name="cantidad[]" id="cantidad" class="form-control" value=""></td>
									<td  width="6%"><input disabled type="text" name="porc_descuento[]" id="porc_descuento" class="form-control" value=""></td>
									<td><input disabled type="text" name="valor_descuento[]" id="valor_descuento" class="form-control" value=""></td>
									<td width="5%"><input disabled type="text" name="impuesto[]" id="impuesto" class="form-control" value=""></td>
									<td><input disabled type="text" name="precio_total[]" id="precio_total" class="form-control" value=""></td>
									<td align="center">
										<div class="btn-group">
											{{-- <button class="btn btn-outline-primary btn-sm col-sm-6" title="Editar"><i class="fa fa-pencil-alt"></i></button> --}}
											<button class="btn btn-outline-danger btn-sm col-sm-12" title="Borrar"><i class="fa fa-trash"></i></button>
										</div>
									</td>
								</tr>
								
							</tbody>
						</table>
					
						<div class="col-md-4 form-group offset-md-8 offset-xs-8 row" style="border-top: 1px solid #dee2e6; padding-top: 10px;">
							<label class="col-form-label col-md-6 font-weight-bold">Total Sin Impuestos:</label>
							<div class="col-md-6"><input readonly type="text" value="00,00" name="total_sin_impuesto" id="total_sin_impuesto" class="form-control" ></div>
						</div>
						<div class="col-md-4 form-group offset-md-8 offset-xs-8 row" style="border-top: 1px solid #dee2e6; padding-top: 10px;">
							<label class="col-form-label col-md-6 font-weight-bold">Total de Impuestos:</label>
							<div class="col-md-6"><input readonly type="text" value="00,00" name="total_impuestos" id="total_impuestos" class="form-control" ></div>
						</div>
						<div class="col-md-4 form-group offset-md-8 offset-xs-8 row" style="border-top: 1px solid #dee2e6; padding-top: 10px;">
							<label class="col-form-label col-md-6 font-weight-bold">Total a Pagar:</label>
							<div class="col-md-6"><input readonly type="text" value="00,00" name="total_pagar" id="total_pagar" class="form-control"></div>
						</div>
						<input type="hidden" name="unidmed_id[]" id="unidmed_id" value="">
						<input type="hidden" name="impuesto_id[]" id="impuesto_id" value="">
					

				</form>
			</div>
		</div>
	</div>
@endsection

@section('js')
<script>
	var j = jQuery.noConflict();  // SE ASIGNA LA VARIABLE J PARA EVITAR LOS CONFLICTOS CON EL ARCHIVO APP.JS 
								  // POR LO TANTO LA VARIABLE $ ES SUPLANTADA POR LA VARIABLE J


	var d = new Date();
	year = d.getFullYear();
	month = d.getMonth()+1;
	day = d.getDate();
	var fecha_actual = (year + '-' +(month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day);
	// VALIDAR QUE LA FECHA DE LA FACTURA NO SEA MAYOR A LA ACTUAL

	j(".fecha").attr('max', fecha_actual);
	// FUNCION CARDTABLE PARA LA TABLA RESPONSIVE
	j('#table-factura').cardtable();
	j(function(){
		// CLASES CHOSEN
		// var j = jQuery.noConflict();
		j(".chosen").chosen({
			width:'100%',
			no_results_text:'No hay resultados para:'
		});

		j('.select_prueba').on('change', function() {
			cargarProducto(this.value);
		});

	});


	// FUNCION PARA DAR EL FORMATO A LOS PRECIOS
	function number_format(amount, decimals) {
	    amount += ''; // por si pasan un numero y no un string
	    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

	    decimals = decimals || 0; // por si la variable no fue pasada

	    // si no es un numero o es igual a cero retorno el mismo cero
	    if (isNaN(amount) || amount === 0) 
	        return parseFloat(0).toFixed(decimals);

	    // si es mayor o menor que cero retorno el valor formateado como numero
	    amount = '' + amount.toFixed(decimals);

	    var amount_parts = amount.split('.'),
	        regexp = /(\d+)(\d{3})/;

	    while (regexp.test(amount_parts[0]))
	        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + '.' + '$2');

	    return amount_parts.join(',');
	};
	
	// VALIDAR QUE LA FECHA DE VENCIMIENTO SE ACTUALICE DEPENDIENDO DE LA FORMA DE PAGO SELECCIONADA
	function updateFechVenc(formPago){
		var forma = formPago.split('-') ;
		var formaPago = forma[0];
		if (formaPago == 1) {  /*pago a contado*/
			j("#fecha_vencimiento").attr('value',fecha_actual);
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
			  j("#fecha_vencimiento").attr('value',resultado);
		}else{
			j("#fecha_vencimiento").attr('value','');
		}
	}


	function cargarProducto(producto_id){
		// CARGAR DATOS DEL PRODUCTO
		// console.log(producto_id);

		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "{{ route('ventaspos.facturacion.getproducto') }}",
			data:{'producto_id' : producto_id} ,
	                success: function (data) {
	                	var comp_1 = '<option value=""></option>';
	                	var respo = "";
	                	var selected = "";
	                	for(i in data) {
	                		selected = (data[i]['id']==$('#producto').val()) ? 'selected' : "";
	                		respo += '<option value="'+data[i]['id']+'" '+selected+'>'+data[i]['codigo_barra']+'</option>';
	                	}
	                	$('#prueba').html(comp_1+respo);
	                },
	                error: function (xhr) {
	                	var result = "";
	                	if(xhr.responseJSON.errors) {
	                		for(i in xhr.responseJSON.errors) {
	                			result += "<li>"+xhr.responseJSON.errors[i]+"</li>"
	                		}
	                	}
	                	$('#errores').html('<div class="alert alert-danger alert-dismissible fade show"><ul>'+result+'</ul><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')
	                }
	            }, "json")
	}

	// CARGAR TODOS LOS DATOS DE LOS PRODUCTOS
	function cargarProducto(producto_id){
		j(function(){
			j.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': j('meta[name="csrf-token"]').attr('content')
			    }
			});
			j.ajax({
				type: "POST",
				dataType: 'json',
				url: "{{ route('ventaspos.facturacion.getproducto') }}",
				data:{'producto_id' : producto_id} ,
                success: function (data) {

                	// LAS POSICIONES 0,1,2 SE TOMAN JSON QUE LLEGA DESDE EL CONTROLADOR PARA TOMAR LAS FORANEAS
                	j('input[name="codigo[]"]').val(data[0].codigo_barrra);
                	j('input[name="unidadmedida[]"]').val(data[1].descripcion);
                	j('input[name="unidmed_id[]"]').val(data[1].id); // PARA PASAR EL ID DE UNID-MED EN EL INPUT HIDDEN
                	j('input[name="cantidad[]"]').removeAttr('disabled').val('1');
                	//$('input[name="precio_unitario"]').val(data[0].precio_venta1); // ESTO DEBE SER UN SELECT
                	j('input[name="porc_descuento[]"]').val(data[0].porcentaje_descuento+'%');
                	j('input[name="impuesto[]"]').val(data[2].descripcion+'%');
                	j('input[name="impuesto_id[]"]').val(data[2].id); // PARA PASAR EL ID DEL IMPUESTO EN EL INPUT HIDDEN    


                	// IMPRIMIR EL SELECT DE LOS PRECIOS UNITARIOS
                	j('select[name="precio_uni[]"').hide();
                	var respo = "";
                	var selected = "";
                	selected = (data[0]['id'] == 1) ? 'selected' : "";

                	respo += '<select data-placeholder="Seleccione una opción" name="precio_unitario[]" id="precio_unitario" class="custom-select">';
                	respo += '<option value="'+data[0]['precio_venta1']+'" '+selected+'>'+data[0]['precio_venta1']+'</option>';
                	respo += '<option value="'+data[0]['precio_venta2']+'">'+data[0]['precio_venta2']+'</option>';
                	respo += '</select>'
                	j('td[id="precios"').html(respo);

                	j('input[name="cantidad[]"]').focus(); // PARA QUE 
                	j('input[name="cantidad[]"]').numeric();
					var cantidad = j('input[name="cantidad[]"]').val();
					calcularTotales(cantidad);
					agregarFila();
                },
                error: function (xhr) {
                	var result = "";
                	if(xhr.responseJSON.errors) {
                		for(i in xhr.responseJSON.errors) {
                			result += "<li>"+xhr.responseJSON.errors[i]+"</li>"
                		}
                	}
                	j('#errores').html('<div class="alert alert-danger alert-dismissible fade show"><ul>'+result+'</ul><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')
                }
            }, "json")
		})
	};

	// CADA QUE SE MODIFIQUE LA CANTIDAD A FACTURAR SE RECALCULEN LOS TOTALES
	j(document).ready(function() {
		j('input[name="cantidad[]"]').keyup(function(){ 
			var cantidad = this.value;
			calcularTotales(cantidad);	
		});
	});

	function calcularTotalesFinales(porc_impuesto1,total){
		// CALCULAR TOTAL SIN IMPUESTOS 
		var total_sin_impuesto = total - porc_impuesto1;

		// CALCULAR TOTAL DE IMPUESTOS (suma de todos los impuestos)
		var total_impuestos = porc_impuesto1; // sumar todos porc_impuesto1[i]; 

		var total_pagar = total; // sumar todos total[i];
		total_sin_impuesto = number_format(total_sin_impuesto,2);
		total_impuestos = number_format(total_impuestos,2);
		total_pagar = number_format(total_pagar,2);
		j('input[name="total_sin_impuesto"]').val(total_sin_impuesto);		
		j('input[name="total_impuestos"]').val(total_impuestos);
		j('input[name="total_pagar"]').val(total_pagar);
	}

	// CALCULAR LOS PRECIOS LUEGO DE SELECCIOAR EL PRODUCTO
	function calcularTotales(cantidad){
		j('input[name="cantidad[]"]').numeric().length;
		var porc_descuento = j('input[name="porc_descuento[]"]').val();
		var precio_unitario = j('select[name="precio_unitario[]"').val();
		var porc_impuesto = j('input[name="impuesto[]"').val();

		var porc_des = porc_descuento.split('%');
		var porc_imp = porc_impuesto.split('%');

		// CALCULAR PRECIO UNITARIO POR LA CANTIDAD A FACTURAR
		precio_unitario1 = parseFloat(precio_unitario) * parseFloat(cantidad);

		// CALCULAR VALOR DEL DESCUENTO EN BASE AL PRECIO UNITARIO FINAL
		valor_descuento = (parseFloat(porc_des[0]/100)) * parseFloat(precio_unitario1);

		// CALULO DEL PRIMER TOTAL
		total1 = parseFloat(precio_unitario1) - parseFloat(valor_descuento);

		// CALCULO DEL IMPUESTO
		porc_impuesto1 = (parseFloat(porc_imp[0])/100) * parseFloat(total1);

		// CALCULO DEL TOTAL FINAL
		total = parseFloat(total1) + parseFloat(porc_impuesto1);
		total_fin = number_format(total,2);
		valor_descuento = number_format(valor_descuento,2);

		j('input[name="valor_descuento[]"]').val(valor_descuento);
		j('input[name="precio_total[]"]').val(total_fin);

		calcularTotalesFinales(porc_impuesto1,total);

	}

	// AGREGAR NUEVA FILA A LA TABLA LUEGO DE SELECCIONAR EL PRODUCTO
	function agregarFila() {
		var html = 
		'<tr>'+
			'<td  width="12%"><input disabled type="text" name="codigo[]" id="codigo" class="form-control" value=""></td>'+
			'<td>'+
				'<select data-placeholder="Seleccione una opción" name="producto[]" id="producto" class="select_prueba chosen" onchange="cargarProducto($(this).val())">'+
				'<option value=""></option>'+
				@foreach ($productos as $producto)
				'<option value="{{ $producto->id }}" > {{ $producto->descripcion}} </option>'+
				@endforeach
				'</select>'+
			'</td>'+
			'<td width="10%"><input disabled type="text" name="unidadmedida[]" id="unidadmedida" class="form-control" value=""></td>'+
			'<td id="precios">'+
				'<select disabled data-placeholder="Seleccione una opción" name="precio_uni[]" id="precio_unitario" class="custom-select">'+
				'</select>'+
			'</td>'+
			'<td width="8%"><input disabled type="number" min="1" name="cantidad[]" id="cantidad" class="form-control" value=""></td>'+
			'<td  width="5%"><input disabled type="text" name="porc_descuento[]" id="porc_descuento" class="form-control" value=""></td>'+
			'<td><input disabled type="text" name="valor_descuento[]" id="valor_descuento" class="form-control" value=""></td>'+
			'<td width="5%"><input disabled type="text" name="impuesto[]" id="impuesto" class="form-control" value=""></td>'+
			'<td><input disabled type="text" name="precio_total[]" id="precio_total" class="form-control" value=""></td>'+
			'<td align="center">'+
				'<div class="btn-group">'+
					// '<button class="btn btn-outline-primary btn-sm col-sm-6" title="Editar"><i class="fa fa-pencil-alt"></i></button>'+
					'<button class="btn btn-outline-danger btn-sm col-sm-12" title="Borrar"><i class="fa fa-trash"></i></button>'+
				'</div>'+
			'</td>'+
		'</tr>';
		j('#table-factura tbody').append(html);
		j('.chosen').chosen({width:'100%',no_results_text:'No hay resultados para:'}).trigger("chosen:updated");
		
		// j('.select_prueba').on('change', function() {
		// 	cargarProducto(this.value);
		// });

		j('input[name="cantidad[]"]').keyup(function(){ 
			var cantidad = this.value;
			calcularTotales(cantidad);	
		});

		// alert(j('input[name="valor_descuento[]"]').length);

		
	}

</script>
@endsection