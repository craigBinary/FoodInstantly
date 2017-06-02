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

/*
function listarPlatos(){

$db = conecta();

$consulta = "select * from bd_restorant.tbl_plato";
$resultado= $db->prepare($consulta);
$array= array();  
if($resultado->execute() && $resultado->rowCount()>0){
  $rows = $resultado->fetchAll(PDO::FETCH_ASSOC);
  foreach ($rows as $row) {
    $array= $row;
    json_encode($array);
  }
return $array;
}else{
  echo "Error";
}
  
} */
/*
function listarComunas(){

$db = conecta();

$consulta = "select * from bd_restorant.tbl_comuna";
$resultado= $db->prepare($consulta);
$array= array();  
if($resultado->execute() && $resultado->rowCount()>0){
  $rows = $resultado->fetchAll(PDO::FETCH_ASSOC);
  foreach ($rows as $row) {
    $array[] = $row;
    
  }
return json_encode($array);
}else{
  echo "Error";
}
  
} */

function listarComunas(){

      $devolver = "";
      $db = conecta();
      $consulta="select * from bd_restorant.tbl_comuna ";
      $resultado=$db->prepare($consulta);
      $resultado->execute();
      $devolver .= '<option value="0" default selected> Seleccione Comuna</option>';
      foreach ($resultado as $fila) {

         $devolver .= '<option value= ' . $fila['id_comuna'] . ' > ' . $fila['nombre_comuna'] . '</option>';
      }

        $db = null;
        return str_replace("_"," ",$devolver);

}

function listarRestaurant(){

      $devolver = "";
      $id = $_POST['id'];
      $db = conecta();
      $consulta="select id_restaurant,nombre_restaurant,id_comuna from bd_restorant.tbl_restaurant where id_comuna = :id ";
      $resultado=$db->prepare($consulta);
      //$resultado=$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      $resultado-> bindParam(":id", $id, PDO::PARAM_INT);
      $resultado->execute();
      $devolver .= '<option value="0" default selected> Seleccione Restaurant</option>';
      foreach ($resultado as $fila) {

         $devolver .= '<option value= ' . $fila['id_restaurant'] . ' > ' . $fila['nombre_restaurant'] . '</option>';
      }

      $db = null;
      return str_replace("_"," ",$devolver);

}
/*
function listarRestaurant(){

$db = conecta();

$consulta = "select * from bd_restorant.tbl_restaurant";
$resultado= $db->prepare($consulta);
$local= array();  
if($resultado->execute() && $resultado->rowCount()>0){
  $rows = $resultado->fetchAll(PDO::FETCH_ASSOC);
  foreach ($rows as $row) {
    $local[] = $row;
   
  }
return json_encode($local);
}else{
  echo "Error";
}
  
} */



function listarTipoPlato(){
  $db = conecta();
try {
$consulta = "select * from bd_restorant.tbl_tipo_plato";
$resultado= $db->prepare($consulta);
$resultado->execute();
  $rows = $resultado->fetchAll(PDO::FETCH_ASSOC);
  } catch(PDOException $ex) {
          echo "Ocurrió un error<br>";
          echo $ex->getMessage();
          exit;
            }
   foreach ($rows as $row) {
    echo '<div class="col-md-4 col-sm-4 col-xs-6 menu-w3lsgrids">
          <a href="products.html">'.$row['nombre_tipo'].'</a></div>';
    }
  $db = null;
}

function listarPlatos(){

  $db = conecta();

  $consulta = "select * from bd_restorant.tbl_plato where id_tipo_plato = 2 and estado_plato = 1 ";
  $resultado= $db->prepare($consulta);
  $array= array();  
  if($resultado->execute() && $resultado->rowCount()>0){
    $rows = $resultado->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
    echo '<div class="col-xs-6 col-sm-6 product-grids"> ';
     echo   '<div class="flip-container flip-container1">';
     echo     '<div class="flipper agile-products">';
     echo       '<div class="front"> ';
     echo         '<img src="images/g1.jpg" class="img-responsive" alt="img"> ';
     echo         '<div class="agile-product-text"> ';             
                   echo "<h5>".$row['nombre_plato']."</h5>";  
            echo "</div>
                </div> "; 
            echo  '<div class="back">';
            echo  "<h4>".$row['nombre_plato']."</h4>";
            echo  "<p>".$row['descripcion_plato']."</p>";
            echo  "<p>"."Tiempo de preparacion:"." ".$row['tiempo_preparacion']."</p>";
            echo  "<h6><sup>$</sup>".$row['precio']."</h6>";
            echo    '<form action="#" method="post">
                    <input type="hidden" name="id_restaurant" id="id_restaurant" value="'.$row['id_restaurant'].'" > 
                    <input type="hidden" name="id_plato" id="id_plato" value="'.$row['id_plato'].'" > 
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="add" value="1"> 
                    <input type="hidden" name="w3ls_item" value="'.$row['nombre_plato'].'"> 
                    <input type="hidden" name="amount" value="'.$row['precio'].'"> 
                    <button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Agregar</button>
                    <span class="w3-agile-line"> </span>
                    <a href="#" data-toggle="modal" data-target="#myModal1">Más</a>
                  </form>
                </div>
              </div>
            </div> 
          </div> ';
      
    }
  
  }else{
    echo "<script languaje='javascript'>alert('Hubo un error');</script>";
  }

  $db=null;
}


//fin clase
}


 ?>
