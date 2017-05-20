<?php

include('conecta.php');
/**
 *
 */
class claseCliente{

function error_log($msg){
  $logfile='log/error.log';
  file_put_contents($logfile, $msg. "\n", FILE_APPEND);
}

  function validaLoginCliente($usuario, $pass){
        $db = conecta();
        $consulta="select usuario_cliente,password_cliente from bd_restorant.tbl_cliente
                   where usuario_cliente=:usuario and password_cliente=:pass ";
        $resultado = $db->prepare($consulta);
        if($resultado->execute(array(":usuario_cliente"=>$usuario,":password_cliente"=>$pass)) && $resultado->rowCount()>0){
            return true;
        }else{
            return false;
        }
        $db = null;
    }

function registroUsuario($nombreUsuario,$apellidoUsuario,$celular,$usuario,$pass){

  $db = conecta();
  $consulta="select usuario_cliente from bd_restorant.tbl_cliente where usuario_cliente=?";
  $resultado=$db->prepare($consulta);
  $existe=false;
  if($resultado->execute(array($usuario)) && $resultado->rowCount()>0){
    $existe=true;
  }
  if(!$existe){
    $insert="insert into bd_restorant.tbl_cliente (id_cliente,nombre_cliente, apellido_cliente,celular, usuario_cliente, password_cliente)
    values(NULL,:nombreUsuario,:apellidoUsuario,:celular,:usuario,:pass)";
    $resultado = $db->prepare($insert);
     if ($resultado->execute(array(":nombreUsuario" => $nombreUsuario,
     ":apellidoUsuario" => $apellidoUsuario,":celular" => $celular, ":usuario" => $usuario,":pass" => $pass ))){

       $db = null;
        return true;
    } else {
       echo "<script languaje='javascript'>alert('ERROR:Usuario no se pudo registrar.'); </script>";

       $db = null;
        return false;

    }
  }else{
    echo "<script languaje='javascript'>alert('ERROR: Nombre de usuario ya existe.'; </script>";
    return false;
  }
      $db = null;
}



//fin clase
}


 ?>
