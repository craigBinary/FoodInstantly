<?php
    include('seguridad.php');
	include ('inc/claseCliente.php');
    
	$obj=new claseCliente();
    
    if(isset($_POST['entrar'])){
    if(!empty($_POST['username']) && !empty($_POST['password'])){
		$pass=$_POST['password'];
		$pass= md5($pass);
        
        if($obj->validaLoginCliente($_POST['username'],$pass)){
            $_SESSION['username']=$_POST['username'];
            $_SESSION['contraseña']=$_POST['password']; 
            if(isset($_POST['id_restaurant'])){
                    header('Location: productos.php?id_restaurant='.$_POST["id_restaurant"].'');
            }else{
                    header('Location: index.php');
            }  
          
    	}else{
            if(isset($_POST['id_restaurant'])){  
        		echo'<script>
        		alert("Error en usuario y/o contraseña");
        		window.location.href="login.php?id_restaurant='.$_POST["id_restaurant"].'";
        		</script>';
            }else{
                echo"<script>
                alert('Error en usuario y/o contraseña');
                window.location.href='login.php';
                </script>";    
            }
    	}
	  }
    }
?>
