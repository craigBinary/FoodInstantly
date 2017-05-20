<?php

	include ('inc/claseCliente.php');
    //session_start();
	$obj=new claseCliente();

    if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['entrar'])){
		$pass=$_POST['password'];
		$pass= md5($pass);
        if($ob->validaLoginCliente($_POST['username'],$pass)){
            $_SESSION['usuario']=$_POST['username'];
            $_SESSION['contraseña']=$_POST['password'];
			      header('Location: index.html');

    		}else{
    		echo"<script>
    		alert('Error en usuario y/o contraseña');
    		window.location.href='index.html';
    		</script>";

    		}
	  }

?>
