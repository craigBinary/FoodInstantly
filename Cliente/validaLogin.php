<?php

	include ('inc/claseCliente.php');
    //session_start();
	$obj=new claseCliente();
    
    if(isset($_POST['entrar'])){
    if(!empty($_POST['username']) && !empty($_POST['password'])){
		$pass=$_POST['password'];
		$pass= md5($pass);
        
        if($obj->validaLoginCliente($_POST['username'],$pass)){
            $_SESSION['usuario']=$_POST['username'];
            $_SESSION['contraseña']=$_POST['password'];
			      header('Location: index.php');
                 
    		}else{
    		echo"<script>
    		alert('Error en usuario y/o contraseña');
    		window.location.href='login.php';
    		</script>";

    		}
	  }
    }
?>
