/*var request =new XMLHttpRequest();

request.open('GET','ejemploajax.php');
request.onreadystatechange= function(){
	if((request.status==200) && (request.readyState==4)){
		console.log(request.responseText);
	}

}
request.send();


readyState   Descripción

0           La solicitud no se ha inicializado
1           Conexión con el servidor establecida
2           El servidor ha recibido la solicitud
3           El servidor esta procesando la solicitud
4           La solicitud ha sido procesada y la respuesta está lista

*/
$(document).ready(function(){
	$.ajax({
		type: 'POST',
		url: 'inc/selectComuna.php'
		
	})
	.done(function(listas_rep){
		$('#select').html(listas_rep)
	})
	.fail(function(){
		alert('Hubo un problema en primer select')
	})

	$('#select').on('change',function(){
		var id = $('#select').val()
		$.ajax({
		type: 'POST',
		url: 'inc/selectRestaurant.php',
		data: {'id': id}
		
	})
	.done(function(listas_rep){
		$('#agileinfo_search').html(listas_rep)
	})
	.fail(function(){
		alert('Hubo un problema en segundo select')
	})
	})
	$('#buscar').on('click',function(){
		var comuna = $('#select').val()
		var restaurant = $('#agileinfo_search').val()
		/* if(comuna == 0 || restaurant == 0){
			alert('Debe seleccionar comuna y restaurant')
		}  */
		if(comuna == 0 || comuna == ""){
			alert('Debe seleccionar una comuna ')
		}
	})	
/*
	$('#buscar').on('click',function(){
	$('#select option:selectd').text()
	})*/
})