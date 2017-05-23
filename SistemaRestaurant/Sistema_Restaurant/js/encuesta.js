function PaginaOrganizaciones(pagina)
{
	var registros_orga=$("#registros_orga").val();
	var buscar_orga=	$("#buscar_orga").val();	
	
	var parametros = 
{             
"page_curr" : pagina,
"registros_orga":registros_orga,
"buscar_orga" :buscar_orga

};

$.ajax({
data:  parametros,
url:   'detalle_listar.php',
type:  'post',
beforeSend: function () {
  // $("#resultado").html("Procesando, espere por favor...");
},
success:  function (response) {
	
$("#ListarPlatos").html(response);


}
});
	
	
}


function EditarPlato(id_plato)
{
	var parametros = {
			"id_plato" : id_plato
			};
	
	$.ajax({
		    data:  parametros,
			url:   'editar_plato.php',
			type:  'post',
			beforeSend: function () {
					
			//	$("#btn_enviar").attr("disabled",true);
			},
			success:  function (response) {
				 
				$("#ventana_modal").html(response);	
			$('#largeModal').modal('show');
			}
	});
	
	
}

function ActualizarPlato(id_plato)
{
	var nombre_plato=$("#nombre_plato").val();
	var precio=$("#precio").val();	
	var tipo=$("#tipo").val();	
	var info=$("#info").val();
	var tiempo=$("#tiempo").val();
	var estado=$("#estado").val();
	
	
	
	if(nombre_plato==""){
		$("#val_valida" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe ingresar un Nombre Para el Plato</div>');
	  return false;
		}	
	if(precio==""){
		$("#val_valida" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe ingresar un Precio ($) Para el Plato</div>');
	  return false;
		}
		if(tipo==0){
		$("#val_valida" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe Seleccionar un Tipo de Plato</div>');
	  return false;
		}
		
		if(tiempo==""){
		$("#val_valida" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe Ingresar el tiempo de preparaci&oacute;n del plato</div>');
	  return false;
		}
		if(estado==0){
		$("#val_valida" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe seleccionar el estado del plato</div>');
	  return false;
		}
			var parametros = {             
		
		"nombre_plato" : nombre_plato,
		"precio" : precio,
		"tipo" : tipo,
		"info" : info,
		"tiempo" : tiempo,
		"estado" : estado,
		"id_plato" : id_plato,

		
							
	};
		
	$.ajax({
		data:  parametros,
		url:   'actualizar_plato.php',
		type:  'post',
		beforeSend: function () {
		// $("#resultado").html("Procesando, espere por favor...");
		  $("#btn_enviar").attr("disabled",true);
		},
		success:  function (response) {
			 $('.modal.in').modal('hide');
						
					 showNotification("alert-success", "Datos Guardados  ",'bottom','center',null,null); 
		RefrescaListar();
		}
		
	});
}
function EliminaPlato(id_plato)
{ 
	if(!confirm("\u00BFEsta seguro de eliminar este plato?")) 
	{
		return false;
	}
	var parametros = {             
		"id_plato" : id_plato
				
	};

	$.ajax({
		data:  parametros,
		url:   'eliminar_plato.php',
		type:  'post',
		beforeSend: function () {
			   // $("#resultado").html("Procesando, espere por favor...");
		},
		success:  function (response) {
			 
		  showNotification("alert-success", "Datos Eliminados  ",'bottom','center',null,null); 
		RefrescaListar();
		
		
		}});
		
}


function ValidaFormularioVacio(valor,diverror){
	if(valor!="")
	$("#"+diverror ).html(null);	
}
function RefrescaListar()
{ 
		var registros_orga=$("#registros_orga").val();
	var buscar_orga=	$("#buscar_orga").val();
	var pagina=$("#pag_actual_oculto").val();
	
		var parametros = 
{             
"page_curr" : pagina,
"registros_orga":registros_orga,
"buscar_orga":buscar_orga

};
	

	$.ajax({
		data:  parametros,
		url:   'detalle_listar.php',
		type:  'post',
		beforeSend: function () {
			   // $("#resultado").html("Procesando, espere por favor...");
		},
		success:  function (response) {
			 
		$("#ListarPlatos").html(response);	
		
		
		}});
		
}
function IngresarPlato()
{

	
	$.ajax({

			url:   'ingresar_plato.php',
			type:  'post',
			beforeSend: function () {
					
			//	$("#btn_enviar").attr("disabled",true);
			},
			success:  function (response) {
				 
				$("#ventana_modal").html(response);	
			$('#largeModal').modal('show');
			}
	});
	
	
}

function GuardarPlato()
{
	var nombre_plato=$("#nombre_plato").val();
	var precio=$("#precio").val();	
	var tipo=$("#tipo").val();	
	var info=$("#info").val();
	var tiempo=$("#tiempo").val();
	var estado=$("#estado").val();
	
	
	
	if(nombre_plato==""){
		$("#val_valida" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe ingresar un Nombre Para el Plato</div>');
	  return false;
		}	
	if(precio==""){
		$("#val_valida" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe ingresar un Precio Para el Plato</div>');
	  return false;
		}
		if(tipo==0){
		$("#val_valida" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe Seleccionar un Tipo de Plato</div>');
	  return false;
		}
		
		if(tiempo==""){
		$("#val_valida" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe Ingresar el tiempo de preparaci&oacute;n del plato</div>');
	  return false;
		}
		if(estado==0){
		$("#val_valida" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe seleccionar el estado del plato</div>');
	  return false;
		}
			var parametros = {             
		
		"nombre_plato" : nombre_plato,
		"precio" : precio,
		"tipo" : tipo,
		"info" : info,
		"tiempo" : tiempo,
		"estado" : estado,

		
							
	};
		
	$.ajax({
		data:  parametros,
		url:   'guardar_plato.php',
		type:  'post',
		beforeSend: function () {
		// $("#resultado").html("Procesando, espere por favor...");
		  $("#btn_enviar").attr("disabled",true);
		},
		success:  function (response) {
			 $('.modal.in').modal('hide');
						
					 showNotification("alert-success", "Datos Guardados  ",'bottom','center',null,null); 
		RefrescaListar();
		}
		
	});
}

function IngresarRestaurant()
{
	var nombre_restaurant=$("#nombre_restaurant").val();
	var direccion=$("#direccion").val();	
	var numero=$("#numero").val();	
	var email=$("#email").val();
	var info=$("#info").val();
	
	
	if(nombre_restaurant==""){
		$("#val_nombre" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe ingresar un Nombre Para el Restaurant</div>');
	  return false;
		}	
	if(direccion==0){
		$("#val_direccion" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe seleccionar la direcci&oacute;n del Restaurant</div>');
	  return false;
		}
		if(numero==""){
		$("#val_numero" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe Ingresar un N&uacute;mero de Contacto</div>');
	  return false;
		}
		
		if(info==""){
		$("#val_info" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe Ingresar una descripci&oacute;n o Informaci&oacute;n del Restaurant</div>');
	  return false;
		}
		
			var parametros = {             
		
		"nombre_restaurant" : nombre_restaurant,
		"direccion" : direccion,
		"numero" : numero,
		"email" : email,
		"info" : info,
							
	};
		
	$.ajax({
		data:  parametros,
		url:   'guardar_restaurant.php',
		type:  'post',
		beforeSend: function () {
		// $("#resultado").html("Procesando, espere por favor...");
		  $("#btn_enviar").attr("disabled",true);
		},
		success:  function (response) {
					 showNotification("alert-success", "Datos Guardados  ",'bottom','center',null,null); 
		cancelarIngreso()
		}
		
	});
}
function cancelarIngreso()
{
	
	
	   $.ajax({
               	url:   'form_ingreso_restaurant.php',
                type:  'post',
                beforeSend: function () {
                       // $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                      $("#form-ingreso").html(response);
					 
						
						
                }
        });
	
}
function IngresarUsuario()
{
	var nombre_usuario_restaurant=$("#nombre_usuario_restaurant").val();
	var clave=$("#clave").val();	
	var clave_repite=$("#clave_repite").val();	
	var restaurant=$("#restaurant").val();
	var tipo=$("#tipo").val();
	
	alert(tipo);
	if(nombre_usuario_restaurant==""){
		$("#val_nombre" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe ingresar un Nombre de Usuario</div>');
	  return false;
		}	
	if(clave==""){
		$("#val_pass" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe Ingresar su contrase&ntilde;a</div>');
	  return false;
		}
		if(clave_repite==""){
		$("#val_pass_repite" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe Repetir la  contrase&ntilde;a</div>');
	  return false;
		}
		
		if(restaurant==0){
		$("#val_restaurant" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe seleccionar un Restaurant</div>');
	  return false;
		}
		if(tipo==0){
		$("#val_tipo" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe seleccionar el Tipo de Usuario para el Restaurant</div>');
	  return false;
		}
		
			var parametros = {             
		
		"nombre_usuario_restaurant" : nombre_usuario_restaurant,
		"clave" : clave,
		"clave_repite" : clave_repite,
		"restaurant" : restaurant,
		"tipo" : tipo,
							
	};
		
	$.ajax({
		data:  parametros,
		url:   'guardar_usuario.php',
		type:  'post',
		beforeSend: function () {
		// $("#resultado").html("Procesando, espere por favor...");
		  $("#btn_enviar").attr("disabled",true);
		},
		success:  function (response) {
					 showNotification("alert-success", "Datos Guardados  ",'bottom','center',null,null); 
		RefrescaFormUsuario()
		}
		
	});
}

function ValidaPass(pass_repite,pass)
{	

	if(pass!=pass_repite ){
		$("#val_pass" ).html('<div class="alert alert-danger"><strong>Campo con Error:  </strong> Las contrase&ntilde;as no coinciden</div>');
		 $("#btn_enviar").attr("disabled",true);
	  return false;
		}else{
			$("#btn_enviar").attr("disabled",false);
			ValidaFormularioVacio(pass_repite,val_pass);
			ValidaFormularioVacio(pass,val_pass);
			
			}
			
			
}

function RefrescaFormUsuario()
{
	
	
	   $.ajax({
               	url:   'form_usuario.php',
                type:  'post',
                beforeSend: function () {
                       // $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                      $("#Usuario").html(response);
					 
						
						
                }
        });
	
}

