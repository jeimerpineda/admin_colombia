var j = jQuery.noConflict();
j(function(){
	// Chosen para cliente
	j('#client_id').chosen({
		max_selected_options: 1,
		no_results_text: "<a href=\"#\"><i class=\"fa fa-plus\"></i> Agregar</a>",
		width: "95%"
	}).change(function(){
		// Code for changing method
	});
	// Chosen para producto
	j('#productos_id').chosen({
		max_selected_options: 1,
		width: "95%"
	}).change(function(){
		j('#form-add-product').submit()
	});
	// Autofocus product
	j('#productos_id_chosen .chosen-search-input').focus();
	// submit form add-product
	j('#form-add-product').on('submit',function(e){
		var current = j('#form-add-product');
		e.preventDefault();
		j.ajax({
			type: "POST",
	        dataType: 'json',
	        url: current.attr('action'),
	        data: current.serialize(),
	        success: function(data) {
	        	$('div[data-id="'+data[0].id+'"]').remove();
	        	$("#init-card").hide();
	        	var html = '<div data-id="'+data[0].id+'" onclick="detailsItem(\''+data[0].id+'\')" id="'+data[0].id+'" class="card col-12 card-detail animated fadeInRight"><div class="card-body pt-3 pb-1"><p><span class="float-right border-left pl-3"><strong>'+data[0].total_pagar.toFixed(2)+'</strong></span><span class="pr-2">'+data[0].cantidad+' x '+data[0].producto.descripcion+'</span></p></div></div>'
	        	j('#responses').prepend(html)
	        	j('#facturas_id').val(data[0].facturas_id);
	        	j("#productos_id").val('');
	        	j("#productos_id").chosen("destroy");
	        	j("#productos_id").chosen().trigger("chosen:updated");
	        	j('#productos_id_chosen .chosen-search-input').focus();
	        	j(".total_sin_impuestos").text(data.total_sin_impuesto.toFixed(2))
	        	j(".total_impuestos").text(data.total_impuestos.toFixed(2))
	        	j(".total_pagar").text(data.total_pagar.toFixed(2))
	        },
	        error: function(xhr) {

	        }
		}, 'json');
	})
})

function detailsItem(id_selector) {
	j(function(){
		j('.card').removeClass('bg-item-select')
		j('#'+id_selector).addClass('bg-item-select')
		j('#factura_detalles_id').val(id_selector)
		j.ajax({
			type: "POST",
	        dataType: 'json',
	        url: j('#product-details').attr('action'),
	        data: j('#product-details').serialize(),
	        success: function(data) {
	        	j('#table-details-product').removeClass('d-none');
	        	animateCss('#table-details-product','fadeIn')
	        	
	        	j('#table_codigo_barrra').text(data[0].producto.codigo_barrra);
	        	j('#table_descripcion').text(data[0].producto.descripcion);
	        	j('#table_unidad_medida_descripcion').text(data[0].producto.unimed.descripcion);
	        	j('#table_precio_venta1').text(data[0].producto.precio_venta1);
	        	j('#table_cantidad').text(data[0].cantidad);
	        	j('#table_descuento').text(data[0].descuento);
	        	j('#table_impuesto').text(data[0].total_impuestos.toFixed(2));
	        	j('#table_total_pagar').text(data[0].total_pagar.toFixed(2));
	        },
	        error: function(xhr) {

	        }
		}, 'json');
	})
}