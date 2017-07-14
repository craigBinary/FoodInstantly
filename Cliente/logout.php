<?php

session_start();

if(empty($_SESSION['id_cliente'])){
    echo "ERROR:: Usted no se ha logeado ";
}else{
    
    session_destroy();
     echo "<script languaje='javascript'>window.location.href='login.php' </script>";
}
?>
