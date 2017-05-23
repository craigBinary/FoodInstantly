function GuardarContrasena(id_usuario)
{
	var clave_actual=$("#clave_actual").val();
	var nueva_clave=$("#nueva_clave").val();
	var verifique_clave=$("#verifique_clave").val();
	
	if(clave_actual=="")
	{
	  $("#val_clave_actual" ).html('<div class="alert alert-danger"> Debe ingresar su contrase&ntilde;a actual</div>');
	  return false;
	  
	}
	else
	{
		$("#val_clave_actual" ).html(null);
	}
	
	if(nueva_clave=="")
	{
	  $("#val_nueva_clave" ).html('<div class="alert alert-danger"> Debe ingresar su nueva contrase&ntilde;a </div>');
	  return false;
	  
	}
	else
	{
		$("#val_nueva_clave" ).html(null);
	}
	
	if(verifique_clave=="")
	{
	  $("#val_verifique_clave" ).html('<div class="alert alert-danger"> Debe ingresar la verificaci&oacute;n de la nueva contrase&ntilde;a </div>');
	  return false;
	  
	}
	else
	{
		$("#val_verifique_clave" ).html(null);
	}
	
	if(verifique_clave!=nueva_clave)
	{
	  $("#val_verifique_clave" ).html('<div class="alert alert-danger"> Las contrase&ntilde;as ingresadas no coinciden </div>');
	  
	  $("#val_nueva_clave" ).html('<div class="alert alert-danger"> Las contrase&ntilde;as ingresadas no coinciden </div>');

	  return false;
	  
	}
	else
	{
		$("#val_verifique_clave" ).html(null);
		$("#val_nueva_clave" ).html(null);
	}
	
	if(nueva_clave.length<6)
	{
	  
	  $("#val_nueva_clave" ).html('<div class="alert alert-danger"> La nueva contrase&ntilde;a debe ser mayor o igual a 6 caracteres  </div>');

	  return false;
	  
	}
	else
	{
		$("#val_nueva_clave" ).html(null);
	}
	
	if(verifique_clave.length<6)
	{
	  
	  $("#val_verifique_clave" ).html('<div class="alert alert-danger"> La nueva contrase&ntilde;a debe ser mayor o igual a 6 caracteres  </div>');

	  return false;
	  
	}
	else
	{
		$("#val_verifique_clave" ).html(null);
	}

	
	var parametros = {
			"id_usuario" : id_usuario,  
			"nueva_clave" : nueva_clave, 
			"clave_actual" : clave_actual,   
	};
	$.ajax({
			data:  parametros,
			url:   'guardar_pass.php',
			type:  'post',
			beforeSend: function () {
		// $("#resultado").html("Procesando, espere por favor...");
		},
		success:  function (response) {
			
			$("#guardar_pass").html(response);	
			
		
		}
			
	});
}

function ValidaRut(Objeto, divrut, divalerta)
{
	var intlargo = Objeto;
    var res="";
	var divcc="rut";

	if (intlargo.length> 0) {
    var crut = Objeto;
    var largo = crut.length;
	
	if ( largo <4 ) {
        document.getElementById(divrut).value="";

                    document.getElementById(divrut).focus();

           
			$("#"+divalerta ).html('<div class="alert alert-danger"><strong>Rut Inv&aacute;lido:  </strong></div>');

           

            return false;

        }

var ex=0;
 
 for ( i=0; i <crut.length ; i++ ) {

            if ( crut.charAt(i) == '-' ) {

                ex=1;

            }

        }
       
       
       
 if(ex==0)
 {
         document.getElementById(divrut).value="";
        document.getElementById(divrut).focus();
		
		$("#"+divalerta ).html('<div class="alert alert-danger"><strong>El rut debe contener guion del digito verificador Ej:1111111-1  </strong></div>');

     
     return false;
     
 }
 
 
    var exxx=0;
   
    for ( i=0; i <crut.length ; i++ ) {

            if ( crut.charAt(i) == '.' ) {
           

                exxx=1;

            }

        }
       
     if(exxx==1)
 {
         document.getElementById(divrut).value="";
        document.getElementById(divrut).focus();
		
		$("#"+divalerta ).html('<div class="alert alert-danger"><strong>El rut debe no debe contener puntos Ej:1111111-1  </strong></div>');


     return false;
     
 }   
       
  var tmpstr="";

        for ( i=0; i <crut.length ; i++ ) {

            if ( crut.charAt(i) != ' ' && crut.charAt(i) != '.' && crut.charAt(i) != '-' ) {

                 tmpstr = tmpstr + crut.charAt(i);

            }

        }   

        var    rut = tmpstr;

            crut=tmpstr;

            largo = crut.length;

            if ( largo> 2 ){

                rut = crut.substring(0, largo - 1);

            }else rut = crut.charAt(0);

 

            var    dv = crut.charAt(largo-1);

                if ( rut == null || dv == null ) return 0;

                var dvr = '0';

            var    suma = 0;

            var    mul = 2;

 

                for (i= rut.length-1 ; i>= 0; i--) {

                    suma = suma + rut.charAt(i) * mul;

                    if (mul == 7) mul = 2;

                    else mul++;

                }

 

                var res = suma % 11;

                if (res==1)

                var dvr = 'k';

                else if (res==0) dvr = '0';

                else {

                var dvi = 11-res;

                 dvr = dvi + ""; }

 

                if ( dvr != dv.toLowerCase() ) {

                    document.getElementById(divrut).value="";

                    document.getElementById(divrut).focus();
					
					$("#"+divalerta ).html('<div class="alert alert-danger"><strong>El Rut Ingresado es Inv&aacute;lido  </strong></div>');


                    return false;       
                     
                }
				if(crut){
					$("#"+divalerta ).html(null);
					}
  					
               

    } 
}

function validarEmail(dato, divemail, div_alerta) 
{
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
  	if (dato.length>0)
  	{
   		if(reg.test(dato) == false) 
		{
	   		document.getElementById(divemail).value="";
			$("#"+div_alerta ).html('<div class="alert alert-danger"><strong>El E-Mail ingresado es inv&aacute;lido  </strong></div>');
      		
      		return false;
   		}
  	}
}


function ValidaFormularioVacio(valor,diverror){
	if(valor!="")
	$("#"+diverror ).html(null);	
}

function ValidaFormularioVacioSelect(valor,diverror){
	if(valor!="0")
	$("#"+diverror ).html(null);	
}

function ValidaFormularioVacioTelefonos(valor,diverror,diverror2)
{
	if(valor!="")
	$("#"+diverror ).html(null);
	$("#"+diverror2 ).html(null);
}


var nav4 = window.Event ? true : false;
function acceptNum(evt){	
// NOTE: Backspace = 8, Enter = 13, '0' = 48, '9' = 57	
var key = nav4 ? evt.which : evt.keyCode;	
return (key <= 13 || key == 45 || (key >= 48 && key <= 57));
}

function validarComillas(evt)
{
	var key = nav4 ? evt.which : evt.keyCode;	
	tecla = String.fromCharCode(key).toLowerCase();
	return  (key <= 13 || (key >= 17 && key <= 20) || key==33 || (key >= 35 && key <= 37) || (key >= 40 && key <= 91) || 	key==93 || key==95 || (key >= 97 && key <= 125) || key==127);
}

function NumerosRut(e)
{
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "1234567890-k";
    especiales = [8, 37, 46,9,39,36,35];
    tecla_especial = false
    for(var i in especiales) 
	{
		if(key == especiales[i])
		{
			tecla_especial = true;
            break;
        }
    }
    if(letras.indexOf(tecla) == -1 && !tecla_especial)
       return false;
	if(tecla=="%" || tecla=="'" || tecla=="#" || tecla=="$")
	return false;
}

function Letras(e)
{
	key = (e.which) ? e.which : e.keyCode	
    tecla = String.fromCharCode(key).toLowerCase();
	//alert(key);
    letras = "abcdefghijklmnñopqrstuvwxyz ";
    especiales = [8, 37, 46,9,39,36,35, 164];
    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if(letras.indexOf(tecla) == -1 && !tecla_especial)
	return false;
	if(tecla=="%" || tecla=="'" || tecla=="#" || tecla=="$")
	return false;
}

function LetrasyNumeros(e)
{
	key = (e.which) ? e.which : e.keyCode
/*	if (key==37)
	return true;*/	  
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "abcdefghijklmnñopqrstuvwxyz0123456789 ";
    especiales = [8, 37, 46, 9, 39, 36, 35];
    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if(letras.indexOf(tecla) == -1 && !tecla_especial)
       return false;
	if(tecla=="%" || tecla=="'" || tecla=="#")
	return false;
}	

function compare_dates(fecha, fecha2)  
  {  
    var xMonth=fecha.substring(3, 5);  
    var xDay=fecha.substring(0, 2);  
    var xYear=fecha.substring(6,10);  
    var yMonth=fecha2.substring(3, 5);  
    var yDay=fecha2.substring(0, 2);  
    var yYear=fecha2.substring(6,10);  
    if (xYear> yYear)  
    {  
        return(true)  
    }  
    else  
    {  
      if (xYear == yYear)  
      {   
        if (xMonth> yMonth)  
        {  
            return(true)  
        }  
        else  
        {   
          if (xMonth == yMonth)  
          {  
            if (xDay> yDay)  
              return(true);  
            else  
              return(false);  
          }  
          else  
            return(false);  
        }  
      }  
      else  
        return(false);  
    }  
}  

