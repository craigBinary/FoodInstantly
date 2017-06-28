
<? 
include("db.php");
include("session.php");

$trae=mysql_query("select * from tbl_restaurant r,tbl_comuna c where r.id_restaurant='$id_restaurant' and c.id_comuna=r.id_comuna",$conexion);
if($row=mysql_fetch_object($trae)){
	//$token=$row->token;
	}
	
?>


<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
     
      <div class="box-body body">
       
                 <div align="center">
                 <div class="form-group">
       <button class="btn btn-clock btn-primary btn-sm" type="button" onclick="EditarRestaurant('<? echo $id_restaurant;?>','1');"><i class="fa fa-edit"></i>Editar Restaurant</button>
         <!-- <a class="btn btn-app" onclick="VerSolicitud('');"><i class="fa fa-commenting"></i> Ver Comentarios</a> -->
         <button onclick="VerCalificacion('<? echo $id_restaurant;?>');" class="btn btn-clock btn-warning btn-sm" type="button"><i class="fa fa-comments"></i> Ver Calificaciones</button> </div></div>
         
         
         <div class="panel panel-info">
         <div class="panel-heading"><strong>INFORMACI&Oacute;N DEL RESTAURANT</strong></div>
        <div class="panel-body">
         
        
        <div class="col-md-10 col-md-offset-1 form-group">
          <label for="exampleInputEmail1"> Nombre del Restaurant: </label>
          <? echo $row->nombre_restaurant;?>
        </div>
        
      
        <div class="col-md-12 form-group">
          <label for="exampleInputEmail1">Direcci&oacute;n:</label>
          <? echo $row->direccion." #".$row->numero_calle." ,". $row->nombre_comuna;?>
        </div>
            
          
          
       
        
        
		<div class="row">
        
        <div class="col-md-6 ">
        <div class="form-group">
          <label for="exampleInputEmail1">E-mail:</label>
          <? echo $row->email;?>
        </div>
            </div>
             
            <div class="col-md-6">
            <div class="form-group">
          <label for="exampleInputEmail1">Num. Contacto:</label>
          <? echo $row->num_contacto;?>
        </div></div>
            </div>
            
            <div class="row">
        
        <div class="col-md-6 ">
        <div class="form-group">
          <label for="exampleInputEmail1">Hora  de Apertura:</label>
          <? echo $row->hora_apertura;?>
        </div>
            </div>
             
            <div class="col-md-6">
            <div class="form-group">
          <label for="exampleInputEmail1">Hora de Cierre:</label>
          <? echo $row->hora_cierre;?>
        </div></div>
            </div>
           
           
           <div class="panel panel-success">
        <div class="panel-body">
        <div class="col-md-10  form-group">
        
        <label for="exampleInputEmail1">Informaci&oacute;n:</label><br>
        <? echo $row->info_restaurant;?>
        </div>
 </div></div>
 
      </div>
    </div></div></div></div></div>


          

