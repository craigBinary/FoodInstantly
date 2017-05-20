
function soloNumeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "0123456789";
    especiales = "8-37-39-46";
    tecla_especial = false;
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }
    if(letras.indexOf(tecla)==-1 &amp;&amp; !tecla_especial){
        return false;
    }
}

function validarClave() {
		var p1 = document.getElementById("password").value;
		var p2 = document.getElementById("password2").value;

		  if (p1.length == 0 || p2.length == 0 ) {
		  alert("Primero debe ingresar la contraseña y confirmar");
		  return false;
		}
		if (p1 != p2) {
	  alert("La contraseña debe coincidir");
	  console.log("Entre");
    return false;

		}
	}
