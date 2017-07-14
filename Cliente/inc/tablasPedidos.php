
<?php

session_start();

include('claseCliente.php');
$obj = new claseCliente();
 echo $obj->mostrarTablaPedidos();

 ?>

