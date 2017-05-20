<?php

/*  funcion de conexion */

 function conecta(){
  try{
      $db = new PDO("mysql:host=localhost","root","");
      $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY , true);/* db es el objeto de la clase PDO el cual llama
       * al metodo set attribute con parametros use buffered, la cual almacena el string de conexion a mysql en un espacio de memoria.
       */
      return($db);
    }catch(PDOException $e){
        die('Ups, ha tenido problemas la conexion a la Base de Datos.');
        exit;
    }
}
?>
