<?php
include('inc/claseCliente.php');

if(isset($_POST['editarDatos'])){ // determina si una variable ha sido declarada y su valor no es NULO
 if(!empty($_POST['id_cliente']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['celular']) && !empty($_POST['mail'])){
      $id_cliente=$_POST['id_cliente'];
      $nombreUsuario=$_POST['nombre'];
    	$apellidoUsuario=$_POST['apellido'];
    	$celular=$_POST['celular'];
      $mail=$_POST['mail'];

      $objeto2 = new claseCliente();
       
          if($objeto2->updDatosCliente($id_cliente,$nombreUsuario,$apellidoUsuario,$celular,$mail)){
           echo "<script languaje='javascript'>alert('Datos actualizados correctamente.');
                    window.location.href='index.php'; </script>";           
          }else{
            echo "<script languaje='javascript'>alert('Hubo un problema.');
                    window.location.href='editarDatos.php'; </script>";

          }

      }
    }
  
 ?>