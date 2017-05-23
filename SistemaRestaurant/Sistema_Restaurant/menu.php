<?php 
include("db.php");
include("session.php");

  
  

?>

 <ul class="sidebar-menu">
        <li class="header">NAVEGADOR</li>
        <? if($id_privilegio==1){?>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Administrador</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="listar.php"><i class="fa fa-circle-o"></i> Mantenedor de Productos</a></li>
            <li><a href=" #"><i class="fa fa-circle-o"></i> Mantenedor de Restaurant</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Lista de Pedidos</a></li>
            <li ><a href="listar_usuarios.php"><i class="fa fa-circle-o"></i> Mantenedor de Usuarios</a></li>
          </ul>
        </li><?  } if($id_privilegio==2){?>
         <li class="active treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Funcionario</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="index2.html"><i class="fa fa-circle-o"></i> Lista de Pedidos</a></li>
          </ul>
        </li><? }?>
        <? if($id_privilegio==3){?>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Sistema</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="ingresar_restaurant.php"><i class="fa fa-circle-o"></i> Registrar Restaurant</a></li>
          <li ><a href="ingresar_usuario_restaurant.php"><i class="fa fa-circle-o"></i> Ingresar Usuario a Restaurant</a></li>
          </ul>
        </li><? }?>
</ul>