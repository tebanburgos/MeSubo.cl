<?php
$func = $_GET['q'];

$link=mysql_connect("localhost","mesubocl_gdmin","mesubo1152");
mysql_select_db("mesubocl_RECTEM",$link);

// Eliminar negocio
if ($func == 1) {
	$negocio = $_POST['negocio'];
	$nombre_desc = $_POST['nomdesc'];
	
	$sql = "UPDATE M_NEGOCIO SET ACTIVO = 0 WHERE COD_NEGOCIO = ".$negocio;
	
	$retval = mysql_query( $sql, $link );
	if(! $retval )
	{
	  die('Se produjo un error al operar sobre la base de datos: ' . mysql_error());
	}
	else {
	echo "<script language='javascript'>
	alert('Se han eliminado exitosamente los datos del negocio');
	window.location = 'elineg.php';
	</script>";	

	}
	
	$conn->close();
}
// Eliminar linea
if ($func == 2) {
	$linea = $_POST['linea'];

	$sql = "UPDATE M_LINEA SET ACTIVO = 0 WHERE COD_NUM_LINEA =".$linea;
	
	$retval = mysql_query( $sql, $link );
	if(! $retval )
	{
		die('Se produjo un error al operar sobre la base de datos: ' . mysql_error());
	}
	else {
	echo "<script language='javascript'>
	alert('Se han modificado exitosamente los datos de la linea');
	window.location = 'elilna.php';
	</script>";	
	}
	
	$conn->close();
}
// Eliminar recorrido
if ($func == 3) {
	$recorrido = $_POST['recorrido'];

	$sql = "UPDATE M_TRANSPORTE SET ACTIVO = 0 WHERE COD_TRANSPORTE = ".$recorrido;
		
	$retval = mysql_query( $sql, $link );
	if(! $retval )
	{
		die('Se produjo un error al operar sobre la base de datos: ' . mysql_error());
	}
	else {
	echo "<script language='javascript'>
	alert('Se han eliminado exitosamente los datos del recorrido');
	window.location = 'elirec.php';
	</script>";	

	}

	$conn->close();
}
// Eliminar Transporte
if ($func == 4) {
	$trans = $_POST['trans'];
		
	$sql = "UPDATE M_TRANSPORTE SET ACTIVO = 0 WHERE COD_TRANSPORTE = ".$trans;

	$retval = mysql_query( $sql, $link );
	if(! $retval )
	{
		die('Se produjo un error al operar sobre la base de datos: ' . mysql_error());
	}
	else {
	echo "<script language='javascript'>
	window.location = 'elitra.php';
	alert('Se han modificado exitosamente los datos del transporte');

	</script>";	

	}

	$conn->close();
}
// Eliminar Banner
if ($func == 5) {
	$banner = $_POST['banner'];
	
	$sql = "UPDATE M_BANNER SET ACTIVO = 0 WHERE COD_BANNER =".$banner;
	
	$retval = mysql_query( $sql, $link );
	if(! $retval )
	{
		die('Se produjo un error al operar sobre la base de datos: ' . mysql_error());
	}
	else {
		echo "<script language='javascript'>
	window.location = 'eliban.php';
	alert('Se han modificado exitosamente los datos del banner');
	
	</script>";
	
	}
	
	$conn->close();
	
}
// Eliminar servicio
if ($func == 6) {
	$servicio = $_POST['servicio'];


	$sql = "UPDATE M_SERVICIO SET ACTIVO = 0 WHERE COD_SERVICIO = ".$servicio;

	$retval = mysql_query( $sql, $link );
	if(! $retval )
	{
		die('Se produjo un error al operar sobre la base de datos: ' . mysql_error());
	}
	else {
		echo "<script language='javascript'>
	window.location = 'eliser.php';
	alert('Se han eliminado exitosamente los datos del servicio');

	</script>";

	}

	$conn->close();

}
// Eliminar tipo banner
if ($func == 7) {
	$tipoban = $_POST['tipoban'];


	$sql = "UPDATE M_TIPO_BANNER SET ACTIVO = 0 WHERE COD_TIPO_BANNER = ".$tipoban;

	$retval = mysql_query( $sql, $link );
	if(! $retval )
	{
		die('Se produjo un error al operar sobre la base de datos: ' . mysql_error());
	}
	else {
		echo "<script language='javascript'>
	window.location = 'elitbn.php';
	alert('Se han eliminado exitosamente los datos del tipo de banner');

	</script>";

	}

	$conn->close();

}
// Eliminar tipo transporte
if ($func == 8) {
	$tipotra = $_POST['tipotra'];


	$sql = "UPDATE M_TIPO_TRANSPORTE SET ACTIVO = 0 WHERE COD_TIPO_TRANSPORTE = ".$tipotra;

	$retval = mysql_query( $sql, $link );
	if(! $retval )
	{
		die('Se produjo un error al operar sobre la base de datos: ' . mysql_error());
	}
	else {
		echo "<script language='javascript'>
	window.location = 'elitpt.php';
	alert('Se han eliminado exitosamente los datos del tipo de transporte');

	</script>";

	}

	$conn->close();

}

?>