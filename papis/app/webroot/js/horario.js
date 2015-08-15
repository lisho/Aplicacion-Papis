	
	var efecto;

$(function() {

    var efecto;

	function mostrar_horario() {
		$("#horario").show('scale',null, 500);
	}

	function ocultar_horario() {
		$("#horario").hide('scale',null, 500);
	}
	
	function cambiar() {
		$("#horario").toggle('scale',{percent: 0}, 500).draggable();
	}

	$(".boton_horario").click(function() {
 
    	/*if (efecto=='no_activo') {
    		ocultar_horario();
    		efecto='activo';
	    
    	}else{
    		mostrar_horario();
	    	efecto='no_activo';
    	}*/

    	cambiar();
    	
	    
    });
});