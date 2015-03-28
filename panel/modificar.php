<?php
$func = $_GET['q'];

$link=mysql_connect("localhost","mesubocl_gdmin","mesubo1152");
mysql_select_db("mesubocl_RECTEM",$link);

// Modificar negocio
if ($func == 1) {
	$negocio = $_POST['negocio'];
	$accion = $_POST['accion'];

	$sql = "UPDATE M_NEGOCIO SET ACTIVO = ".$accion." WHERE COD_NEGOCIO = ".$negocio;
	
	$retval = mysql_query( $sql, $link );
	if(! $retval )
	{
	  die('Se produjo un error al operar sobre la base de datos: ' . mysql_error());
	}
	else {
	echo "<script language='javascript'>
	alert('Se han modificado exitosamente los datos del negocio');
	window.location = 'modneg.php';
	</script>";	

	}
	
	$conn->close();
}
// Modificar linea
if ($func == 2) {
	$linea = $_POST['linea'];
	$nomlinea = $_POST['nomlinea'];
	$accion = $_POST['accion'];

	$sql = "UPDATE INTO M_LINEA SET TXT_LINEA = '".$nomlinea."', ACTIVO = ".$accion." WHERE COD_NUM_LINEA = ".$linea;
	
	$retval = mysql_query( $sql, $link );
	if(! $retval )
	{
		die('Se produjo un error al operar sobre la base de datos: ' . mysql_error());
	}
	else {
	echo "<script language='javascript'>
	alert('Se han modificado exitosamente los datos de la linea');
	window.location = 'modlna.php';
	</script>";	
	}
	
	$conn->close();
}
// Agregar recorrido
if ($func == 3) {
	$recorrido = $_POST['recorrido'];
	$transporte = $_POST['transporte'];
	$nomdesc = $_POST['nomdesc'];
	$IDA = $_POST['IDA'];
	$REG = $_POST['REG'];
	$foto = $_POST['foto'];
	$accion = $_POST['accion'];
	
	$sql = "UPDATE M_RECORRIDO SET TXT_RECORRIDO = '".$nomdesc."', DES_RUTA_IDA = '".$IDA."', DES_RUTA_VUELTA ='".$REG."', IMAGEN_RECORRIDO = '".$foto."', ACTIVO = ".$accion." WHERE COD_RECORRIDO = ".$recorrido.")";
	
	$retval = mysql_query( $sql, $link );
	if(! $retval )
	{
		die('Se produjo un error al operar sobre la base de datos: ' . mysql_error());
	}
	else {
	echo "<script language='javascript'>
	alert('Se han modificado exitosamente los datos del recorrido');
	window.location = 'modrec.php';
	</script>";	

	}

	$conn->close();
}
// Modificar Transporte
if ($func == 4) {
	$trans = $_POST['trans'];
	$tipotrans = $_POST['tipotrans'];
	$servicio = $_POST['servicio'];
	$linea = $_POST['linea'];
	$nomdesc = $_POST['nomdesc'];
	$accion = $_POST['accion'];
	
	$sql = "UPDATE M_TRANSPORTE SET COD_TIPO_TRANSPORTE=".$tipotrans.", COD_SERVICIO=".$servicio.", COD_NUM_LINEA=".$linea.", TXT_TRANSPORTE='".$linea."', ACTIVO=".$accion." WHERE COD_TRANSPORTE =".$trans;

	$retval = mysql_query( $sql, $link );
	if(! $retval )
	{
		die('Se produjo un error al operar sobre la base de datos: ' . mysql_error());
	}
	else {
	echo "<script language='javascript'>
	window.location = 'modtra.php';
	alert('Se han modificado exitosamente los datos del transporte');

	</script>";	

	}

	$conn->close();
}
// Agregar Banner
if ($func == 5) {
	$banner = $_POST['banner'];
	$tipobanner = $_POST['tipoban'];
	$nombrebanner = $_POST['nomdesc'];
	$fotobanner = $_FILES['fotobanner']['name'];
	$urlbanner = $_POST['urlban'];
	$accion = $_POST['accion'];
	
		
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
					$sql = "UPDATE M_BANNER SET TXT_BANNER = '".$nombrebanner."', URL = '".$urlbanner."', IMAGEN = 'images/banner/".$fotobanner."', ACTIVO = '".$accion."', COD_TIPO_BANNER ='".$tipobanner."' WHERE COD_BANNER = ".$banner;
	
					$retval = mysql_query( $sql, $link );
					if(! $retval )
						{
							die('Se produjo un error al operar sobre la base de datos: ' . mysql_error());
						}
					else {
						echo "<script language='javascript'>
						window.location = 'modban.php';
						alert('Se han modificado exitosamente los datos del banner');	
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
	$tipotra = $_POST['tipotra'];
	$nametptrans = $_POST['nametptrans'];
	$accion = $_POST['accion'];


	$sql = "UPDATE M_TIPO_TRANSPORTE SET TXT_TIPO_TRANSPORTE ='".$nametptrans."', ACTIVO =".$accion." WHERE COD_TIPO_TRANSPORTE = ".$tipotra;

	$retval = mysql_query( $sql, $link );
	if(! $retval )
	{
		die('Se produjo un error al operar sobre la base de datos: ' . mysql_error());
	}
	else {
		echo "<script language='javascript'>
	window.location = 'modtpt.php';
	alert('Se han modificado exitosamente los datos del tipo de transporte');

	</script>";

	}

	$conn->close();

}
// Modificar Tipo banner
if ($func == 7) {
	$tipoban = $_POST['TipoBan'];
	$nomtipobanner = $_POST['nomtipobanner'];
	$accion = $_POST['accion'];

	$sql = "UPDATE M_TIPO_BANNER SET TXT_TIPO_BANNER= '".$nomtipobanner."', ACTIVO = ".$accion." WHERE COD_TIPO_BANNER=".$tipoban;

	$retval = mysql_query( $sql, $link );
	if(! $retval )
	{
		die('Se produjo un error al operar sobre la base de datos: ' . mysql_error());
	}
	else {
		echo "<script language='javascript'>
	window.location = 'modtbn.php';
	alert('Se han modificado exitosamente los datos del tipo de banner');

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
// Modificar Sevicio
if ($func == 9) {
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
?>