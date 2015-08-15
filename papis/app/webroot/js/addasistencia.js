$(document).ready(function(){

		$('.asist').on('keyup change', function(event){
			var asistencia = $(this).val();
			
			ajaxupdate_asistencia($(this).attr("data-id"), asistencia);
			
		});

		$('.observ').on('keyup change', function(event){
			var observaciones = $(this).val();
			
			ajaxupdate_observaciones($(this).attr("data-id"), observaciones);
			
		});

	function ajaxupdate_asistencia(id, asistencia) {
		$.ajax({
			type: "POST",
			url: basePath + "asistencias/asistencia_update",
			data:{
				id: id,
				asistencia: asistencia
			},

			dataType: "json",

		});
	}

	function ajaxupdate_observaciones(id, observaciones) {
		$.ajax({
			type: "POST",
			url: basePath + "asistencias/asistencia_update",
			data:{
				id: id,
				observaciones: observaciones
			},

			dataType: "json",

		});
	}


});



