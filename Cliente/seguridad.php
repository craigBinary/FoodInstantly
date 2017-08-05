<?php
session_start();

if($_SESSION['id_cliente']==false){
    
    header("location:index.php");
    
}



?>