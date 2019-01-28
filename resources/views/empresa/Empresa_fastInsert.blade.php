{!!\Basics::modalHeader('lg','modal_empresa','Agregar Empresa - Modo Rápido')!!}
<div class="modal-body">
	<div id="errors-modal-empresa"></div>

	<form action="{{route('config.empresa.insert.form.fast')}}" id="form_empresa_fast" method="POST" class="col-10 offset-1">
		@csrf
		<div class="form-group row">
			<label for="nit" class="col-12 col-lg-4 col-form-label">Nit:</label>
			<div class="col-12 col-lg-8">
				<input required type="text" name="nit" class="form-control" value="{{old('nit')}}">
			</div>
		</div>
		<div class="form-group row">
			<label for="razon" class="col-12 col-lg-4 col-form-label">Razón Social:</label>
			<div class="col-12 col-lg-8">
				<input required type="text" id="razon_social" name="razon" class="form-control" value="{{old('razon_social')}}">
			</div>
		</div>
		<div class="form-group row">
			<label for="direccion" class="col-12 col-lg-4 col-form-label">Dirección:</label>
			<div class="col-12 col-lg-8">
				<input required type="text" name="direccion" class="form-control" value="{{old('direccion')}}">
			</div>
		</div>
		<div class="form-group row">
			<label for="correo" class="col-12 col-lg-4 col-form-label">Correo:</label>
			<div class="col-12 col-lg-8">
				<input required type="text" name="correo" class="form-control" value="{{old('correo')}}">
			</div>
		</div>
		<div class="form-group row">
			<label for="tlf1" class="col-12 col-lg-4 col-form-label">Teléfono Principal:</label>
			<div class="col-12 col-lg-8">
				<input required type="text" name="tlf1" class="form-control" value="{{old('telefono_principal')}}">
			</div>
		</div>
		<div class="form-group row">
			<label for="tlf2" class="col-12 col-lg-4 col-form-label">Teléfono Secundario:</label>
			<div class="col-12 col-lg-8">
				<input type="text" name="tlf2" class="form-control" value="{{old('telefono_segundario')}}">
			</div>
		</div>
		<div class="form-group row">
			<label for="sucursal" class="col-12 col-lg-4 col-form-label">Sucursal:</label>
			<div class="col-12 col-lg-8">
				<input required type="text" name="sucursal" class="form-control" value="{{old('sucursal')}}">
			</div>
		</div>
		
		
		<div class="btn-group d-flex justify-content-center">
			<button type="button" id="submit_empresa_form" class="btn btn-primary">
				<i class="fa fa-save"></i> Crear
			</button>
		</div>
	</form>
</div>
{!!\Basics::modalFooter()!!}

@section('scripts')
	@parent
	<script type="text/javascript">
		$(function(){
			$('#submit_empresa_form').on('click',function(e){
				$.ajax({
	                type: "POST",
	                dataType: 'json',
	                url: $('#form_empresa_fast').attr('action'),
	                data: $('#form_empresa_fast').serialize(),
	                success: function (data) {
	                	$('#errors-modal-empresa').fadeOut();
	                	var comp_1 = '<option value=""></option>';
	                	var respo = "";
	                	var selected = "";
	                	for(i in data) {
	                		selected = (data[i]['razon_social']==$('#razon_social').val()) ? 'selected' : "";
	                		respo += '<option value="'+data[i]['id']+'" '+selected+'>'+data[i]['razon_social']+'</option>';
	                	}
	                	$('#empresa').html(comp_1+respo);
	                	$('#form_empresa_fast').each(function(){
	                		this.reset()
	                	})
	                	$('#modal_empresa').modal('hide');
	                },
	                error: function (xhr) {
	                	var result = "";
	                	if(xhr.responseJSON.errors) {
	                		for(i in xhr.responseJSON.errors) {
	                			result += "<li>"+xhr.responseJSON.errors[i]+"</li>"
	                		}
	                	}
	                    $('#errors-modal-empresa').html('<div class="alert alert-danger alert-dismissible fade show"><ul>'+result+'</ul><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')
	                }
	            }, "json")
			})
		})
	</script>
@endsection