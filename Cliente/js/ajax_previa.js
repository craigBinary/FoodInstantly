$(document).ready(function(){
	
	 $("a.buscame").click(function(){
	var id_restaurant=document.getElementById("id_restaurant").value;		        	
       var id = $(this).attr('id');
       //alert(id_restaurant);
	       //window.location.href = window.location.href + "?id_plato=" + id_plato;
	     $.ajax({
		type: 'POST',
		url: 'inc/previaRestorant.php',
		data: {'id_restaurant':id_restaurant ,'id': id}
		
	})
	
	.done(function(listas_rep){
		$('.modal-body').html(listas_rep)
	})
	.fail(function(){
		alert('Hubo un problema ')
	})
	})
})