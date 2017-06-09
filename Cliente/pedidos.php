<?php
include('inc/conecta.php');

 extract($_POST,EXTR_PREFIX_SAME,"hacerPedido");

//$quantity -> cantidad de platos
//$w3ls_item -> nombre del plato
//$amount -> precio del plato 
//$total -> monto total a pagar
//$cantidad_platos -> cantidad total de platos
 
  $total= 0;
  $cantidad_platos = 0;
 $nombre_plato = array();
for($j=1; $j <= count($w3ls_item); $j++){
	echo $quantity[$j];
	echo $w3ls_item[$j];
	echo $amount[$j];
	$cantidad_platos +=  $quantity[$j];
	$total += ($quantity[$j] * $amount[$j]);
	echo "<br>";

 		//array_push($nombre_plato, $w3ls_item[$j]) ;
 	}
 	echo $total;
 	echo "<br>";
 	echo $cantidad_platos;

 	 $db = conecta();

 	$insert = "INSERT INTO bd_restorant.tbl_solicitud (id_cliente,id_restaurant, total_cuenta, cantidad, estado_solicitud) VALUES
 	 (:id_cliente, :id_restaurant, :total, :cantidad_platos, 'pagado') ";

 	$resultado=$db->prepare($insert);
 	if($resultado->execute(array(":id_cliente"=>$id_cliente,":id_restaurant"=>$id_restaurant,":total"=>$total,":cantidad_platos"=>$cantidad_platos)) && $resultado->rowCount()>0){
 		$db = null;
        return true;
 	}else{
 		return false;
 	}	
?>