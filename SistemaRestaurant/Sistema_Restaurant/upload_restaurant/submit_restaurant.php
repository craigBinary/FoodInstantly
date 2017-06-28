<?php 
include("../conexion2.php");
include("../db.php");
//include("../../session.php");
include("../../funcion.php");
date_default_timezone_set('America/Santiago');
$data = array();

if($token==""){
$token = substr(md5(uniqid(rand())),0,6);
}
if(isset($_GET['files']))
{	
	$error = false;
	$files = array();
	$files2 = array();
	
	

	$uploaddir ="../files/";
	$uploaddir2 ="../files/thumbnail/";
	

	
	foreach($_FILES as $file) 
	{

		$archivo=$token."_".SacarAcentoArchivos($file['name']);
		
		$info = pathinfo($file['name']);
		$extension = $info['extension']; 
		
		if($extension=="png" or $extension=="PNG" or $extension=="IMG" or $extension=="img" or $extension=="jpeg" or $extension=="JPEG" or $extension=="jpg" or $extension=="JPG"  )
		{
			
			$files2=copy($file['tmp_name'], $uploaddir2 .basename($archivo));
			
			
			
			if(move_uploaded_file($file['tmp_name'], $uploaddir .basename($archivo)))
			{

				$files= $uploaddir.$archivo;
				$files22= $uploaddir2.$archivo;

			}	
			
			
			redimensionar_imagen($files22);	
		}
		
	}
	$data = array('files' => $files);
}
else
{
	$data = array('success' => 'Form was submitted', 'formData' => $_POST);
}

$data["extension"]=$extension;
$data["files"]=$files;
$data["files2"]=$files2;

echo json_encode($data);

?>