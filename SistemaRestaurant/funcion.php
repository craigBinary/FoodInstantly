<? 
function SacarAcentoArchivos($archivo)
{
    $archivon="";

    $string=$archivo;
    
    for ($i = 0; $i < strlen($string); $i++)
    {
          $valor= ord($string[$i]);
        //echo $valor."<br>";
        switch ($valor)
       {
            case 40:
            case 31:
            case 35:
            case 64:     
            case 38:
            case 191:
            case 39:
            case 33:
            case 37:
            case 170:
            case 41:
            case 176:
            case 168:
            case 45:
            case 43:
            case 91:
            case 93:
            case 96:
            case 59:
            case 195:
            $archivon.="";
            break;
               case 161:
            $archivon.="a";
            break;
            case 169:
            $archivon.="e";
            break;
            case 173:
            $archivon.="i";
            break;
            case 179:
            $archivon.="o";
            break;
            case 186:
            $archivon.="u";
            break;
            case 177:
            $archivon.="n";
            break;
            case 129:
            $archivon.="A";
            break;
            case 137:
            $archivon.="E";
            break;
            case 141:
            $archivon.="I";
            break;
            case 147:
            $archivon.="O";
            break;
            case 154:
            $archivon.="U";
            break;
            case 145:
            $archivon.="N";
            break;
           
           
           
            default:
            $archivon.= $string[$i];
       }
      
    }
   
    return $archivon;
}

function saber_dia($nombredia) {

$dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');

$fecha = $dias[date('N', strtotime($nombredia))];

return $fecha;

}

function DevolverExtension($ruta){
	$sep=explode("/",$ruta);
$nombre_archivo=$sep[4];
$sep_arch=explode("../",$ruta);
$ruta_archivo=$sep_arch[1];
$info = pathinfo($nombre_archivo);
$extension= array();
$extension[0] = $info['extension'];
$extension[1] = $ruta_archivo;
return $extension; 
	}

function paginate($item_per_page, $current_page, $total_records, $total_pages, $page_url)
{
    $pagination = '';
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
        $pagination .= '<ul class="pagination">';
       
        $right_links    = $current_page + 8;
        $previous       = $current_page - 8; //previous link
        $next           = $current_page + 1; //next link
        $first_link     = true; //boolean var to decide our first link
      
        if($current_page > 1){
            $previous_link = ($previous==0)?1:$previous;
            if($current_page>8) $pagination .= '<li class="first"><a href="'.$page_url.'1);" title="First">&laquo;</a></li>'; //first link
           if($current_page>9) $pagination .= '<li><a href="'.$page_url.$previous_link.');" title="Previous">&lt;</a></li>'; //previous link
                for($i = ($current_page-7); $i < $current_page; $i++){ //Create left-hand side links
                    if($i > 0){
                        $pagination .= '<li><a href="'.$page_url.$i.');">'.$i.'</a></li>';
                    }
                } 
            $first_link = false; //set first link to false
        }
      
        if($first_link){ //if current active page is first link
            $pagination .= '<li class="active"><a href="javascript:void(0);">'.$current_page.'</a></li>';
        }elseif($current_page == $total_pages){ //if it's the last active link
            $pagination .= '<li class="active"><a href="javascript:void(0);">'.$current_page.'</a></li>';
        }else{ //regular current link
            $pagination .= '<li class="active"><a href="javascript:void(0);">'.$current_page.'</a></li>';
        }
              
        for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
            if($i<=$total_pages){
                $pagination .= '<li><a href="'.$page_url.$i.');">'.$i.'</a></li>';
            }
        }
        if($current_page < $total_pages){
                $next_link = ($i > $total_pages)? $total_pages : $i;
             if($current_page<$total_pages-8)   $pagination .= '<li><a href="'.$page_url.$next_link.');" >&gt;</a></li>'; //next link
                if($current_page<$total_pages-7) $pagination .= '<li class="last"><a href="'.$page_url.$total_pages.');" title="Last">&raquo;</a></li>'; //last link
        }
      
        $pagination .= '</ul>';
    }
    return $pagination; //return pagination links
}

   function acentojson($valor)
    {

        $iso88591 = $valor; // file must be ISO-8859-1 encoded
        $utf8_1 = utf8_encode($iso88591);
        $utf8_2 = iconv('ISO-8859-1', 'UTF-8', $iso88591);
        $utf8_2 = mb_convert_encoding($iso88591, 'UTF-8', 'ISO-8859-1');
       
        return $utf8_2;
    }
     


function ruta_subir($token)
{
	
	$anyo=date("Y");
	$mes=date("m");
	
	$directorio = "/files/$anyo/";
	$directorio2= "/files/$anyo/$mes/".$token."/";


	mkdir($directorio, 0777, true);
	chmod($directorio,0777);
	
	mkdir($directorio2, 0777, true);
	chmod($directorio2,0777);
		
	return $directorio2;
	
	
}

function ruta_subir2()
{
	
	$anyo=date("Y");
	$mes=date("m");
	
	$directorio = "../../files/$anyo";
	$directorio2= "../../files/$anyo/$mes";


	mkdir($directorio, 0777, true);
	chmod($directorio,0777);
	
	mkdir($directorio2, 0777, true);
	chmod($directorio2,0777);
		
	return $directorio2;
	
	
}


function ruta_subir_new($token)
{
	
	$anyo=date("Y");
	$mes=date("m");
	
	$directorio = "../files/$anyo/";
	$directorio2= "../files/$anyo/$mes/";
	$directorio3= "../files/$anyo/$mes/".$token."/";
	$directorio4= "../files/$anyo/$mes/".$token."/thumbnail/";

	mkdir($directorio, 0777, true);
	chmod($directorio,0777);
	
	mkdir($directorio2, 0777, true);
	chmod($directorio2,0777);
	
	mkdir($directorio3, 0777, true);
	chmod($directorio3,0777);
	
	mkdir($directorio4, 0777, true);
	chmod($directorio4,0777);
		
	return $directorio4;	
	
}



function devuelveFechaMes($fecha)
{
	
	$fech=explode(" ",$fecha);
	$fechareal=$fech[0];
	$fech=explode("-",$fechareal);
	$dia=$fech[2];
	$mes=$fech[1];
	$ano=$fech[0];
	
	switch($mes)
	{
		case '1': $mes_F="Enero"; break;	
		case '2': $mes_F="Febrero"; break;	
		case '3': $mes_F="Marzo"; break;
		case '4': $mes_F="Abril"; break;
		case '5': $mes_F="Mayo"; break;	
		case '6': $mes_F="Junio"; break;	
		case '7': $mes_F="Julio"; break;
		case '8': $mes_F="Agosto"; break;
		case '9': $mes_F="Septiembre"; break;	
		case '10': $mes_F="Octubre"; break;	
		case '11': $mes_F="Noviembre"; break;	
		case '12': $mes_F="Diciembre"; break;	
	}
	
	return $dia." de ".$mes_F." ".$ano;
	
}

function redimensionar_imagen($ruta_imagen)
{
	
//	$ruta_imagen = "imagen_original2.jpg";

$miniatura_ancho_maximo = 150;
$miniatura_alto_maximo = 150;

$info_imagen = getimagesize($ruta_imagen);
$imagen_ancho = $info_imagen[0];
$imagen_alto = $info_imagen[1];
$imagen_tipo = $info_imagen['mime'];


$proporcion_imagen = $imagen_ancho / $imagen_alto;
$proporcion_miniatura = $miniatura_ancho_maximo / $miniatura_alto_maximo;

if ( $proporcion_imagen > $proporcion_miniatura ){
	$miniatura_ancho = $miniatura_ancho_maximo;
	$miniatura_alto = $miniatura_ancho_maximo / $proporcion_imagen;
} else if ( $proporcion_imagen < $proporcion_miniatura ){
	$miniatura_ancho = $miniatura_ancho_maximo * $proporcion_imagen;
	$miniatura_alto = $miniatura_alto_maximo;
} else {
	$miniatura_ancho = $miniatura_ancho_maximo;
	$miniatura_alto = $miniatura_alto_maximo;
}


switch ( $imagen_tipo ){
	case "image/jpg":
	case "image/jpeg":
		$imagen = imagecreatefromjpeg( $ruta_imagen );
		break;
	case "image/png":
		$imagen = imagecreatefrompng( $ruta_imagen );
		break;
	case "image/gif":
		$imagen = imagecreatefromgif( $ruta_imagen );
		break;
}

$lienzo = imagecreatetruecolor( $miniatura_ancho, $miniatura_alto );

imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho, $miniatura_alto, $imagen_ancho, $imagen_alto);


imagejpeg($lienzo, $ruta_imagen, 80);

	
}

function verEstado($estado)
{
	  
		 switch($estado)
		{
			case 1:
			echo "Ingresada";
			break;
			case 2:
			echo "Derivada";
			break;
			case 3:
			echo "Resuelta";
			break;
			case 4:
			echo "Finalizada";
			break;
			case 5:
			echo "Rechazada";
			break;
			
		}
	
}

function precio($valor)
{
	return "$".number_format($valor,0,",",".");	
}

function miles($valor)
{
	return number_format($valor,0,",",".");	
}

function mfecha($fecha)
{
	$aa = explode(" ", $fecha);

//	echo $aa[0];
	if($aa[0]<>"0000-00-00")
{
	$bb = explode("-", $aa[0]);
	
	echo $bb[2]."-".$bb[1]."-".$bb[0]." ".$aa[1];
	
}
}

function afecha($fecha)
{
	$aa = explode(" ", $fecha);
	if($aa[0]<>"0000-00-00")
{
	$bb = explode("-", $aa[0]);
	
	echo $bb[2]."/".$bb[1]."/".$bb[0]." ".$aa[1];
	
}
}


    function getRealIP() {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];
           
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
       
        return $_SERVER['REMOTE_ADDR'];
    }
	 
	
	function mfechasimple($fecha)
{
	$aa = explode(" ", $fecha);

//	echo $aa[0]; 
if($aa[0]<>"0000-00-00")
{
	
	$bb = explode("-", $aa[0]);
	
	echo $bb[2]."-".$bb[1]."-".$bb[0];
}
	
}

function separaprecio($precio)
{
	$aa = explode(" ", $precio);
	
	echo $bb[0];

	
}

	function CambiarFechaSlash($fecha)
{
	$aa = explode("-", $fecha);
	
	echo $aa[2]."/".$aa[1]."/".$aa[0];

	
}

	function fechavuelta($fecha)
{
	if($fecha<>"")
	{
	
	$aa = explode(" ", $fecha);

//	echo $aa[0]; 

	
	$bb = explode("-", $aa[0]);
	
	return $bb[2]."-".$bb[1]."-".$bb[0];
	
	}

	
}


	function fechavueltaslash($fecha)
{
	if($fecha<>"")
	{
	
	$aa = explode(" ", $fecha);

//	echo $aa[0]; 

	
	$bb = explode("/", $aa[0]);
	
	return $bb[2]."-".$bb[1]."-".$bb[0];
	
	}
	

	
}


	function hora($hora)
{
	if($hora<>"")
	{

	
	$bb = explode("+", $hora);
	$aa = explode(" ", $bb[0]);
	
	return $aa[1]." ".$aa[0] ;
	
	}
		
}


	function fechaguionaslash($fecha)
{
	if($fecha<>"")
	{
	
	$aa = explode(" ", $fecha);

//	echo $aa[0]; 

	
	$bb = explode("-", $aa[0]);
	
	return $bb[2]."/".$bb[1]."/".$bb[0];
	
	}

	
}


	function mfechasimpler($fecha)
{
	$aa = explode(" ", $fecha);

//	echo $aa[0]; 
if($aa[0]<>"0000-00-00")
{
	
	$bb = explode("-", $aa[0]);
	
	return $bb[2]."-".$bb[1]."-".$bb[0];
}
	
}



function num2letras($num, $fem = false, $dec = true) { 
   $matuni[2]  = "dos"; 
   $matuni[3]  = "tres"; 
   $matuni[4]  = "cuatro"; 
   $matuni[5]  = "cinco"; 
   $matuni[6]  = "seis"; 
   $matuni[7]  = "siete"; 
   $matuni[8]  = "ocho"; 
   $matuni[9]  = "nueve"; 
   $matuni[10] = "diez"; 
   $matuni[11] = "once"; 
   $matuni[12] = "doce"; 
   $matuni[13] = "trece"; 
   $matuni[14] = "catorce"; 
   $matuni[15] = "quince"; 
   $matuni[16] = "dieciseis"; 
   $matuni[17] = "diecisiete"; 
   $matuni[18] = "dieciocho"; 
   $matuni[19] = "diecinueve"; 
   $matuni[20] = "veinte"; 
   $matunisub[2] = "dos"; 
   $matunisub[3] = "tres"; 
   $matunisub[4] = "cuatro"; 
   $matunisub[5] = "quin"; 
   $matunisub[6] = "seis"; 
   $matunisub[7] = "sete"; 
   $matunisub[8] = "ocho"; 
   $matunisub[9] = "nove"; 

   $matdec[2] = "veint"; 
   $matdec[3] = "treinta"; 
   $matdec[4] = "cuarenta"; 
   $matdec[5] = "cincuenta"; 
   $matdec[6] = "sesenta"; 
   $matdec[7] = "setenta"; 
   $matdec[8] = "ochenta"; 
   $matdec[9] = "noventa"; 
   $matsub[3]  = 'mill'; 
   $matsub[5]  = 'bill'; 
   $matsub[7]  = 'mill'; 
   $matsub[9]  = 'trill'; 
   $matsub[11] = 'mill'; 
   $matsub[13] = 'bill'; 
   $matsub[15] = 'mill'; 
   $matmil[4]  = 'millones'; 
   $matmil[6]  = 'billones'; 
   $matmil[7]  = 'de billones'; 
   $matmil[8]  = 'millones de billones'; 
   $matmil[10] = 'trillones'; 
   $matmil[11] = 'de trillones'; 
   $matmil[12] = 'millones de trillones'; 
   $matmil[13] = 'de trillones'; 
   $matmil[14] = 'billones de trillones'; 
   $matmil[15] = 'de billones de trillones'; 
   $matmil[16] = 'millones de billones de trillones'; 
   
   //Zi hack
   $float=explode('.',$num);
   $num=$float[0];

   $num = trim((string)@$num); 
   if ($num[0] == '-') { 
      $neg = 'menos '; 
      $num = substr($num, 1); 
   }else 
      $neg = ''; 
   while ($num[0] == '0') $num = substr($num, 1); 
   if ($num[0] < '1' or $num[0] > 9) $num = '0' . $num; 
   $zeros = true; 
   $punt = false; 
   $ent = ''; 
   $fra = ''; 
   for ($c = 0; $c < strlen($num); $c++) { 
      $n = $num[$c]; 
      if (! (strpos(".,'''", $n) === false)) { 
         if ($punt) break; 
         else{ 
            $punt = true; 
            continue; 
         } 

      }elseif (! (strpos('0123456789', $n) === false)) { 
         if ($punt) { 
            if ($n != '0') $zeros = false; 
            $fra .= $n; 
         }else 

            $ent .= $n; 
      }else 

         break; 

   } 
   $ent = '     ' . $ent; 
   if ($dec and $fra and ! $zeros) { 
      $fin = ' coma'; 
      for ($n = 0; $n < strlen($fra); $n++) { 
         if (($s = $fra[$n]) == '0') 
            $fin .= ' cero'; 
         elseif ($s == '1') 
            $fin .= $fem ? ' una' : ' un'; 
         else 
            $fin .= ' ' . $matuni[$s]; 
      } 
   }else 
      $fin = ''; 
   if ((int)$ent === 0) return 'Cero ' . $fin; 
   $tex = ''; 
   $sub = 0; 
   $mils = 0; 
   $neutro = false; 
   while ( ($num = substr($ent, -3)) != '   ') { 
      $ent = substr($ent, 0, -3); 
      if (++$sub < 3 and $fem) { 
         $matuni[1] = 'una'; 
         $subcent = 'as'; 
      }else{ 
         $matuni[1] = $neutro ? 'un' : 'uno'; 
         $subcent = 'os'; 
      } 
      $t = ''; 
      $n2 = substr($num, 1); 
      if ($n2 == '00') { 
      }elseif ($n2 < 21) 
         $t = ' ' . $matuni[(int)$n2]; 
      elseif ($n2 < 30) { 
         $n3 = $num[2]; 
         if ($n3 != 0) $t = 'i' . $matuni[$n3]; 
         $n2 = $num[1]; 
         $t = ' ' . $matdec[$n2] . $t; 
      }else{ 
         $n3 = $num[2]; 
         if ($n3 != 0) $t = ' y ' . $matuni[$n3]; 
         $n2 = $num[1]; 
         $t = ' ' . $matdec[$n2] . $t; 
      } 
      $n = $num[0]; 
      if ($n == 1) { 
         $t = ' ciento' . $t; 
      }elseif ($n == 5){ 
         $t = ' ' . $matunisub[$n] . 'ient' . $subcent . $t; 
      }elseif ($n != 0){ 
         $t = ' ' . $matunisub[$n] . 'cient' . $subcent . $t; 
      } 
      if ($sub == 1) { 
      }elseif (! isset($matsub[$sub])) { 
         if ($num == 1) { 
            $t = ' mil'; 
         }elseif ($num > 1){ 
            $t .= ' mil'; 
         } 
      }elseif ($num == 1) { 
         $t .= ' ' . $matsub[$sub] . '?n'; 
      }elseif ($num > 1){ 
         $t .= ' ' . $matsub[$sub] . 'ones'; 
      }   
      if ($num == '000') $mils ++; 
      elseif ($mils != 0) { 
         if (isset($matmil[$sub])) $t .= ' ' . $matmil[$sub]; 
         $mils = 0; 
      } 
      $neutro = true; 
      $tex = $t . $tex; 
   } 
   $tex = $neg . substr($tex, 1) . $fin; 
   //Zi hack --> return ucfirst($tex);
   $end_num=ucfirst($tex).' pesos ';
   return $end_num; 
} 

?>