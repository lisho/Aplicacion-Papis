$(document).ready(function(){
	$('#s').autocomplete ({
		minLength: 2,
		select:function(event, ui){
			$('#s').val(ui.item.label);
		},

		source:function(request, response){
			$.ajax({
				url:basePath + "alumnos/searchjson",
				data:{
					term:request.term
				},
				dataType: "json",
				success: function(data){
					response($.map(data,function(el,index){
						return{
							value:el.Alumno.nombre_completo,
							nombre:el.Alumno.nombre_completo,
							foto: el.Alumno.foto + '.jpg'
						};
					}));
				}
			});
		}

	}).data("ui-autocomplete")._renderItem = function(ul, item){
		return $("<li></li>")
		.data("item.autocomplete", item)
		.append("<a><img width='40' src='" + basePath + "img/fotos/" + item.foto + "'/>" + item.nombre + "</a>")
		.appendTo(ul)
	};
});