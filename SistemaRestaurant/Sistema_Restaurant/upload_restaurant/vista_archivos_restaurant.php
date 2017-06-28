<?
include("../conexion2.php");
include("../db.php");
//include("../../session.php");
$ruta=$_REQUEST["ruta"];
$files=$_REQUEST["files"];
$files2=$_REQUEST["files2"];


if($files=="")
{
	$consulta=mysql_query("select * from tbl_imagen_restaurant where id_restaurant='$id_restaurant'",$conexion);
	if($reg=mysql_fetch_object($consulta))
	{
		$files=$reg->imagen_restaurant;
		$id=$reg->id_imagen_restaurant;
		
	}
	
}



$sep=explode("/",$files);
$nombre_archivo=$sep[2];
$ruta_thumbnail=$sep[0]."/".$sep[1]."/thumbnail/".$sep[2];

$sep=explode("_",$nombre_archivo);
$nombre_archivo=$sep[1];

					  
$info = pathinfo($nombre_archivo);
$extension = $info['extension']; 					  
switch($extension)
{
	case "PDF":  $imagen="fa-file-pdf-o";
	break;
	case "pdf":  $imagen="fa-file-pdf-o";
	break;
	
	case "doc":  $imagen="fa-file-word-o";
	break;
	case "DOC":  $imagen="fa-file-word-o";
	break;
	case "docx":  $imagen="fa-file-word-o";
	break;
	case "DOCX":  $imagen="fa-file-word-o";
	break;
	
	case "xls":  $imagen="fa-file-excel-o";
	break;
	case "XLS":  $imagen="fa-file-excel-o";
	break;
	case "xlsx":  $imagen="fa-file-excel-o";
	break;
	case "XLSX":  $imagen="fa-file-excel-o";
	break;
	
	case "avi":  $imagen="fa-file-video-o";
	break;
	case "AVI":  $imagen="fa-file-video-o";
	break;
	
	case "MP3":  $imagen="fa-file-audio-o";
	break;
	case "mp3":  $imagen="fa-file-audio-o";
	break;
	
	case "MP4":  $imagen="fa-file-video-o";
	break;
	case "mp4":  $imagen="fa-file-video-o";
	break;
	
	case "txt":  $imagen="fa-file-text-o";
	break;
	case "msg":  $imagen="fa-envelope-o";
	break;

}

?>
<input name="oculto_simple" id="oculto_simple" type="hidden" value="<?=$files;?>" />
<input name="nombre_archivo" id="nombre_archivo" type="hidden" value="<?=$nombre_archivo;?>" />
<div class="box-body">
  <div class="row">
    <div class="col-md-3">
      <div class="form-group">
        <? if($extension=="png" or $extension=="PNG" or $extension=="JPG" or $extension=="jpg" or $extension=="JPEG" or $extension=="jpeg")
			{
				?>
        <a href="Sistema_Restaurant/<?=$files;?>" target="_blank"> <img src="Sistema_Restaurant/<?=$ruta_thumbnail;?>"  /> </a>
        <? }else{ ?>
        <a class="btn btn-app " href="Sistema_Restaurant/<?=$files;?>" target="_blank" style="height:100px; width:150px !important; vertical-align:central !important; white-space:normal !important;"> <i class="fa <?php echo $imagen; ?>" ></i>
        <?=$nombre_archivo; ?>
        </a>
        <? } ?>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <?=$nombre_archivo;?>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
      
     
      
        <button class="btn btn-danger delete" onclick="EliminarArchivoRestaurant('<?=$token;?>','<?=$nombre_archivo;?>','<? echo $id;?>')"> <i class="glyphicon glyphicon-trash"></i> <span>Eliminar</span> </button>
        
        
      </div>
    </div>
  </div>
</div>
