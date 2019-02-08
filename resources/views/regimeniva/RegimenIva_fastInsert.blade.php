{!!\Basics::modalHeader(null,'regimen_iva','Agregar Regimen de Iva - Modo Rápido')!!}
<div class="modal-body">
	<div id="errors-modal"></div>
	<form action="{{route('config.regimeniva.insert.form.fast')}}" id="form_regimeniva_fast" method="POST" class="col-10 offset-1">
		@csrf
		<div class="form-group row">
			<label for="descripcion" class="col-12 col-md-3 col-form-label">Descripci&oacute;n:</label>
			<div class="col-12 col-md-9">
				<input required type="text" id="descripcion_regimen" name="descripcion" class="form-control" value="{{old('descripcion')}}">
			</div>
		</div>
		<div class="form-group row">
			<label for="status" class="col-12 col-md-3 col-form-label">Status:</label>
			<div class="col-12 col-md-9">
				<select name="status" id="status" class="custom-select">
					<option value="1" {{\Basics::selected(1,old('status'))}}>Activo</option>
					<option value="0" {{\Basics::selected(0,old('status'))}}>Inactivo</option>
				</select>
			</div>
		</div>
		<div class="btn-group d-flex justify-content-center">
			<button type="button" id="submit-regimen-iva-form" class="btn btn-primary">
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
			$('#submit-regimen-iva-form').on('click',function(e){
				$.ajax({
	                type: "POST",
	                dataType: 'json',
	                url: $('#form_regimeniva_fast').attr('action'),
	                data: $('#form_regimeniva_fast').serialize(),
	                success: function (data) {
	                	$('#errors-modal').fadeOut();
	                	var comp_1 = '<option value=""></option>';
	                	var respo = "";
	                	var selected = "";
	                	for(i in data) {
	                		selected = (data[i]['descripcion']==$('#descripcion_regimen').val()) ? 'selected' : "";
	                		respo += '<option value="'+data[i]['id']+'" '+selected+'>'+data[i]['descripcion']+'</option>';
	                	}
	                	$('#regimen_iva_id').html(comp_1+respo);
	                	$('#form_regimeniva_fast').each(function(){
	                		this.reset()
	                	})
	                	$('#regimen_iva').modal('hide');
	                },
	                error: function (xhr) {
	                	var result = "";
	                	if(xhr.responseJSON.errors) {
	                		for(i in xhr.responseJSON.errors) {
	                			result += "<li>"+xhr.responseJSON.errors[i]+"</li>"
	                		}
	                	}
	                    $('#errors-modal').html('<div class="alert alert-danger alert-dismissible fade show"><ul>'+result+'</ul><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')
	                }
	            }, "json")
			})
		})
	</script>
@endsection