<? 

include("db.php");
include("session.php");



?>
<input name="oculto_editar" id="oculto_editar" type="hidden" value="2" />
<div class="box-body">
 <div class="table-responsive">
  <table  class="table table-bordered table-striped">
 <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nombre de Usuario</th>
                  <th>Estado</th>
                  <th>Tipo de Usuario</th>
                  <th></th>
                  <th></th>
                  
                </tr>
                </thead>
            <tbody>
             <? 
				$numero=1;
				$consulta=mysql_query("select * from tbl_usuario_restaurant u,tbl_privilegio p where u.id_restaurant='$id_restaurant' and u.id_privilegio=p.id_privilegio",$conexion);
	
			   while($row=mysql_fetch_object($consulta)){
					$estado=$row->estado_usuario;	
				   
			?>
			 <tr>
                  <td><? echo $numero++;?></td>
                  <td><? echo $row->nombre_usuario;?></td>
                 <? if($estado=="2"){ ?> <td><span class="badge bg-red"><? echo "DESHABILITADO";?></span></td><? }else{?>
                 <td><span class="badge bg-green"><? echo "ACTIVO";?></span></td><? }?>
                  <td><? echo $row->nombre_privilegio;?></td>
                  <td align="center"><p data-placement="top" data-toggle="tooltip" >
                  <button class="btn btn-primary btn-xs"  onClick="AgregarUsuarioNuevo('<? echo $row->id_usuario;?>')" data-toggle="modal" ><span class="glyphicon glyphicon-pencil" data-toggle="tooltip" title="Editar"></span> </button></p></td>
                  <td align="center"><p data-placement="top" data-toggle="tooltip" >
                  <button class="btn btn-danger btn-xs"  onClick="EliminaUsuario('<? echo $row->id_usuario;?>')" data-toggle="modal" ><span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Eliminar"></span> </button></p></td>
                 
                </tr>
                <? }?>
                </tbody>
              </table></div>
              </div>