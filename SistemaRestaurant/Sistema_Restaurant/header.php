<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema Restaurant</title>
  <!-- Tell the browser to be responsive to screen width -->
 <?php 

 include("plugin_cabecera.php");

 $trae_restaurant=mysql_query("select * from tbl_restaurant r where r.id_restaurant='$id_restaurant' and r.id_restaurant<>'0'  ",$conexion);
 if($row=mysql_fetch_object($trae_restaurant)){
$nombre_restaurant=$row->nombre_restaurant;
$numero=$row->numero;
$nombre_calle=$row->nombre_calle;

	 }

  
 ?>

  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" style="height:auto;">
<header class="main-header">
    <!-- Logo -->
    <a href="listar.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Sistema </b>Restaurant </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <? if($id_privilegio==3){?>
              <img src="../img/restaurant.png" class="user-image" alt="User Image">
              <? }else{?>
               <img src="../img/user.png" class="user-image" alt="User Image">
               <? }?>
              
              <span class="hidden-xs"><? echo $nombre_usuario;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <? if($id_privilegio==3){?>
              <img src="../img/restaurant.png" class="user-image" alt="User Image">
              <? }else{?>
               <img src="../img/user.png" class="user-image" alt="User Image">
               <? }?>

                <p>
                  <? echo $nombre_usuario; ?> - Admin Rstaurant
                 
                </p>
              </li>
            
              <li class="user-footer">
               <div class="pull-left">
                  <a href="CambiarContrasena.php" class="btn btn-default btn-flat">Cambiar Contraseña</a>
                </div>
                <div class="pull-right">
                  <a href="logout2.php" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
         <? if($id_privilegio==3){?>
              <img src="../img/restaurant.png" class="user-image" alt="User Image">
              <? }else{?>
               <img src="../img/user.png" class="user-image" alt="User Image">
               <? }?>
        </div>
        <div class="pull-left info">
          <p><? echo $nombre_usuario;?></p>
         
        </div>
      </div>
    
      <!-- sidebar menu: : style can be found in sidebar.less -->
     
     
     
     <?php include("menu.php");?>
     
     
     
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper" >
 <section class="content-header">
      <h1>
    
      <i><? echo $nombre_restaurant;?></i>
        <small>sistema de administraci&oacute;n</small>
      </h1>
      

    </section>
    <!-- Main content --><section class="content" id="contenedor">