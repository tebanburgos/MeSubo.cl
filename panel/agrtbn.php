<!DOCTYPE html>
<head>
<?php include 'template/char.php';?>
<meta name="keywords" content="mesubo, recorridos, temuco">
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



				<a class="brand" href="/index.php"><span>MeSubo.cl - Agregar Tipo de banner</a>



								



				



			</div>



		</div>



	</div>







<?php include 'menuadmin.php';

include '../conexion/conexion.php';
?>
<div id="content">
<form class="form-horizontal" action="agregar.php?q=7" method="post">
	<fieldset>
	<legend>Complete el formulario:</legend>

	  	  <div class="control-group">
		<label class="control-label" for="focusedInput">Nombre descriptivo</label>
		<div class="controls">
		  <input class="input-xlarge focused" name="nomtipobanner" required id="focusedInput" type="text" placeholder="Ej: Comida, Viajes, Educación.">
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