@extends('layouts.principal')
@section('title') Facturaci&oacute;n @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Maestros','Facturaci&oacute;n'])!!}
	<div class="container-fluid">
		{{-- PARA IMPRIMIR MENSAJES --}}
		{!!\Basics::printMessage('message')!!}
		{{-- FIN DE IMPRESION DE MENSAJES --}}

		{{-- BUSCADOR DE CLIENTE --}}
		<form action="" method="POST" accept-charset="utf-8">
			<div class="form-group">
				<label for="cliente">Cliente:</label>
				<select data-placeholder="Seleccione una opción" class="select-cliente" >
					<option value=""></option>
					@foreach ($clientes as $cliente)
						<option value="{{ $cliente->id}}">{{ $cliente->dni.' '. $cliente->nombres .' '. $cliente->apellidos}}</option>
					@endforeach
				</select>
				<button class="btn btn-primary">
					<i class="fa fa-check"></i>
				</button>
			</div>
		</form>
		{{-- FIN DE BUSCADOR CLEINTE --}}
	</div>
@endsection

@section('js')
	<script>
		$(function(){
			var j = jQuery.noConflict();
			$(".select-cliente").chosen({
				width:'20%',
				no_results_text:'No hay resultados para:',
				allow_single_deselect: true
			});
		})
	</script>
@endsection