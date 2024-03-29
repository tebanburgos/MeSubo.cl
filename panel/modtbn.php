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

<script type="text/javascript">

function asigna(sel) {
		document.getElementById('focusedInput').value = sel.options[sel.selectedIndex].text
}

</script>
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



				<a class="brand" href="/index.php"><span>MeSubo.cl - Modificar Tipo de banner</a>



								



				



			</div>



		</div>



	</div>







<?php include 'menuadmin.php';

include '../conexion/conexion.php';
?>
<div id="content">
<form class="form-horizontal" action="modificar.php?q=7" method="post">
	<fieldset>
	<legend>Complete el formulario:</legend>

	<div class="control-group">		
<label class="control-label" for="TipoBan">Seleccione Tipo banner</label>		
<div class="controls">		  
<select id="tipoBan" onChange="asigna(this);" required name="TipoBan">			
<option value ="">Seleccione una opcion</option>			
<?php 
$result = mysql_query("SELECT COD_TIPO_BANNER, TXT_TIPO_BANNER FROM M_TIPO_BANNER", $link);

while($row = mysql_fetch_array($result, MYSQL_NUM)) {
	echo "<option value='".$row[0]."'>".$row[1]."</option>";
}
mysql_free_result($result);
?>	  
</select>		</div>	  </div>
	
	  	  <div class="control-group">
		<label class="control-label" for="focusedInput">Nombre descriptivo</label>
		<div class="controls">
		  <input class="input-xlarge focused" name="nomtipobanner" required id="focusedInput" type="text" placeholder="Ej: Comida, Viajes, Educación.">
		</div>
	  </div>
	  
	  <div class="control-group">		
<label class="control-label" for="selectError3">Estado</label>		
<div class="controls">		  
<select id="servicio" name="accion" required>		
<option value ="">Seleccione una opcion</option>			
<option value="1">Habilitar</option>			
<option value="0">Deshabilitar</option>			
		  </select>		</div>	  </div>	 

	  <div class="form-actions">
		<button type="submit" class="btn btn-primary">Modificar</button>
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