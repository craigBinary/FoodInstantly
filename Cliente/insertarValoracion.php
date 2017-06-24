<?php

if(isset($_POST['valorar'])){
	if(!empty($_POST['id_cliente']) && !empty($_POST['id_restaurant']) && !empty($_POST['opinion']) && !empty($_POST['estrellas'])){
		include ('inc/claseCliente.php'); 
		$id_cliente=$_POST['id_cliente'];
        $id_restaurant=$_POST['id_restaurant'];
    	$comentario=$_POST['opinion'];
    	$estrellas=$_POST['estrellas'];

		$obj= new claseCliente();
		if($obj->insertOpinion($id_cliente,$id_restaurant,$comentario,$estrellas)){
			echo"<script>
    		alert('Muchas gracias por su opinión');
    		window.location.href='misPedidos.php';
    		</script>";

		}else{
			echo"<script>
    		alert('Error,Por favor intentelo más tarde');
    		window.location.href='misPedidos.php';
    		</script>";
		}
	}
}
?>