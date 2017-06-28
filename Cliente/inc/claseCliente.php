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
        $consulta="SELECT usuario_cliente,password_cliente from sistema_restaurant.tbl_cliente
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
  $consulta="SELECT usuario_cliente from sistema_restaurant.tbl_cliente where usuario_cliente=?";
  $resultado=$db->prepare($consulta);
  $existe=false;
  if($resultado->execute(array($usuario)) && $resultado->rowCount()>0){
    $existe=true;
  }
  if(!$existe){
    $insert="INSERT into sistema_restaurant.tbl_cliente (id_cliente,nombre_cliente, apellido_cliente,celular, usuario_cliente, mail, password_cliente)
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

$consulta = "select * from sistema_restaurant.tbl_plato";
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

$consulta = "select * from sistema_restaurant.tbl_comuna";
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
      $consulta="SELECT * from sistema_restaurant.tbl_comuna ";
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
      $consulta="SELECT id_restaurant,nombre_restaurant,id_comuna,direccion from sistema_restaurant.tbl_restaurant where estado_restaurant='activo' and id_comuna = :id ";
      $resultado=$db->prepare($consulta);
      //$resultado=$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      $resultado-> bindParam(":id", $id, PDO::PARAM_INT);
      $resultado->execute();
      $devolver .= '<option value="0" default selected> Seleccione Restaurant</option>';
      foreach ($resultado as $fila) {

         $devolver .= '<option value= ' . $fila['id_restaurant'] . ' > ' . $fila['nombre_restaurant'] . ', ' . $fila['direccion'] . '</option>';
      }

      $db = null;
      return str_replace("_"," ",$devolver);

}
/*
function listarRestaurant(){

$db = conecta();

$consulta = "select * from sistema_restaurant.tbl_restaurant";
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
  
} 

function listarTipoPlato(){
  $db = conecta();
try {
$consulta = "select * from sistema_restaurant.tbl_tipo_plato";
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
          <a class="tipo_plato" id="'.$row['nombre_tipo'].'" href="productos.php">'.$row['nombre_tipo'].'</a></div>';
    }
  $db = null;
} */


function listarTipoPlato($id_restaurant){
  $db = conecta();
try {
$consulta = "SELECT DISTINCT tp.id_tipo_plato,tp.nombre_tipo FROM sistema_restaurant.tbl_plato p, sistema_restaurant.tbl_restaurant r, sistema_restaurant.tbl_tipo_plato tp WHERE p.id_restaurant=:id_restaurant and p.id_tipo_plato=tp.id_tipo_plato ";
$resultado= $db->prepare($consulta);
$resultado->execute(array(":id_restaurant"=>$id_restaurant));
$id_tipo="";
  $rows = $resultado->fetchAll(PDO::FETCH_ASSOC);
  } catch(PDOException $ex) {
          echo "Ocurrió un error<br>";
          echo $ex->getMessage();
          exit;
            }
   foreach ($rows as $row) {
    $id_tipo=$row['id_tipo_plato'];
    echo '
          <li><a href="productos.php?id_restaurant='.$id_restaurant.'&id_tipo='.$id_tipo.'" onclick="">'.$row['nombre_tipo'].'</a></li>';
    }
  $db = null;
}

function listarPlatos($id_restaurant){

  $db = conecta();

  $consulta = "SELECT r.id_restaurant,tp.*, p.* from sistema_restaurant.tbl_restaurant r,sistema_restaurant.tbl_plato p,sistema_restaurant.tbl_tipo_plato tp where p.id_restaurant=:id_restaurant and r.id_restaurant=p.id_restaurant and p.estado_plato = 1
  and p.id_tipo_plato=tp.id_tipo_plato ORDER BY p.precio ASC ";
  $resultado= $db->prepare($consulta);
    
  if($resultado->execute(array(":id_restaurant"=>$id_restaurant)) && $resultado->rowCount()>0){
    $rows = $resultado->fetchAll(PDO::FETCH_ASSOC);
    $count=0;
    foreach ($rows as $row) {
    echo '<div class="col-xs-6 col-sm-3 product-grids"> ';
     echo   '<div class="flip-container">';
     echo     '<div class="flipper agile-products">';  
     echo       '<div class="front"> ';
     echo         '<img src="images/g1.jpg" class="img-responsive" alt="img"> ';
              if($count%2==0){
                echo '<div class="agile-product-text"> '; 
              }else{
                echo '<div class="agile-product-text agile-product-text2 "> ';
              }                
              echo "<h5>".$row['nombre_plato']."</h5>";  
            echo "</div>
                </div> "; 
            echo  '<div class="back">';
            echo  "<h4>".$row['nombre_plato']."</h4>";            
            echo  "<p>"."Tiempo de preparacion:"." ".$row['tiempo_preparacion']." min."."</p>";
            echo  "<h6><sup>$</sup>".$row['precio']."</h6>";
            echo    '<form action="#" method="post" name="form_platos" onSubmit="return false">
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
          </div>';
      $count=$count+1;
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

function listarPlatos2($id_restaurant,$id_tipo){

  $db = conecta();
  
  
    $consulta = "SELECT r.id_restaurant,tp.*, p.* from sistema_restaurant.tbl_restaurant r,sistema_restaurant.tbl_plato p,sistema_restaurant.tbl_tipo_plato tp where p.id_restaurant=:id_restaurant and r.id_restaurant=p.id_restaurant and p.estado_plato = 1
      and p.id_tipo_plato=tp.id_tipo_plato and p.id_tipo_plato=:id_tipo ORDER BY p.precio ASC";
   
  $resultado= $db->prepare($consulta);
   
    if($resultado->execute(array(":id_restaurant"=>$id_restaurant,":id_tipo"=>$id_tipo)) && $resultado->rowCount()>0){
    $rows = $resultado->fetchAll(PDO::FETCH_ASSOC);
    $count=0;
    foreach ($rows as $row) {
    echo '<div class="col-xs-6 col-sm-3 product-grids"> ';
     echo   '<div class="flip-container">';
     echo     '<div class="flipper agile-products">';  
     echo       '<div class="front"> ';
     echo         '<img src="images/g1.jpg" class="img-responsive" alt="img"> ';
              if($count%2==0){
                echo '<div class="agile-product-text"> '; 
              }else{
                echo '<div class="agile-product-text agile-product-text2 "> ';
              }                
              echo "<h5>".$row['nombre_plato']."</h5>";  
            echo "</div>
                </div> "; 
            echo  '<div class="back">';
            echo  "<h4>".$row['nombre_plato']."</h4>";            
            echo  "<p>"."Tiempo de preparacion:"." ".$row['tiempo_preparacion']." min."."</p>";
            echo  "<h6><sup>$</sup>".$row['precio']."</h6>";
            echo    '<form action="#" method="post" name="form_platos" onSubmit="">
                    <input type="hidden" name="id_restaurant" id="id_restaurant" value="'.$row['id_restaurant'].'" > 
                    <input type="hidden" name="id_plato" id="id_plato" value="'.$row['id_plato'].'" > 
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="add" value="1"> 
                    <input type="hidden" name="w3ls_item" value="'.$row['nombre_plato'].'"> 
                    <input type="hidden" name="amount" value="'.$row['precio'].'"> 
                    <button type="submit" class="w3ls-cart pw3ls-cart"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> Agregar</button>
                    <span class="w3-agile-line"> </span>                    
                    <a class="buscame" id="'.$row['id_plato'].'" href="" data-toggle="modal" data-target="#myModal1">Más</a> 
                  </form>
                </div>
              </div>
            </div> 
          </div>';
      $count=$count+1;
    }
    
  }else{
    
     echo '<div class="col-xs-6 col-sm-4 product-grids"> ';
     echo   '<div class="container">';
     echo "<h5>No hay platos </h5>"; 
    echo '</div>
     </div>';

  }

  $db=null;
}
/*
function listarPlatos2(){

  $db = conecta();
  $id_restaurant=intval($_POST['id_restaurant']);
  $id_tipo=intval($_POST['id_tipo']);
  if($id_tipo !=0){
    $consulta = "select r.id_restaurant,tp.*, p.* from sistema_restaurant.tbl_restaurant r,sistema_restaurant.tbl_plato p,sistema_restaurant.tbl_tipo_plato tp where p.id_restaurant=:id_restaurant and r.id_restaurant=p.id_restaurant and p.estado_plato = 1
      and p.id_tipo_plato=tp.id_tipo_plato and p.id_tipo_plato=:id_tipo ORDER BY p.precio ASC";
  }else{
    $consulta = "select r.id_restaurant,tp.*, p.* from sistema_restaurant.tbl_restaurant r,sistema_restaurant.tbl_plato p,sistema_restaurant.tbl_tipo_plato tp where p.id_restaurant=:id_restaurant and r.id_restaurant=p.id_restaurant and p.estado_plato = 1
       and p.id_tipo_plato=tp.id_tipo_plato ORDER BY p.precio ASC";
  }
  
  $resultado= $db->prepare($consulta);
    $resultado-> bindParam(":id_restaurant",$id_restaurant, PDO::PARAM_INT);
    if($id_tipo !=0){
    $resultado-> bindParam(":id_tipo",$id_tipo, PDO::PARAM_INT);
    }
    if($resultado->execute() && $resultado->rowCount()>0){
    $rows = $resultado->fetchAll(PDO::FETCH_ASSOC);
    $count=0;
    foreach ($rows as $row) {
    echo '<div class="col-xs-6 col-sm-3 product-grids"> ';
     echo   '<div class="flip-container">';
     echo     '<div class="flipper agile-products">';  
     echo       '<div class="front"> ';
     echo         '<img src="images/g1.jpg" class="img-responsive" alt="img"> ';
              if($count%2==0){
                echo '<div class="agile-product-text"> '; 
              }else{
                echo '<div class="agile-product-text agile-product-text2 "> ';
              }                
              echo "<h5>".$row['nombre_plato']."</h5>";  
            echo "</div>
                </div> "; 
            echo  '<div class="back">';
            echo  "<h4>".$row['nombre_plato']."</h4>";            
            echo  "<p>"."Tiempo de preparacion:"." ".$row['tiempo_preparacion']." min."."</p>";
            echo  "<h6><sup>$</sup>".$row['precio']."</h6>";
            echo    '<form action="#" method="post" name="form_platos" onSubmit="">
                    <input type="hidden" name="id_restaurant" id="id_restaurant" value="'.$row['id_restaurant'].'" > 
                    <input type="hidden" name="id_plato" id="id_plato" value="'.$row['id_plato'].'" > 
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="add" value="1"> 
                    <input type="hidden" name="w3ls_item" value="'.$row['nombre_plato'].'"> 
                    <input type="hidden" name="amount" value="'.$row['precio'].'"> 
                    <button type="submit" class="w3ls-cart pw3ls-cart"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> Agregar</button>
                    <span class="w3-agile-line"> </span>                    
                    <a class="buscame" id="'.$row['id_plato'].'" href="" data-toggle="modal" data-target="#myModal1">Más</a> 
                  </form>
                </div>
              </div>
            </div> 
          </div>';
      $count=$count+1;
    }
    
  }else{
    
     echo '<div class="col-xs-6 col-sm-4 product-grids"> ';
     echo   '<div class="container">';
     echo "<h5>No hay platos </h5>"; 
    echo '</div>
     </div>';

  }

  $db=null;
} */


function previaRestorant(){

$id_restaurant=intval($_POST['id_restaurant']);
$id_plato=intval($_POST['id']);

$db = conecta();

 $consulta = "SELECT r.id_restaurant, r.nombre_restaurant, r.info_restaurant, r.id_comuna, r.num_contacto, r.email , r.direccion, r.calificacion , c.nombre_comuna, p.nombre_plato, tp.nombre_tipo, p.descripcion_plato   
 from sistema_restaurant.tbl_restaurant r,sistema_restaurant.tbl_comuna c, sistema_restaurant.tbl_plato p, sistema_restaurant.tbl_tipo_plato tp  
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

 $consulta = "SELECT r.id_restaurant, r.nombre_restaurant, r.info_restaurant, r.id_comuna, r.num_contacto, r.email , r.direccion, r.calificacion ,r.mapa, c.nombre_comuna  
 from sistema_restaurant.tbl_restaurant r,sistema_restaurant.tbl_comuna c 
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
      <a><i class="glyphicon glyphicon-map-marker"></i> Ubicación: </a>
      <div class="map"> ';
  echo  ' <iframe src="'.$row['mapa'].'" width="300" align="center" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
  </div>  
  </div> 
  <h3 class="w3ls-title">Evaluación de nuestros clientes</h3> ';

    }
    
  $db=null;
  }else{
  echo "error";

  $db=null;
  }

}

function mostrarDatosPerfil($id_cliente){

$db = conecta();

  $consulta = "SELECT * from sistema_restaurant.tbl_cliente
  where id_cliente=:id_cliente ";
  $resultado= $db->prepare($consulta);
  if($resultado->execute(array(":id_cliente"=>$id_cliente)) && $resultado->rowCount()>0){
    $rows = $resultado->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
      echo '
      <div class="login-page about">
    <div class="container">
      <h3 class="w3ls-title w3ls-title1">Editar Datos Perfil</h3>
      <div class="login-agileinfo">
        <form action="validaUpdPerfil.php" method="post">
          <input type="hidden" name="id_cliente" value="'.$id_cliente.'">
          <input class="agile-ltext" type="text" name="nombre" placeholder="Nombre" required="" value="'.$row['nombre_cliente'].'">
              <input class="agile-ltext" type="text" name="apellido" placeholder="Apellido" required="" value="'.$row['apellido_cliente'].'">
              <input class="agile-ltext" type="text" name="celular" placeholder="Celular" required="" value="'.$row['celular'].'">              
              <input class="agile-ltext" type="email" name="mail" placeholder="Correo electrónico" required="" value="'.$row['mail'].'">
              <input type="submit" value="Editar" name="editarDatos">
        </form>       
      </div>
      </div>
    </div> ';
    }
    return true;
    $db=null;
    }else{
      echo "error";
      $db=null;
      return false;
     $db=null;
  }
}  

function updDatosCliente($id_cliente,$nombreUsuario,$apellidoUsuario,$celular,$mail){

$db = conecta();
$update="UPDATE sistema_restaurant.tbl_cliente SET nombre_cliente=:nombreUsuario, apellido_cliente=:apellidoUsuario ,celular=:celular ,mail=:mail WHERE id_cliente=:id_cliente ";
 $resultado = $db->prepare($update);
 if ($resultado->execute(array(":id_cliente" => $id_cliente,":nombreUsuario" => $nombreUsuario,
     ":apellidoUsuario" => $apellidoUsuario,":celular" => $celular, ":mail" => $mail))){
  
       $db = null;
        return true;
    } else {
      
       $db = null;
        return false;

  }
    $db = null;
}

function mostrarPedidos($id_cliente){

$db = conecta();
$consulta = "SELECT s.fecha_hora, s.id_solicitud,r.nombre_restaurant,r.id_restaurant,r.direccion, s.estado_solicitud from sistema_restaurant.tbl_solicitud s, sistema_restaurant.tbl_restaurant r
  where s.id_cliente=:id_cliente and s.id_restaurant=r.id_restaurant";
 $resultado= $db->prepare($consulta);
  if($resultado->execute(array(":id_cliente"=>$id_cliente)) && $resultado->rowCount()>0){
    $rows = $resultado->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
      $fechaSolicitud=$row['fecha_hora'];
      $id_solicitud=$row['id_solicitud'];
      $id_restaurant=$row['id_restaurant'];
      $nombre_restaurant=$row['nombre_restaurant'];
      $direccion=$row['direccion'];
      $estado_solicitud=$row['estado_solicitud'];
      $consulta2="SELECT MAX(p.tiempo_preparacion)as tiempo_maximo from sistema_restaurant.tbl_detalle_solicitud ds, sistema_restaurant.tbl_solicitud s, sistema_restaurant.tbl_plato p where s.id_restaurant=$id_restaurant and ds.id_solicitud=s.id_solicitud and p.id_plato=ds.id_plato and s.estado_solicitud='pagado' and s.id_solicitud=$id_solicitud";
      $resultado2= $db->prepare($consulta2);
      $resultado2->execute();
      $rows2 = $resultado2->fetchAll(PDO::FETCH_ASSOC);
      foreach ($rows2 as $row2) {
      // H:i:s
        $tiempo_maximo=$row2['tiempo_maximo'];   
            $hora=$row['fecha_hora'];
          $bb = explode("+", $hora);//separa la hora de las fechas
                   $aa = explode(" ", $bb[0]);
                    $hora2=$aa[1] ;//hora
                      $cc = explode(":", $hora2);//separa el signo :
                 $horaF=$cc[0] ;//hora
                   $minuto=$cc[1] ;//minutos
                   $minutoF=$minuto+$tiempo_maximo;//minutos de la hora de ingreso + minutos totales de los platos
          
            if($minutoF>60){
              $minutoF=$minutoF-60;
               $horaFinal= $horaF+1 .':'.$minutoF;
              if($minutoF<10){
                $minutoF="0".$minutoF;
                 $horaFinal= $horaF+1 .':'.$minutoF;
                }             
              }else{
                 $horaFinal=$horaF.':'.$minutoF;
                }
                $horaFinalC="";
                 if($horaF>=12){ $horaFinalC=$horaFinal." PM";}else{$horaFinalC=$horaFinal." AM";} 
      echo '
       <a href="#" class="accordion-titulo" id="'.$id_solicitud.'" >Fecha: '.date('d-m-Y H:i' ,strtotime($fechaSolicitud)).'~ '.$nombre_restaurant.','.$direccion.'~ Hora de entrega '.$horaFinalC.'~ Estado:'.$estado_solicitud.' <span class="toggle-icon"></span></a>
        <div class="accordion-content">
         
        </div> ';
       
      }
    }
     return true;
     $db=null;
   }else{
    echo "<script languaje='javascript'>alert('Error');</script>";
     echo '<div class="col-xs-6 col-sm-4 product-grids"> ';
     echo   '<div class="container">';
     echo "<h5>No hay pedidos </h5>"; 
    echo '</div>
     </div>';

   }   
   $db=null;
}

function mostrarTablaPedidos(){
$db = conecta();
$id_solicitud=intval($_POST['id_solicitud']);
$consulta = "SELECT DISTINCT ds.cantidad,r.id_restaurant,r.nombre_restaurant, p.nombre_plato,p.precio,s.total_cuenta, c.id_cliente from sistema_restaurant.tbl_solicitud s, sistema_restaurant.tbl_restaurant r, sistema_restaurant.tbl_plato p, sistema_restaurant.tbl_detalle_solicitud ds, sistema_restaurant.tbl_cliente c
  where s.id_solicitud=:id_solicitud and s.id_solicitud=ds.id_solicitud and ds.id_plato=p.id_plato and r.id_restaurant=s.id_restaurant and s.id_cliente=c.id_cliente";
$resultado= $db->prepare($consulta);
$resultado-> bindParam(":id_solicitud", $id_solicitud, PDO::PARAM_INT);
  $resultado->execute();
    $rows = $resultado->fetchAll(PDO::FETCH_ASSOC);
   
    echo'
         <p>* Si tu pedido tiene diferentes platos podría tener un retraso de 5 a 10 minutos</p></br>
         <h3 align="center">Detalle del pedido</h3>
          <div class="table-responsive">
             <table class="table table-bordered table-inverse">
                <tr class="bg-primary">
              <td align="center">Cantidad</td>
              <td align="center">Plato</td>
              <td align="center">Precio(c/u)</td>               
              </tr>'; 
    foreach ($rows as $row2) {
      $total=$row2['total_cuenta'];
      $id_restaurant=$row2['id_restaurant'];
      $nombre_restaurant=$row2['nombre_restaurant'];

       echo ' <tr class="bg-danger">
                <td> '.$row2['cantidad'].'</td>
                <td> '.$row2['nombre_plato'].' </td>
                <td align="right">$ '.$row2['precio'].' </td>
              </tr> ';
                               
    } 
   // $consultaValoracion="SELECT * from sistema_restaurant.tbl_calificación_restorant ";
          echo' <tr class="bg-primary">
                  <th align="center" >TOTAL</th>
                  <td align="center"><a class="comentar" href="evaluarRestaurant.php?id_restaurant='.$id_restaurant.'&nombre_restaurant='.$nombre_restaurant.'" data-toggle="modal">Evaluar Restaurant</a></td>
                  <td align="right">$ '.$total.'</td>                
                </tr>
             </table>
          </div> ';
  $db = null;  
  
} 

 function insertOpinion($id_cliente,$id_restaurant,$comentario,$estrellas){

$db = conecta();

$insert="INSERT into sistema_restaurant.tbl_calificacion_restorant(comentario,estrellas,id_cliente,id_restaurant)
    values(:comentario,:estrellas,:id_cliente,:id_restaurant)";
$resultado= $db->prepare($insert);
 if ($resultado->execute(array(":comentario" => $comentario,
     ":estrellas" => $estrellas,":id_cliente" => $id_cliente, ":id_restaurant" => $id_restaurant))){

       $db = null;
        return true;
    } else {
      
       $db = null;
        return false;

    }
$db = null;


}

function mostrarComentarios($id_restaurant){

  $db = conecta();

  $consulta="SELECT cr.comentario,cr.estrellas,cr.fecha_calificacion,c.nombre_cliente,c.apellido_cliente from sistema_restaurant.tbl_calificacion_restorant cr,sistema_restaurant.tbl_cliente c
   where cr.id_restaurant=:id_restaurant and cr.id_cliente=c.id_cliente";
  $resultado= $db->prepare($consulta);
  if($resultado->execute(array(":id_restaurant"=>$id_restaurant)) && $resultado->rowCount()>0){

      $rows = $resultado->fetchAll(PDO::FETCH_ASSOC);
      foreach ($rows as $row) {
  echo '<a class="item g1"><p align="center">'.$row['nombre_cliente'].' '.$row['apellido_cliente'].'  ('.date('d-m-Y' ,strtotime($row['fecha_calificacion'])).')</p>';
          $estrellas= $row['estrellas'];
          $resto= (5 - $estrellas);

    echo  ' <div class="col-md-8 col-xs-8  modal_body_right single-top-right">
            <div class="single-rating">
              <ul>';
          echo   ' <li class="rating">'.'<p align="left">Calificación:</p>'.'</li>';
              for($i=1;$i<=$estrellas;$i++){
        echo     '<li><i class="fa fa-star-o" aria-hidden="true"></i></li>';
              }
              for($j=1;$j<=$resto;$j++){
         echo   '<li class="w3act"><i class="fa fa-star-o" aria-hidden="true"></i></li>';
              }  
      echo  '         
             <br></br><p align="center">'.$row['comentario'].'</p></ul> 
            </div></div>';  
      echo '    
            </a>
         ';      

       
      } 
      
      $db = null;
        
  } else {
    echo "<script languaje='javascript'>alert('Error');</script>";
     $db = null;
      return false;  
  }       
}





//fin clase
}

?>
