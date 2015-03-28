<?php
header('Content-Type: text/html; charset=UTF-8');

$func = $_GET['q'];

$link=mysql_connect("localhost","mesubocl_gdmin","mesubo1152");
mysql_select_db("mesubocl_RECTEM",$link);

// funcion para agregar negocio
if ($func == 1) {
	$nomdesc = $_POST['nomdesc'];
	$url = $_POST['url'];
	$ubicacion = $_POST['ubicacion'];
	
	$sql = "INSERT INTO M_NEGOCIO (TXT_NEGOCIO, URL, UBICACION, ACTIVO)
	VALUES ('".$nomdesc."', '".$url."', '".$ubicacion."',1)";
	
	$retval = mysql_query( $sql, $link );
	if(! $retval )
	{
	  die('Se produjo un error al operar sobre la base de datos: ' . mysql_error());
	}
	else {
	echo "<script language='javascript'>
	alert('Se han ingresado exitosamente los datos del negocio');
	window.location = 'agrneg.php';
	</script>";	

	}
	
	$conn->close();
}
// Agregar linea
if ($func == 2) {
	$nomlinea = $_POST['nomlinea'];

	$sql = "INSERT INTO M_LINEA (TXT_LINEA) VALUES ('".$nombre_linea."')";
	
	$retval = mysql_query( $sql, $link );
	if(! $retval )
	{
		die('Se produjo un error al operar sobre la base de datos: ' . mysql_error());
	}
	else {
	echo "<script language='javascript'>
	alert('Se han ingresado exitosamente los datos de la linea');
	window.location = 'agrlna.php';
	</script>";	
	}
	
	$conn->close();
}
// Agregar recorrido
if ($func == 3) {
	$transporte = $_POST['transporte'];
	$nomrec = $_POST['nomrec'];
	$IDA = $_POST['IDA'];
	$REG = $_POST['REG'];
	$foto = $_FILES['foto']['name'];
	
	function quitaAcentos($cadena){
	$p = array('á','é','í','ó','ú','Á','É','Í','Ó','Ú','ñ','Ñ');
	$r = array('a','e','i','o','u','A','E','I','O','U','n','N');
	return str_replace($p, $r, $cadena);
	}
	
	$urlfoto = quitaAcentos($foto);
	
	$mime = array('image/jpg', 'image/jpeg', 'image/pjpeg', 'image/gif', 'image/png');
	$tipo_archivo = $_FILES['foto']['type'];
	$tamano_archivo = $_FILES['foto']['size'];
	
	if(in_array($tipo_archivo, $mime))
	{
		if($tamano_archivo<3000000) 
		{
			if (move_uploaded_file($_FILES["foto"]['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'/images/recorridos/'.$urlfoto)){
				
					$result = mysql_query("SELECT MAX(COD_RECORRIDO)+1 as CODIGO FROM M_RECORRIDO", $link);
	
					$numero = mysql_result($result, 0, "CODIGO");
	
					$sql = "INSERT INTO M_RECORRIDO (COD_RECORRIDO, COD_TRANSPORTE, TXT_RECORRIDO, DES_RUTA_IDA, DES_RUTA_VUELTA, IMAGEN_RECORRIDO, ACTIVO) VALUES (".$numero.",".$transporte.",'".$nomrec."','".$IDA."','".$REG."','images/recorridos/".$urlfoto."',1)";

					$sql2 = "UPDATE M_TRANSPORTE SET ACTIVO = 1 WHERE COD_TRANSPORTE = ".$transporte;
	
					$upd = mysql_query($sql2, $link);
	
					$retval = mysql_query( $sql, $link );
						if(! $retval )
						{
							die('Se produjo un error al operar sobre la base de datos: ' . mysql_error());
						}
							else {
									echo "<script language='javascript'>
									alert('Se han ingresado exitosamente los datos del recorrido');
									window.location = 'agrrec.php';
									</script>";	

								}

					$conn->close();
				
			}else{
					echo "<script type=\"text/javascript\"> window.location='error1.php';</script>";  
   				 }
		}else {
				echo "<script type=\"text/javascript\"> window.location='error1.php';</script>";  
			  }
	}
	else {
			echo "<script type=\"text/javascript\"> window.location='error1.php';</script>";  
	}
	
	
}
// Agregar Transporte
if ($func == 4) {
	$tipotrans = $_POST['tipotrans'];
	$servicio = $_POST['servicio'];
	$linea = $_POST['linea'];
	$nametrans = $_POST['nametrans'];
	
	$result = mysql_query("SELECT MAX(COD_TRANSPORTE)+1 as CODIGO FROM M_TRANSPORTE", $link);
	
	$numero = mysql_result($result, 0, "CODIGO");
	
	$sql = "INSERT INTO M_TRANSPORTE (COD_TRANSPORTE, COD_TIPO_TRANSPORTE, COD_SERVICIO, COD_NUM_LINEA, TXT_TRANSPORTE, ACTIVO) VALUES (".$numero.",".$tipotrans.",".$servicio.",".$linea.",'".$nametrans."',0)";

	$retval = mysql_query( $sql, $link );
	if(! $retval )
	{
		die('Se produjo un error al operar sobre la base de datos: ' . mysql_error());
	}
	else {
	echo "<script language='javascript'>
	window.location = 'agrtra.php';
	alert('Se han ingresado exitosamente los datos del transporte');

	</script>";	

	}

	$conn->close();
}
// Agregar Banner
if ($func == 5) {
	$tipobanner = $_POST['tipobanner'];
	$nombrebanner = $_POST['nombrebanner'];
	$fotobanner = $_FILES['fotobanner']['name'];
	$urlbanner = $_POST['urlbanner'];
	
	function quitaAcentos($cadena){
	$p = array('á','é','í','ó','ú','Á','É','Í','Ó','Ú','ñ','Ñ');
	$r = array('a','e','i','o','u','A','E','I','O','U','n','N');
	return str_replace($p, $r, $cadena);
	}
	
	$urlfotobanner = quitaAcentos($fotobanner);
	
	$mime = array('image/jpg', 'image/jpeg', 'image/pjpeg', 'image/gif', 'image/png');
	$tipo_archivo = $_FILES['fotobanner']['type'];
	$tamano_archivo = $_FILES['fotobanner']['size'];
	
	if(in_array($tipo_archivo, $mime))
	{
		if($tamano_archivo<3000000) 
		{
			if (move_uploaded_file($_FILES["fotobanner"]['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'/images/banner/'.$urlfotobanner)){
				
				$sql = "INSERT INTO M_BANNER (COD_TIPO_BANNER, TXT_BANNER, URL, IMAGEN, ACTIVO) VALUES (".$tipobanner.",'".$nombrebanner."','".$urlbanner."','images/banner/".$urlfotobanner."', 1)";
	
				$retval = mysql_query( $sql, $link );
				if(! $retval )
				{
					die('Se produjo un error al operar sobre la base de datos: ' . mysql_error());
				}
				else {
					echo "<script language='javascript'>
					window.location = 'agrban.php';
					alert('Se han ingresado exitosamente los datos del banner');
	
					</script>";
	
	}
	
	$conn->close();
				
				}else{
					echo "<script type=\"text/javascript\"> window.location='error1.php';</script>";  
   				 }
		}else {
				echo "<script type=\"text/javascript\"> window.location='error1.php';</script>";  
			  }
	}
	else {
			echo "<script type=\"text/javascript\"> window.location='error1.php';</script>";  
	}
	
}
// Agregar Tipo transporte
if ($func == 6) {
	$nametptrans = $_POST['nametptrans'];


	$sql = "INSERT INTO M_TIPO_TRANSPORTE (TXT_TIPO_TRANSPORTE) VALUES ('".$nametptrans."')";

	$retval = mysql_query( $sql, $link );
	if(! $retval )
	{
		die('Se produjo un error al operar sobre la base de datos: ' . mysql_error());
	}
	else {
		echo "<script language='javascript'>
	window.location = 'agrtpt.php';
	alert('Se han ingresado exitosamente los datos del tipo de transporte');

	</script>";

	}

	$conn->close();

}
// Agregar Tipo banner
if ($func == 7) {
	$nomtipobanner = $_POST['nomtipobanner'];


	$sql = "INSERT INTO M_TIPO_BANNER (TXT_TIPO_BANNER) VALUES ('".$nomtipobanner."')";

	$retval = mysql_query( $sql, $link );
	if(! $retval )
	{
		die('Se produjo un error al operar sobre la base de datos: ' . mysql_error());
	}
	else {
		echo "<script language='javascript'>
	window.location = 'agrtbn.php';
	alert('Se han ingresado exitosamente los datos del tipo de banner');

	</script>";

	}

	$conn->close();

}
// Agregar Tipo Negocio
if ($func == 8) {
	$nomtiponegocio = $_POST['nomtiponegocio'];


	$sql = "INSERT INTO M_TIPO_NEGOCIO (TXT_TIPO_BANNER) VALUES ('".$nomtipobanner."')";

	$retval = mysql_query( $sql, $link );
	if(! $retval )
	{
		die('Se produjo un error al operar sobre la base de datos: ' . mysql_error());
	}
	else {
		echo "<script language='javascript'>
	window.location = 'agrptn.php';
	alert('Se han ingresado exitosamente los datos del tipo de negocio');

	</script>";

	}

	$conn->close();

}
// Agregar Servicio
if ($func == 9) {
	$nomserv = $_POST['nomserv'];


	$sql = "INSERT INTO M_SERVICIO (TXT_SERVICIO) VALUES ('".$nomserv."')";

	$retval = mysql_query( $sql, $link );
	if(! $retval )
	{
		die('Se produjo un error al operar sobre la base de datos: ' . mysql_error());
	}
	else {
		echo "<script language='javascript'>
	window.location = 'agrser.php';
	alert('Se han ingresado exitosamente los datos del servicio');

	</script>";

	}

	$conn->close();

}
?>