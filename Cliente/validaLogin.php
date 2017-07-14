<?php
    session_start();
	include ('inc/claseCliente.php');
    
	$obj=new claseCliente();
    
    if(isset($_POST['entrar'])){
    if(!empty($_POST['username']) && !empty($_POST['password'])){
		$pass=$_POST['password'];
		$pass= md5($pass);
        
        if($obj->validaLoginCliente($_POST['username'],$pass)){
            $_SESSION['username']=$_POST['username'];
            $_SESSION['contraseña']=$_POST['password'];
            $SESSION['entro']=true;
			header('Location: index.php');
           //   echo"<script>    window.location.href='index.php';</script>";
                 
    		}else{
                $SESSION['entro']=false;
    		echo"<script>
    		alert('Error en usuario y/o contraseña');
    		window.location.href='login.php';
    		</script>";

    		}
	  }
    }
?>
