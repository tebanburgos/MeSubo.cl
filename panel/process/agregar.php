<?php
$func = $_GET['q'];

$link=mysql_connect("localhost","mesubocl_gdmin","mesubo1152");
mysql_select_db("mesubocl_RECTEM",$link);

// funcion para agregar negocio
if ($func == 1) {
	$tipo_neg = $_POST['tiponeg'];
	$nombre_desc = $_POST['nomdesc'];
	
	$sql = "INSERT INTO M_NEGOCIO (COD_TIPO_NEGOCIO, TXT_NEGOCIO)
	VALUES (".$tipo_neg.", '".$nombre_desc."')";
	
	$retval = mysql_query( $sql, $link );
	if(! $retval )
	{
	  die('Se produjo un error al operar sobre la base de datos: ' . mysql_error());
	}
	else {
	echo "<script language='javascript'>
	alert('Se han ingresado exitosamente los datos del negocio');
	window.location.href = 'http://mesubo.cl/panel/agrnega.php';
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
	window.location.href = 'http://mesubo.cl/panel/agrlna.php';
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
	
	$sql = "INSERT INTO M_RECORRIDO (COD_TRANSPORTE, TXT_RECORRIDO, DES_RUTA_IDA, DES_RUTA_VUELTA, IMAGEN_RECORRIDO, ACTIVO) VALUES (".$transporte.",'".$nomrec."','".$IDA."','".$REG."','imagenTest', 1)";

	$sql2 = "UPDATE M_TRANSPORTE SET ACTIVO = 1 where COD_TRANSPORTE = ".$transporte;
	
	$upd = mysql_query( $sql2, $link );
	
	$retval = mysql_query( $sql, $link );
	if(! $retval )
	{
		die('Se produjo un error al operar sobre la base de datos: ' . mysql_error());
	}
	else {
	echo "<script language='javascript'>
	alert('Se han ingresado exitosamente los datos del recorrido');
	window.location.href = 'http://mesubo.cl/panel/agrrec.php';
	</script>";	

	}

	$conn->close();
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
	alert('Se han ingresado exitosamente los datos del transporte');
	window.location = 'agrtra.php';
	</script>";	

	}

	$conn->close();
}
?>