<?php

include('inc/conecta.php');

try{
	if(isset($_POST['pagar'])){
		if(!empty($_POST['id_restaurant']) && !empty($_POST['id_cliente']) && !empty($_POST['cantidad_platos']) && !empty($_POST['total_pago']) && !empty($_POST['datos'])){
	    $id_restaurant=$_POST['id_restaurant'];
	    $id_cliente=$_POST['id_cliente'];
	    $cantidad_platos=$_POST['cantidad_platos'];
	    $total_pago=$_POST['total_pago'];

		

	 	 $db = conecta();
	 	
	 	 $estado_solicitud='pagado';  
	 	$insert = "insert INTO tbl_solicitud (id_solicitud,id_cliente,id_restaurant,fecha_hora, total_cuenta, cantidad_total, estado_solicitud) VALUES
	 	 (NULL,:id_cliente, :id_restaurant, NULL, :total_pago, :cantidad_platos, :estado_solicitud) ";

	 	$resultado=$db->prepare($insert);
	 	if($resultado->execute(array(":id_cliente"=>$id_cliente,":id_restaurant"=>$id_restaurant,":total_pago"=>$total_pago,":cantidad_platos"=>$cantidad_platos,":estado_solicitud"=>$estado_solicitud)) && $resultado->rowCount()>0 ){
	 		
	        $id_solicitud=$db->lastInsertId();
	         echo "<script languaje='javascript'>alert('Su Solicitud ha sido enviada');</script>";
	 	}else{
	 		return false;
	 	}	

	 	$contiene = unserialize(base64_decode($_POST['datos'])); 	
	 	
	 	foreach ($contiene as $dato){

			$cantidad = $dato["cantidad"];		
			$id_plato = $dato["id_plato"];		
			$precio = $dato["precio"];		

			$insert_detalle = "insert INTO tbl_detalle_solicitud (id_detalle_solicitud, cantidad, precio, id_plato, id_solicitud) VALUES (NULL, :cantidad ,:precio, :id_plato ,:id_solicitud)";
			$resultado_detalle=$db->prepare($insert_detalle);
	 	    if($resultado_detalle->execute(array(":cantidad"=>$cantidad,":id_plato"=>$id_plato,":precio"=>$precio,":id_solicitud"=>$id_solicitud)) && $resultado_detalle->rowCount()>0 ){
	 		
	        echo "se incertó el detalle";
	        
	 	    }else{
	 	    	
	 		echo "guatio insert detalle";
	 	    }	
			
		} 

		echo"<script>	
    		window.location.href='misPedidos.php';
    		</script>";
	  }
	}
 }catch(PDOException $e){
        die('Ups, hay problemas con la solicitud');
        echo"<script>	
    		window.location.href='index.php';
    		</script>";

}	
?>