<?php session_start();
$cod = $_POST['usuario'];
$clv = $_POST['clave'];
include 'conexion/conexion.php';
$result = mysql_query("SELECT TXT_NOMBRE FROM M_USUARIO WHERE COD_USUARIO = ".$cod." AND TXT_CLAVE='".md5($clv)."'",$link);
$cantidad=mysql_num_rows($result);
if (1!=$cantidad)
{
	echo "<script language='javascript'>
	alert('Datos incorrectos');
	window.location = 'nimda.php';
	</script>";
}
else
{
	echo "<script language='javascript'>
	window.location = 'panel/nimda.php';
	</script>";
}
?>