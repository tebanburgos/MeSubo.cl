<!DOCTYPE html>

<head>



<?php include 'template/char.php';?>



<meta name="keywords" content="mesubo, recorridos, temuco">



<meta name="author" content="MeSubo">



<meta name="description" content="Sitio web informativo de las rutas de locomocion en Temuco">



<meta name="viewport" content="width=device-width, initial-scale=1">



<title>MeSubo.cl - Panel</title>



	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">

	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">

	<link id="base-style" href="css/style.css" rel="stylesheet">

	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">

<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>

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

				<a class="brand" href="/index.php"><span>MeSubo.cl - Agregar Linea</a>

								

				

			</div>

		</div>

	</div>



<?php include 'menuadmin.php';?>
<div id="content">
<form class="form-horizontal" action="agregar.php?q=2" method="post">	
<fieldset>	
<legend>Complete el formulario:</legend>	
<div class="control-group">		
<label class="control-label" for="focusedInput">Nombre descriptivo</label>		
<div class="controls">		  
<input class="input-xlarge focused" name="nomlinea" id="focusedInput" required type="text" placeholder="Linea 4, Colectivo 111">		</div>	  </div>	  		
 <div class="form-actions">		<button type="submit" class="btn btn-primary">Agregar</button>		<button type="reset" class="btn">Limpiar</button>	  </div>	</fieldset>  </form></div>



		<script src="js/jquery-1.9.1.min.js"></script>

	<script src="js/jquery-migrate-1.0.0.min.js"></script>

	

		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>

	

		<script src="js/jquery.ui.touch-punch.js"></script>

	

		<script src="js/modernizr.js"></script>

	

		<script src="js/bootstrap.min.js"></script>

	

		<script src="js/jquery.cookie.js"></script>

	

		<script src='js/fullcalendar.min.js'></script>

	

		<script src='js/jquery.dataTables.min.js'></script>



		<script src="js/excanvas.js"></script>

	<script src="js/jquery.flot.js"></script>

	<script src="js/jquery.flot.pie.js"></script>

	<script src="js/jquery.flot.stack.js"></script>

	<script src="js/jquery.flot.resize.min.js"></script>

	

		<script src="js/jquery.chosen.min.js"></script>

	

		<script src="js/jquery.uniform.min.js"></script>

		

		<script src="js/jquery.cleditor.min.js"></script>

	

		<script src="js/jquery.noty.js"></script>

	

		<script src="js/jquery.elfinder.min.js"></script>

	

		<script src="js/jquery.raty.min.js"></script>

	

		<script src="js/jquery.iphone.toggle.js"></script>

	

		<script src="js/jquery.uploadify-3.1.min.js"></script>

	

		<script src="js/jquery.gritter.min.js"></script>

	

		<script src="js/jquery.imagesloaded.js"></script>

	

		<script src="js/jquery.masonry.min.js"></script>

	

		<script src="js/jquery.knob.modified.js"></script>

	

		<script src="js/jquery.sparkline.min.js"></script>

	

		<script src="js/counter.js"></script>

	

		<script src="js/retina.js"></script>



		<script src="js/custom.js"></script>

</body>



</html>