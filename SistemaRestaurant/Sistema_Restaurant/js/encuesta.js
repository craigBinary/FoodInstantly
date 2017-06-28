function CargarPaginas(valor)
{ 
	
	if(valor=="" || valor==1)
	{
		var pagina="form_ingreso_restaurant.php";
	}
	
	if(valor==2)
	{
		var pagina="deshabilitar_restaurant.php";
	}
		
	$.ajax({
		
		url:   ''+pagina,
		type:  'post',
		beforeSend: function () {
		// $("#resultado").html("Procesando, espere por favor...");
		
		},
		success:  function (response) {
			
			$("#form-ingreso").html(response);	
			
		
		}
		
	});
}


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

function CerrarSolicitud(id_solicitud,id_cliente)
{
	
		if(!confirm("\u00BFEsta seguro de cerrar esta solicitud?")) 
	{
		return false;
	}
	var parametros = {
			"id_solicitud" : id_solicitud,
			"id_cliente" : id_cliente,

			};
	
	$.ajax({
		    data:  parametros,
			url:   'cerrar_solicitud.php',
			type:  'post',
			beforeSend: function () {
					
				$("#btn_enviar").attr("disabled",true);
			},
			success:  function (response) {
				 RefrescaRestaurantSolicitud();
$("#CargarDetallePedido").html('');				 
				 $("#btn_enviar").attr("disabled",false);
				 showNotification("alert-success", " Solicitud Cerrada  ",'bottom','center',null,null); 
			}
	});
	
	
}
function DeshabilitarRestaurant()
{
	var id_restaurant=$("#id_restaurant").val();
	if(id_restaurant==0){
		$("#val_deshabilitar" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe seleccionar un restaurant</div>');
		revise()
	  return false;
		}	
	
		if(!confirm("\u00BFEsta seguro de deshabilitar este Restaurant?")) 
	{
		return false;
	}
	var parametros = {
			"id_restaurant" : id_restaurant,
			

			};
	
	$.ajax({
		    data:  parametros,
			url:   'eliminar_restaurant.php',
			type:  'post',
			beforeSend: function () {
					
				$("#btn_enviar").attr("disabled",true);
			},
			success:  function (response) {
				 		 RefrescaSelect();
				 $("#btn_enviar").attr("disabled",false);
				 showNotification("alert-success", " Restaurant Deshabilitado ",'bottom','center',null,null); 
			}
	});
	
	
}
function HabilitarRestaurant()
{
	var id_restaurant_des=$("#id_restaurant_des").val();
	if(id_restaurant_des==0){
		$("#val_habilitar" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe seleccionar un restaurant</div>');
		revise()
	  return false;
		}
	
		if(!confirm("\u00BFEsta seguro de volver a habilitar este Restaurant?")) 
	{
		return false;
	}
	var parametros = {
			"id_restaurant_des" : id_restaurant_des,
			

			};
	
	$.ajax({
		    data:  parametros,
			url:   'habilitar_restaurant.php',
			type:  'post',
			beforeSend: function () {
					
				$("#btn_enviar").attr("disabled",true);
			},
			success:  function (response) {
				 		 RefrescaSelect();
				 $("#btn_enviar").attr("disabled",false);
				 showNotification("alert-success", " Restaurant Habilitado ",'bottom','center',null,null); 
			}
	});
	
	
}
function EditarRestaurant(id_restaurant,valor)
{
	var parametros = {
			"id_restaurant" : id_restaurant,
			"valor" : valor,
			
			};
	
	$.ajax({
		    data:  parametros,
			url:   'editar_restaurant.php',
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
	var oculto_simple=$("#oculto_simple").val();
	var nombre_archivo=$("#nombre_archivo").val();
	
	
	
	if(nombre_plato==""){
		$("#val_valida" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe ingresar un Nombre Para el Plato</div>');
		revise()
	  return false;
		}	
	if(precio==""){
		$("#val_valida" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe ingresar un Precio ($) Para el Plato</div>');
		revise()
	  return false;
		}
		if(tipo==0){
		$("#val_valida" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe Seleccionar un Tipo de Plato</div>');
		revise()
	  return false;
		}
		
		if(tiempo==""){
		$("#val_valida" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe Ingresar el tiempo de preparaci&oacute;n del plato</div>');
		revise()
	  return false;
		}
		if(estado==0){
		$("#val_valida" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe seleccionar el estado del plato</div>');
		revise()
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
		"oculto_simple" : oculto_simple,
		"nombre_archivo" : nombre_archivo

		
							
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
function EliminaUsuario(id_usuario)
{ 
	if(!confirm("\u00BFEsta seguro de eliminar este Usario?")) 
	{
		return false;
	}
	var parametros = {             
		"id_usuario" : id_usuario
				
	};

	$.ajax({
		data:  parametros,
		url:   'eliminar_usuario.php',
		type:  'post',
		beforeSend: function () {
			   // $("#resultado").html("Procesando, espere por favor...");
		},
		success:  function (response) {
			 
		  showNotification("alert-success", "Datos Eliminados  ",'bottom','center',null,null); 
		RefrescaListaUsuario()
		
		
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

function AgregarUsuarioNuevo(id_usuario)
{
	var nuevo_oculto=$("#nuevo_oculto").val();
	var oculto_editar=$("#oculto_editar").val();
	
	var parametros = 
{             
"nuevo_oculto" : nuevo_oculto,
"oculto_editar" : oculto_editar,
"id_usuario" : id_usuario
};
	$.ajax({
			data:  parametros,
			url:   'nuevo_usuario.php',
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
	var oculto_simple=$("#oculto_simple").val();
	var nombre_archivo=$("#nombre_archivo").val();
	var nombre_plato=$("#nombre_plato").val();
	var precio=$("#precio").val();	
	var tipo=$("#tipo").val();	
	var info=$("#info").val();
	var tiempo=$("#tiempo").val();
	var estado=$("#estado").val();
var file=$('input[type=file]').val();
	
	if(nombre_plato==""){
		$("#val_valida" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe ingresar un Nombre Para el Plato</div>');
		revise()
	  return false;
		}	
	if(precio==""){
		$("#val_valida" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe ingresar un Precio Para el Plato</div>');
		revise()
	  return false;
		}
		if(tipo==0){
		$("#val_valida" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe Seleccionar un Tipo de Plato</div>');
		revise()
	  return false;
		}
		
		if(tiempo==""){
		$("#val_valida" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe Ingresar el tiempo de preparaci&oacute;n del plato</div>');
		revise()
	  return false;
		}
		if(estado==0){
		$("#val_valida" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe seleccionar el estado del plato</div>');
		revise()
	  return false;
		}
			var parametros = {             
		"oculto_simple" : oculto_simple,
		"nombre_archivo" : nombre_archivo,
		"nombre_plato" : nombre_plato,
		"precio" : precio,
		"tipo" : tipo,
		"info" : info,
		"tiempo" : tiempo,
		"estado" : estado,
		"file" : file

		
							
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

function IngresarRestaurant(valor)
{
	var oculto_simple=$("#oculto_simple").val();
	var nombre_archivo=$("#nombre_archivo").val();
	var nombre_restaurant=$("#nombre_restaurant").val();
	var direccion=$("#direccion").val();	
	var numero=$("#numero").val();	
	var email=$("#email").val();
	var info=$("#info").val();
	var token=$("#token").val();
	var direccion=$("#direccion").val();
	var nombre_calle=$("#nombre_calle").val();
	var numero_direccion=$("#numero_direccion").val();
	var hora_apertura=$("#hora_apertura").val();
	var hora_cierre=$("#hora_cierre").val();	
	var file=$('input[type=file]').val();
	
	
	if(nombre_restaurant==""){
		$("#val_nombre" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe ingresar un Nombre Para el Restaurant</div>');
		revise()
	  return false;
		}	
	if(direccion==0){
		$("#val_direccion" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe seleccionar la direcci&oacute;n del Restaurant</div>');
		revise()
	  return false;
		}
		if(numero==""){
		$("#val_numero" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe Ingresar un N&uacute;mero de Contacto</div>');
		revise()
	  return false;
		}
		
		if(info==""){
		$("#val_info" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe Ingresar una descripci&oacute;n o Informaci&oacute;n del Restaurant</div>');
		revise()
	  return false;
		}
			if(direccion==0){
		$("#val_sucursal" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe seleccionar la Comuna</div>');
	  return false;
		}
		if(nombre_calle==""){
		$("#val_sucursal" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe Ingresar el nombre de la calle</div>');
	  return false;
		}
		if(numero_direccion==""){
		$("#val_sucursal" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe Ingresar el N&uacute;mero de direcci&oacute;n</div>');
	  return false;
		}
		if(hora_apertura==""){
		$("#val_sucursal" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe Ingresar la hora de Apertura de este Restaurant</div>');
	  return false;
		}
		if(hora_cierre==""){
		$("#val_sucursal" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe Ingresar la hora de Cierre de este Restaurant</div>');
	  return false;
		}
		if(hora_cierre == hora_apertura){
		$("#val_sucursal" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> La hora de cierre y apertura no deben ser iguales</div>');
	  return false;
		}
		if(hora_cierre < hora_apertura){
		$("#val_sucursal" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> La hora de cierre no debe ser menor 	a la hora de apertura</div>');
	  return false;
		}
			var parametros = {             
		
		"nombre_restaurant" : nombre_restaurant,
		"direccion" : direccion,
		"numero" : numero,
		"email" : email,
		"info" : info,
		"valor" : valor,
		"token" : token,
		"direccion" : direccion,
		"nombre_calle" : nombre_calle,
		"numero_direccion" : numero_direccion,
		"hora_apertura" :  hora_apertura,
		"hora_cierre" : hora_cierre,
		"file" : file,
		"oculto_simple" : oculto_simple,
		"nombre_archivo" : nombre_archivo
							
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
					 if(valor==""){
		cancelarIngreso()
		}else{
			$('.modal.in').modal('hide');
			RefrescaRestaurant();
			
			}
		
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
function IngresarUsuario(nuevo_oculto,oculto_editar,id_usuario_editar)
{
	var nombre_usuario_restaurant=$("#nombre_usuario_restaurant").val();
	var clave=$("#clave").val();	
	var clave_repite=$("#clave_repite").val();	
	var restaurant=$("#restaurant").val();
	var tipo=$("#tipo").val();
	var estado=$("#estado").val();
	
	

	if(nombre_usuario_restaurant==""){
		$("#val_nombre" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe ingresar un Nombre de Usuario</div>');
		revise()
	  return false;
		}	
	if(clave==""){
		$("#val_pass" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe Ingresar su contrase&ntilde;a</div>');
		revise()
	  return false;
		}
		if(clave_repite==""){
		$("#val_pass_repite" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe Repetir la  contrase&ntilde;a</div>');
		revise()
	  return false;
		}
		if(clave!=clave_repite){
			$("#val_pass" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> La contrase&ntilde;as no coinciden</div>');
		revise()
	  return false;
			}
		
		if(restaurant==0){
		$("#val_restaurant" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe seleccionar un Restaurant</div>');
		revise()
	  return false;
		}
		if(tipo==0){
		$("#val_tipo" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe seleccionar el Tipo de Usuario para el Restaurant</div>');
		revise()
	  return false;
		}
			if(oculto_editar!=""){
				if(estado==0){
		$("#val_estado" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe seleccionar el Estado de Usuario para el Restaurant</div>');
		revise()
	  return false;
		}
				}
		
			var parametros = {             
		
		"nombre_usuario_restaurant" : nombre_usuario_restaurant,
		"clave" : clave,
		"clave_repite" : clave_repite,
		"restaurant" : restaurant,
		"tipo" : tipo,
		"nuevo_oculto" : nuevo_oculto,
		"oculto_editar" : oculto_editar,
		"estado" : estado,
		"id_usuario_editar" : id_usuario_editar,
									
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
					 if(nuevo_oculto==1){
						  $('.modal.in').modal('hide');
						  RefrescaListaUsuario()
						 }else{
		RefrescaFormUsuario()
		}
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
function RefrescaListaUsuario()
{
	
	
	   $.ajax({
               	url:   'detalle_usuario.php',
                type:  'post',
                beforeSend: function () {
                       // $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                      $("#ListarUsuarios").html(response);
					 
						
						
                }
        });
	
}
function RefrescaListaUsuarioResto()
{
	
	
	   $.ajax({
               	url:   'form_usuario_resto.php',
                type:  'post',
                beforeSend: function () {
                       // $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                      $("#Usuario").html(response);
					 
						
						
                }
        });
	
}
function RefrescaRestaurant()
{
	
	
	   $.ajax({
               	url:   'detalle_restaurant.php',
                type:  'post',
                beforeSend: function () {
                       // $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                      $("#InfoRestaurant").html(response);
					 
						
						
                }
        });
	
}
function VerCalificacion(id_restaurant)
{		
			var parametros = {             
		
		"id_restaurant" : id_restaurant,	
	};
		
	$.ajax({
		data:  parametros,
		url:   'linea_tiempo.php',
		type:  'post',
		beforeSend: function () {
		// $("#resultado").html("Procesando, espere por favor...");
		 
		},
		success:  function (response) {
					
$("#CargarDetalleRestaurant").html(response);
		
		}
		
	});
}

function VerSolicitud(id_solicitud)
{
	
	var parametros = {             
		
		"id_solicitud" : id_solicitud,	
	};
	
	   $.ajax({
		   data:  parametros,
               	url:   'detalle_solicitud.php',
                type:  'post',
                beforeSend: function () {
                       // $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                      $("#CargarDetallePedido").html(response);
					 
						
						
                }
        });
	
}
function EliminarArchivo(token,nombre_archivo,id)
{
	if(!confirm("\u00BFEsta seguro de eliminar esta im\u00e1gen?")) 
	{
		return false;
	}

    var parametros = {             
        "token" : token,
        "nombre_archivo" : nombre_archivo,
		"id" : id       
    };
    
    $.ajax({
        data:  parametros,
        url:   'eliminar_archivo.php',
        type:  'post',
        beforeSend: function () {
               // $("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response)
        {            
            $("#CargaVistaArchivosSimple").html(null);
            $("#oculto_simple").val("");        
        }
    });    
}
function EliminarArchivoRestaurant(token,nombre_archivo,id)
{
	if(!confirm("\u00BFEsta seguro de eliminar esta im\u00e1gen?")) 
	{
		return false;
	}

    var parametros = {             
        "token" : token,
        "nombre_archivo" : nombre_archivo,
		"id" : id       
    };
    
    $.ajax({
        data:  parametros,
        url:   'eliminar_archivo_restaurant.php',
        type:  'post',
        beforeSend: function () {
               // $("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response)
        {            
            $("#CargaVistaArchivosRestaurant").html(null);
            $("#oculto_simple").val("");        
        }
    });    
}
function VerDetallePlato(id_plato)
{
	
	var parametros = {             
		
		"id_plato" : id_plato,	
	};
	
	   $.ajax({
		   data:  parametros,
               	url:   'ver_detalle_plato.php',
                type:  'post',
                beforeSend: function () {
                       // $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                     // $("#CargarDetallePedido").html(response);
					 
						$("#ventana_modal_chica").html(response);	
			$('#smallModal').modal('show');
						
                }
        });
	
}
function RefrescaRestaurantSolicitud()
{
	   $.ajax({
	
               	url:   'tabla_pedido.php',
                type:  'post',
                beforeSend: function () {
                       // $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                      $("#CargarTablaPedido").html(response);
					 
						
						
                }
        });
	
}
function IngresarComuna(token,id_restaurant,id_sucursal)
{
			var parametros = {             
		
		"token" : token,
		"id_sucursal" : id_sucursal,
		"id_restaurant" : id_restaurant
		
	};
	   $.ajax({
				data:  parametros,
               	url:   'add_sucursal.php',
                type:  'post',
                beforeSend: function () {
                       // $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                      $("#Sucursal").html(response);
					 
						
						
                }
        });
	
}
function CancelarSucursal(token,id_restaurant)
{ 
			var parametros = {             
		
		"token" : token,	
		"id_restaurant" : id_restaurant
	};
	   $.ajax({
				data:  parametros,
               	url:   'btn_comuna.php',
                type:  'post',
                beforeSend: function () {
                       // $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                      $("#Sucursal").html(response);
					 
						
						
                }
        });
	
}
function GuardarSucursal(token,id_sucursal,id_restaurant)
{ 

	
			var parametros = {             
		
		"token" : token,
		"id_sucursal" : id_sucursal,
		"id_restaurant" : id_restaurant,
	"direccion" : direccion	,
	"nombre_calle" : nombre_calle,
	"numero_direccion" : numero_direccion,
	"hora_apertura" : hora_apertura,
	"hora_cierre" : hora_cierre	
	};
	   $.ajax({
				data:  parametros,
               	url:   'guardar_sucursal.php',
                type:  'post',
                beforeSend: function () {
                       // $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                     RefrescaTablaComuna(token,id_restaurant);
					 CancelarSucursal(token,id_restaurant);
					 
						
						
                }
        });
	
}
function RefrescaTablaComuna(token,id_restaurant)
{
			var parametros = {             
		
		"token" : token,	
		"id_restaurant" : id_restaurant
	};
	   $.ajax({
				data:  parametros,
               	url:   'sucursal.php',
                type:  'post',
                beforeSend: function () {
                       // $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                      $("#TablaSucursal").html(response);
					 
						
						
                }
        });
	
}
function EditarSucursal(token,id_sucursal,id_restaurant)
{ 

var direccion=$("#direccion").val();
	var nombre_calle=$("#nombre_calle").val();
	var numero_direccion=$("#numero_direccion").val();
	var hora_apertura=$("#hora_apertura").val();
	var hora_cierre=$("#hora_cierre").val();
	
	if(direccion==0){
		$("#val_sucursal" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe seleccionar la Comuna</div>');
	  return false;
		}
		if(nombre_calle==""){
		$("#val_sucursal" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe Ingresar el nombre de la calle</div>');
	  return false;
		}
		if(numero_direccion==""){
		$("#val_sucursal" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe Ingresar el N&uacute;mero de direcci&oacute;n</div>');
	  return false;
		}
			var parametros = {             
		
		"token" : token,
		"id_sucursal" : id_sucursal,
		"id_restaurant" : id_restaurant,
	"direccion" : direccion	,
	"nombre_calle" : nombre_calle,
	"numero_direccion" : numero_direccion,
	"hora_apertura" : hora_apertura,
	"hora_cierre" : hora_cierre
	};
	   $.ajax({
				data:  parametros,
               	url:   'editar_sucursal.php',
                type:  'post',
                beforeSend: function () {
                       // $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                      RefrescaTablaComuna(token,id_restaurant);
					 CancelarSucursal(token,id_restaurant);
					 
						
						
                }
        });
	
}
function EliminandoSucursal(id_sucursal,token,id_restaurant)
{ 
	if(!confirm("\u00BFEsta seguro de eliminar esta direcci\u00f3n?")) 
	{
		return false;
	}
	var parametros = {             
		"id_sucursal" : id_sucursal,
		"token" : token,
		"id_restaurant" : id_restaurant
				
	};

	$.ajax({
		data:  parametros,
		url:   'eliminar_sucursal.php',
		type:  'post',
		beforeSend: function () {
			   // $("#resultado").html("Procesando, espere por favor...");
		},
		success:  function (response) {
			 
		  showNotification("alert-success", "Datos Eliminados  ",'bottom','center',null,null); 
		RefrescaTablaComuna(token,id_restaurant);
		
		
		}});
		
}
function IngresarUsuarioResto()
{
	var nombre_usuario_restaurant=$("#nombre_usuario_restaurant").val();
	var clave=$("#clave").val();	
	var clave_repite=$("#clave_repite").val();	
	var restaurant=$("#restaurant").val();
	var tipo=$("#tipo").val();
	var estado=$("#estado").val();

	if(nombre_usuario_restaurant==""){
		$("#val_nombre" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe ingresar un Nombre de Usuario</div>');
		revise()
	  return false;
		}	
	if(clave==""){
		$("#val_pass" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe Ingresar su contrase&ntilde;a</div>');
		revise()
	  return false;
		}
		if(clave_repite==""){
		$("#val_pass_repite" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe Repetir la  contrase&ntilde;a</div>');
		revise()
	  return false;
		}
		if(clave!=clave_repite){
			$("#val_pass" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> La contrase&ntilde;as no coinciden</div>');
		revise()
	  return false;
			}
		
		if(restaurant==0){
		$("#val_restaurant" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe seleccionar un Restaurant</div>');
		revise()
	  return false;
		}
		
		if(tipo==0){
		$("#val_tipo" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe seleccionar el Tipo de Usuario para el Restaurant</div>');
		revise()
	  return false;
		}
		if(estado==0){
		$("#val_tipo" ).html('<div class="alert alert-danger"><strong>Campo Requerido:  </strong> Debe seleccionar el Estado de Usuario</div>');
		revise()
	  return false;
		}
			
				
			var parametros = {             
		
		"nombre_usuario_restaurant" : nombre_usuario_restaurant,
		"clave" : clave,
		"clave_repite" : clave_repite,
		"restaurant" : restaurant,
		"tipo" : tipo,
		"estado" : estado,
		

							
	};
		
	$.ajax({
		data:  parametros,
		url:   'guardar_usuario_resto.php',
		type:  'post',
		beforeSend: function () {
		// $("#resultado").html("Procesando, espere por favor...");
		  $("#btn_enviar").attr("disabled",true);
		},
		success:  function (response) {
					 showNotification("alert-success", "Datos Guardados  ",'bottom','center',null,null); 
					
						  RefrescaListaUsuarioResto();
						 
		}
	
		
	});
}
function HistorialBusqueda(page_curr)
{
	
	var registros=$("#registros").val();
	
	var usua_cierre=$("#usua_cierre").val();
	var inicio_solicitud=$('#daterange-btnf').data('daterangepicker').startDate.format('YYYY-MM-DD');
	var termino_solicitud=$('#daterange-btnf').data('daterangepicker').endDate.format('YYYY-MM-DD');
    //var inicio_cierre=$('#daterange-btnf2').data('daterangepicker').startDate.format('YYYY-MM-DD');
	//var termino_cierre=$('#daterange-btnf2').data('daterangepicker').endDate.format('YYYY-MM-DD');
	
	
	
	  var parametros = {             
               
				"usua_cierre" : usua_cierre,
				"inicio_solicitud":inicio_solicitud,
				"termino_solicitud":termino_solicitud,
				//"inicio_cierre":inicio_cierre,
				//"termino_cierre":termino_cierre,
				"page_curr":page_curr,
				"registros":registros
				
								
        };
        $.ajax({
                data:  parametros,
                url:   'listado_historial.php',
                type:  'post',
                beforeSend: function () {
                       // $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                     $("#detalle_historial").html(response);
						
						
                }
        });
}
function RefrescaSelect()
{ 	

	$.ajax({
		
		url:   'deshabilitar_restaurant.php',
		type:  'post',
		beforeSend: function () {
			   // $("#resultado").html("Procesando, espere por favor...");
		},
		success:  function (response) {
			 
		$("#form-ingreso").html(response);	
		
		
		}});
		
}
function revise()
{
	showNotification("alert-danger", "Favor revisar y/o completar los datos faltantes ",'top','center',null,null);	
}

