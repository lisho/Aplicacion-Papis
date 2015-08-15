$(document).ready(function(){
	$('.numeric').on('keyup change', function(event){
		var calificacion = $(this).val();
		ajaxupdate($(this).attr("data-id"), calificacion);
		
	});

	function ajaxupdate(id, calificacion) {
		$.ajax({
			type: "POST",
			url: basePath + "notas/notaupdate",
			data:{
				id: id,
				calificacion: calificacion
			},

			dataType: "json",

		});
	}
});