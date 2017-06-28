$(document).ready(function(){
	 $("a.accordion-titulo").click(function(){
					        	
        var id_solicitud = $(this).attr('id');
	     $.ajax({
		type: 'POST',
		url: 'inc/tablasPedidos.php',
		data: {'id_solicitud':id_solicitud}
		
	})
	
	.done(function(listas_rep){
		$('.accordion-content').html(listas_rep)
	})
	.fail(function(){
		alert('Hubo un problema ')
	})
	})

})