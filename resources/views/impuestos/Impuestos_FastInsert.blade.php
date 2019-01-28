{!!\Basics::modalHeader(null,'modal_impuesto','Agregar Impuesto - Modo Rápido')!!}
<div class="modal-body">
	<div id="errors-modal-impuestos"></div>
	<form action="{{route('config.impuestos.insert.form.fast')}}" id="form_impuestos_fast" method="POST" class="col-10 offset-1">
		@csrf
		<div class="form-group row">
			<label for="descripcion" class="col-12 col-md-3 col-form-label">Impuesto:</label>
			<div class="col-12 col-md-9">
				<input required type="text" id="descripcion_impuesto" name="descripcion" class="form-control" value="{{old('descripcion')}}">
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
			<button id="submit_impuesto" type="button" class="btn btn-primary">
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
			$('#submit_impuesto').on('click',function(e){
				$.ajax({
	                type: "POST",
	                dataType: 'json',
	                url: $('#form_impuestos_fast').attr('action'),
	                data: $('#form_impuestos_fast').serialize(),
	                success: function (data) {
	                	$('#errors-modal-impuestos').fadeOut();
	                	var comp_1 = '<option value=""></option>';
	                	var respo = "";
	                	var selected = "";
	                	for(i in data) {
	                		selected = (data[i]['descripcion']==$('#descripcion_impuesto').val()) ? 'selected' : "";
	                		respo += '<option value="'+data[i]['id']+'" '+selected+'>'+data[i]['descripcion']+'</option>';
	                	}
	                	$('#impuestos_id').html(comp_1+respo);
	                	$('#form_impuestos_fast').each(function(){
	                		this.reset()
	                	})
	                	$('#modal_impuesto').modal('hide');
	                },
	                error: function (xhr) {
	                	var result = "";
	                	if(xhr.responseJSON.errors) {
	                		for(i in xhr.responseJSON.errors) {
	                			result += "<li>"+xhr.responseJSON.errors[i]+"</li>"
	                		}
	                	}
	                    $('#errors-modal-impuestos').html('<div class="alert alert-danger alert-dismissible fade show"><ul>'+result+'</ul><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')
	                }
	            }, "json")
			})
		})
	</script>
@endsection