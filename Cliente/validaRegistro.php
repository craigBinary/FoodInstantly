
<?php
include('inc/claseCliente.php');

if(isset($_POST['registrar'])){ // determina si una variable ha sido declarada y su valor no es NULO
 if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['celular']) && !empty($_POST['Username']) && !empty($_POST['password']) && !empty($_POST['checkbox'])){
      $nombreUsuario=$_POST['nombre'];
    	$apellidoUsuario=$_POST['apellido'];
    	$celular=$_POST['celular'];
    	$usuario=$_POST['Username'];
    	$pass=$_POST['password'];
    	$pass2=$_POST['password2'];

      $objeto2 = new claseCliente();
       if ( $_POST['password'] == $_POST['password2']){

    	  $pass= md5($pass);


      /*  $msg="prueba";
        $objeto2->error_log($msg); */
          if($objeto2-> registroUsuario($nombreUsuario,$apellidoUsuario,$celular,$usuario,$pass)){
            header('Location: index.php');
          }

      }
    }
  }
 ?>
