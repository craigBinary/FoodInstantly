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
        if($resultado->execute(array(":usuario"=>$usuario,":pass"=>$pass)) && $resultado->rowCount()>0){
            return true;
        }else{
            return false;
        }
        $db = null;
    }

function registroUsuario($nombreUsuario,$apellidoUsuario,$celular,$usuario,$mail,$pass){

  $db = conecta();
  $consulta="select usuario_cliente from bd_restorant.tbl_cliente where usuario_cliente=?";
  $resultado=$db->prepare($consulta);
  $existe=false;
  if($resultado->execute(array($usuario)) && $resultado->rowCount()>0){
    $existe=true;
  }
  if(!$existe){
    $insert="insert into bd_restorant.tbl_cliente (id_cliente,nombre_cliente, apellido_cliente,celular, usuario_cliente, mail, password_cliente)
    values(NULL,:nombreUsuario,:apellidoUsuario,:celular,:usuario,:mail,:pass)";
    $resultado = $db->prepare($insert);
     if ($resultado->execute(array(":nombreUsuario" => $nombreUsuario,
     ":apellidoUsuario" => $apellidoUsuario,":celular" => $celular, ":usuario" => $usuario,":mail" => $mail, ":pass" => $pass ))){

       $db = null;
        return true;
    } else {
       echo "<script languaje='javascript'>alert('ERROR:Usuario no se pudo registrar.'); </script>";
       echo " header('Location: singup.php'); ";
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
          <a href="productos.php">'.$row['nombre_tipo'].'</a></div>';
    }
  $db = null;
}

function listarPlatos($id_restaurant){

  $db = conecta();

  $consulta = "select r.id_restaurant,tp.*, p.* from bd_restorant.tbl_restaurant r,bd_restorant.tbl_plato p,bd_restorant.tbl_tipo_plato tp where p.id_restaurant=:id_restaurant and r.id_restaurant=p.id_restaurant and p.estado_plato = 1
  and p.id_tipo_plato=tp.id_tipo_plato ";
  $resultado= $db->prepare($consulta);
    
  if($resultado->execute(array(":id_restaurant"=>$id_restaurant)) && $resultado->rowCount()>0){
    $rows = $resultado->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
    echo '<div class="col-xs-6 col-sm-4 product-grids"> ';
     echo   '<div class="flip-container">';
     echo     '<div class="flipper agile-products">';
     echo       '<div class="front"> ';
     echo         '<img src="images/g1.jpg" class="img-responsive" alt="img"> ';
     echo         '<div class="agile-product-text"> ';             
                   echo "<h5>".$row['nombre_plato']."</h5>";  
            echo "</div>
                </div> "; 
            echo  '<div class="back">';
            echo  "<h4>".$row['nombre_plato']."</h4>";            
            echo  "<p>"."Tiempo de preparacion:"." ".$row['tiempo_preparacion']."</p>";
            echo  "<h6><sup>$</sup>".$row['precio']."</h6>";
            echo    '<form action="#" method="post" name="form_platos">
                    <input type="hidden" name="id_restaurant" id="id_restaurant" value="'.$row['id_restaurant'].'" > 
                    <input type="hidden" name="id_plato" id="id_plato" value="'.$row['id_plato'].'" > 
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="add" value="1"> 
                    <input type="hidden" name="w3ls_item" value="'.$row['nombre_plato'].'"> 
                    <input type="hidden" name="amount" value="'.$row['precio'].'"> 
                    <button type="submit" class="w3ls-cart pw3ls-cart"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> Agregar</button>
                    <span class="w3-agile-line"> </span>                    
                    <a class="buscame" id="'.$row['id_plato'].'" href="#" data-toggle="modal" data-target="#myModal1">Más</a> 
                  </form>
                </div>
              </div>
            </div> 
          </div> ';
      
    }
  
  }else{
    echo "<script languaje='javascript'>alert('Error');</script>";
     echo '<div class="col-xs-6 col-sm-4 product-grids"> ';
     echo   '<div class="container">';
     echo "<h5>No hay platos </h5>"; 
    echo '</div>
     </div>';
  }

  $db=null;
}

//falta id de plato
function previaRestorant(){

$id_restaurant=intval($_POST['id_restaurant']);
$id_plato=intval($_POST['id']);

$db = conecta();

 $consulta = "select r.id_restaurant, r.nombre_restaurant, r.info_restaurant, r.id_comuna, r.num_contacto, r.email , r.direccion, r.calificacion , c.nombre_comuna, p.nombre_plato, tp.nombre_tipo, p.descripcion_plato   
 from bd_restorant.tbl_restaurant r,bd_restorant.tbl_comuna c, bd_restorant.tbl_plato p, bd_restorant.tbl_tipo_plato tp  
 where r.id_comuna=c.id_comuna and r.id_restaurant=p.id_restaurant and p.id_tipo_plato=tp.id_tipo_plato and r.id_restaurant =:id_restaurant and p.id_plato=:id_plato";
  $resultado= $db->prepare($consulta);
  //$array= array();  
  $resultado-> bindParam(":id_restaurant",$id_restaurant, PDO::PARAM_INT);
  $resultado->bindParam(":id_plato", $id_plato, PDO::PARAM_INT);
  $resultado->execute();
    $rows = $resultado->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
    
       echo ' <div class="col-md-5 modal_body_left">
              <img src="images/s1.jpg" alt=" " class="img-responsive">
            </div>
            <div class="col-md-7 modal_body_right single-top-right"> ';
     echo     '<h3 class="item_name">'.$row['nombre_restaurant'].'</h3>';
     echo     "<p>"."dirección:"." ".$row['direccion'].",".$row['nombre_comuna']."."."</p> ";
              $estrellas= $row['calificacion'];
              $resto= (5 - $estrellas);
      echo    '<div class="single-rating">
                <ul>';
                for($i=1;$i<=$estrellas;$i++){
          echo     '<li><i class="fa fa-star-o" aria-hidden="true"></i></li>';
                }
                for($j=1;$j<=$resto;$j++){
           echo   '<li class="w3act"><i class="fa fa-star-o" aria-hidden="true"></i></li>';
                }  
        echo  '         
                </ul> 
              </div>
              <div class="single-price"> ';
        echo   '<p class="single-price-text">'.'Tipo plato:'.' '.$row['nombre_tipo']. '</p>';
        echo   ' </div> ';
      echo   '<p class="single-price-text">'.'Descripción:'.' '.$row['descripcion_plato']. '</p>';
      echo    '<form action="perfilRestaurant.php" method="post">
                <input type="hidden" name="restaurant" id="restaurant" value="'.$row['nombre_comuna'].'" />
                <input type="hidden" name="id_restaurant" id="id_restaurant" value="'.$row['id_restaurant'].'" />
                
                <button type="submit" class="w3ls-cart" ><i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i> Ver Restaurant</button>
              </form> ';
             
      echo   '</div> 
            <div class="clearfix"> </div>';
          


    }
  
 
  $db=null;
}

function mostrarRestorant($id_restaurant){

$db = conecta();

 $consulta = "select r.id_restaurant, r.nombre_restaurant, r.info_restaurant, r.id_comuna, r.num_contacto, r.email , r.direccion, r.calificacion ,r.mapa, c.nombre_comuna  
 from bd_restorant.tbl_restaurant r,bd_restorant.tbl_comuna c 
 where r.id_comuna=c.id_comuna and r.id_restaurant =:id_restaurant ";
  $resultado= $db->prepare($consulta);
 
   if($resultado->execute(array(":id_restaurant"=>$id_restaurant)) && $resultado->rowCount()>0){
    $rows = $resultado->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {

      echo ' 
      <h1>&nbsp;</h1>
        <div class="container">
        <div class="row">
          <div class="modal-body">
            <div class="col-md-3 modal_body_left">
              <img src="images/s1.jpg" alt=" " class="img-responsive">
            </div>
            <div class="col-md-7 modal_body_right single-top-right"> ';
     echo     '<h3 class="item_name">'.$row['nombre_restaurant'].'</h3>';
     echo     "<p>"."dirección:"." ".$row['direccion'].",".$row['nombre_comuna']."."."</p> ";
              $estrellas= $row['calificacion'];
              $resto= (5 - $estrellas);
          
      echo    '<div class="single-rating">
                <ul>';
            echo   ' <li class="rating">'.'Calificación:'.'</li>';
                for($i=1;$i<=$estrellas;$i++){
          echo     '<li><i class="fa fa-star-o" aria-hidden="true"></i></li>';
                }
                for($j=1;$j<=$resto;$j++){
           echo   '<li class="w3act"><i class="fa fa-star-o" aria-hidden="true"></i></li>';
                }  
        echo  '         
                </ul> 
                <ul>';
         echo   ' <li class="rating">'.'Telefono:'.' '.$row['num_contacto'].'</li>';
         echo   '</ul>';
         echo   '<ul>';
       echo '  <li class="rating">'.'Mail:'.' '.$row['email'].'</li>';
         echo  '</ul>
              </div> ';
        echo  '<div class="single-price"> ';
        echo   '<p class="single-price-text">'.'Descripción:'.' '.$row['info_restaurant']. '</p>';
        echo   ' </div>
                </div> 
            
          </div>
          </div>
          </div> 
          <div id="contact" class="contact cd-section">
      <div class="container">
      <p>Ubicación: </p>
      <div class="map"> ';
  echo  ' <iframe src="'.$row['mapa'].'" width="600" align="center" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
  </div>  
  </div>  ';

    }
    
  }else{
echo "error";

  }

}

//fin clase
}


 ?>
