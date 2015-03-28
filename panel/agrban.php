<!DOCTYPE html>
<head>
<?php @include 'template/char.php';?>
<meta name="keywords" content="mesubo, recorridos, temuco">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="MeSubo">
<meta name="description" content="Sitio web informativo de las rutas de locomocion en Temuco">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>MeSubo.cl - Panel</title>	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">	
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">	
<link id="base-style" href="css/style.css" rel="stylesheet">	
<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">	
<link href='css/font.css' rel='stylesheet' type='text/css'>	
<link rel="shortcut icon" type="image/x-icon" href="logo2.ico" />	
<script type="text/javascript" src="js/vendors/modernizr/modernizr.custom.js"></script>
</head>

<body>
<div id="panel">

<div class="navbar">



		<div class="navbar-inner">



			<div class="container-fluid">



				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>



				</a>



				<a class="brand" href="/index.php"><span>MeSubo.cl - Agregar Banner</a>



								



				



			</div>



		</div>



	</div>







<?php include 'menuadmin.php';

include '../conexion/conexion.php';
?>
<div id="content">
<form class="form-horizontal" action="agregar.php?q=5" method="post" enctype="multipart/form-data">
	<fieldset>
	<legend>Complete el formulario:</legend>
	<div class="control-group">
		<label class="control-label" for="selectError3">Tipo de publicidad</label>
		<div class="controls">
		  <select id="tipoTrans" name="tipobanner" required>
			<option value="">Seleccione una opcion</option>
		  <?php 
$result = mysql_query("SELECT COD_TIPO_BANNER, TXT_TIPO_BANNER FROM M_TIPO_BANNER WHERE ACTIVO = 1", $link);

while($row = mysql_fetch_array($result, MYSQL_NUM)) {
	echo "<option value='".$row[0]."'>".$row[1]."</option>";
}
mysql_free_result($result);
?>	
		  </select>
		</div>
	  </div>
	  	  <div class="control-group">
		<label class="control-label" for="focusedInput">Nombre descriptivo</label>
		<div class="controls">
		  <input class="input-xlarge focused" name="nombrebanner" required id="focusedInput" type="text" placeholder="Nombre comercial">
		</div>
	  </div>
	  
  	  <div class="control-group">
		<label class="control-label" for="focusedInput">Url banner</label>
		<div class="controls">
		  <input class="input-xlarge focused" name="urlbanner" required id="focusedInput" type="text" placeholder="https://www.negocio.dom/">
		</div>
	  </div>
	  
	  <div class="control-group">
		<label class="control-label">Imagen</label>
		<div class="controls">
		  <input type="file" name="fotobanner" id="fotobanner" required>
		</div>
	  </div>
	  <div class="form-actions">
		<button type="submit" class="btn btn-primary">Agregar</button>
		<button type="reset" class="btn">Limpiar</button>
	  </div>
	</fieldset>
  </form>
</div>




		<script src="js/bootstrap.min.js"></script>

		<script src="js/jquery-1.9.1.min.js"></script>

		<script src="js/custom.js"></script>



</body>







</html>