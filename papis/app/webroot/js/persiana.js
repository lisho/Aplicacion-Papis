    /*
    *
    *Script para plegar y desplegar paneles en las páginas
    * @funcion: persiana();
    * @panel-class: .persiana
    * @botón-class: .persiana_button
    * 
    * 
     */
$(function() {

    var efecto;

    function esconder_persiana() {
		$(".persiana").effect('fold',null, 500);   //blind  
	}

	function mostrar_persiana() {
		$(".persiana").show('fold',null, 500);     //drop
	}
     
    $(".persiana_button").click(function() {

    	if (efecto=="mostrar") {
    		mostrar_persiana();
    		efecto="esconder";
	    	return false;
    	}else{
    		esconder_persiana();
    		efecto="mostrar";
	    	return false;
    	}
	    
    });
});