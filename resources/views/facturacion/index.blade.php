@extends('layouts.principal')
@section('title') Facturaci&oacute;n @endsection
@section('content')
	{!!\Basics::Breadcrumb(['Maestros','Facturaci&oacute;n'])!!}
	<div class="container-fluid">
		{{-- PARA IMPRIMIR MENSAJES --}}
		{!!\Basics::printMessage('message')!!}
		{{-- FIN DE IMPRESION DE MENSAJES --}}

		{{-- BUSCADOR DE CLIENTE --}}
		<div class="form-group">
			<label for="cliente">Cliente:</label>
			<select data-placeholder="Seleccione una opción" class="chosen-select-width" tabindex="-1" style="display: none;">
			{{-- <select name="" class="form-control search-cliente"> --}}
				<option value=""></option>
				<option value="1">option1</option>
				<option value="2">option2</option>
				<option value="3">option3</option>
			</select>
		</div>

		{{-- FIN DE BUSCADOR CLEINTE --}}
	</div>
@endsection

@section('js')
	<script>
		$('.chosen-select-width').chosen({
			width:'50%'
		});
	</script>
@endsection