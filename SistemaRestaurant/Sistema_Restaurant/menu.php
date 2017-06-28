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
          
            <li ><a href="listar.php"><i class="fa fa-list"></i> Perfil de Productos</a></li>
            <li><a href="restaurant.php"><i class="fa fa-home"></i> Perfil de Restaurant</a></li>
           <li><a href="lista_pedidos.php"><i class="fa fa-cutlery"></i> Lista de Pedidos</a></li>
            <li ><a href="listar_usuarios.php"><i class="fa fa-users"></i> Perfil de Usuarios</a></li>
            <li ><a href="historial_pedidos.php"><i class="fa fa-clock-o"></i> Historial de Pedidos</a></li>
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
          <li><a href="lista_pedidos.php"><i class="fa fa-cutlery"></i> Lista de Pedidos</a></li>
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
          <li ><a href="ingresar_restaurant.php"><i class="fa fa-plus"></i> Registrar Restaurant</a></li>
          <li ><a href="ingresar_usuario_restaurant.php"><i class="fa fa-user-plus"></i> Ingresar Usuario a Restaurant</a></li>
           <!-- <li ><a href="usuarios.php"><i class="fa fa-users"></i> Usuarios</a></li> -->
          </ul>
        </li><? }?>
</ul>