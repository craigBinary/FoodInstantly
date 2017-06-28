<? 
include("db.php");
include("session.php");
?>

<div class="row">
  <div class="col-sm-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">B&uacute;squeda de Pedidos </h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body" id="">
            <div class="col-md-4 col-sm-6">
                                 <b>Usuario de cierre</b>
                                    <div class="form-group">
                                        <div class="form-line">
<select name="usua_cierre" id="usua_cierre"  class="form-control select2"  style="width:100%" >
              <option value="" selected>- SELECCIONE -</option>
               <?php 			  
				$buscar22="SELECT * from tbl_usuario_restaurant where id_restaurant='$id_restaurant' ";
				$result55=mysql_query($buscar22,$conn);
			while($reg=mysql_fetch_object($result55)){
				?>
    <option value="<?php echo $reg->nombre_usuario; ?>"><?php echo $reg->nombre_usuario; ?></option>
              <?php
	//$NOM_CALLE=
}
				
				?>
            </select>
                                        </div>
                                    </div>
                                </div>  
            
               
            <div class="col-md-4 col-sm-6">
                              <b>Fecha de Ingreso</b>
            <div class="form-group">
              <button type="button" style="width:100%" class="btn btn-default pull-right" id="daterange-btnf" > <span> <i class="fa fa-calendar"></i> Rango de Fecha </span> <i class="fa fa-caret-down"></i> </button>
            </div>
          </div>
           <div class="col-md-4 col-sm-6">
                              <b>&nbsp;</b>
            <div class="form-group">
               <button type="button" class="btn btn-primary waves-effect" id="btn_medicamento"  onclick="HistorialBusqueda(1);"  >BUSCAR PEDIDOS</button>
          </div>
          
          
                                </div> 
       

<!-- <div class="modal-footer" style="background-color:#FFF">

 <button type="button" class="btn btn-primary waves-effect" id="btn_medicamento"  onclick="HistorialBusqueda(1);"  >BUSCAR PEDIDOS</button>

  </div>-->

<!--
<table width="100%" border="0" cellspacing="0" cellpadding="0">
   
   
    <tr >
    
      <td width="9%" align="right" >&nbsp;<input class="boton"  type="button" name="button2" id="button2" value="Buscar" onclick="Busqueda2Filtro();" />&nbsp;&nbsp;</td>
      <td width="20%" align="right" ><input class="boton"  type="button" name="button" id="button" value="Nuevo Medicamento" onclick="NuevoMed20();" /><div id="flotante" align="center" style="visibility:hidden; position:absolute; width:200px; height:100px;"></div></td>
    </tr>
</table>-->









             </div>    </div>
  </div>
</div>
          
 <?

$plugin_adicional='

$(".select2").select2();
   
 $("#daterange-btnf").daterangepicker(
        {
          ranges: {
            "Hoy": [moment(), moment()],
            "Ayer": [moment().subtract(1, "days"), moment().subtract(1, "days")],
            "Ultimos 7 Dias": [moment().subtract(6, "days"), moment()],
            "Ultimos 30 Dias": [moment().subtract(29, "days"), moment()],
            "Este Mes": [moment().startOf("month"), moment().endOf("month")],
            "Ultimo Mes": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")],
			"Este A&ntilde;o": [moment().startOf("year"), moment()],
			"Desde el A&ntilde;o 2013": [moment().subtract(4, "year").startOf("year"), moment()]
			
          },
          startDate: moment().startOf("month"),
          endDate: moment(),
		   format: "DD/MM/YYYY", 
		  language: "es",
        },
        function (start, end) {
          $("#daterange-btnf span").html(start.format("DD/MM/YYYY") + " - " + end.format("DD/MM/YYYY"));
        }
		);
		
	$("#daterange-btnf2").daterangepicker(
        {
          ranges: {
            "Hoy": [moment(), moment()],
            "Ayer": [moment().subtract(1, "days"), moment().subtract(1, "days")],
            "Ultimos 7 Dias": [moment().subtract(6, "days"), moment()],
            "Ultimos 30 Dias": [moment().subtract(29, "days"), moment()],
            "Este Mes": [moment().startOf("month"), moment().endOf("month")],
            "Ultimo Mes": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")],
			"Este A&ntilde;o": [moment().startOf("year"), moment()],
			"Desde el A&ntilde;o 2013": [moment().subtract(4, "year").startOf("year"), moment()]
			
          },
          startDate: moment().startOf("moment"),
          endDate: moment(),
		   format: "DD/MM/YYYY", 
		  language: "es",
        },
        function (start, end) {
          $("#daterange-btnf span").html(start.format("DD/MM/YYYY") + " - " + end.format("DD/MM/YYYY"));
        }	
		
    );';

?>

<script>
  $(function () {
   
   <? echo $plugin_adicional; ?>	
   
  });
</script>          
          
