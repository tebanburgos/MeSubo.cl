<!DOCTYPE html>
<head>
<?php include 'template/char.php';?>
<meta name="keywords" content="mesubo, recorridos, temuco">
<meta name="author" content="MeSubo">
<meta name="description" content="Sitio web informativo de las rutas de locomocion en Temuco">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">
//funcion que limpia los demas campos
function LimpiarInput(destino,destino2)
{
    destino.value="";   
}
//funcion que llena los datos 
function LlenarDatos(text,destino,destino2,destino3,arrastre)
{
    var datos = text.split('|'); //dividimos los datos para colocarlos en el lugar correcto     
    destino.value = datos[0];
    destino2.value= datos[1];
    destino3.value= datos[2];

}   
//fucion con la cual obtenemos  los datos 
function obten_datos(arrastre,destino,destino2,destino3)
{   
//     alert("arrastre: "+arrastre.value+" destino: "+destino+" destino2: "+destino2+" destino3: "+destino3+" destino4: "+destino4);
    destino = document.getElementById(destino);
    destino2 = document.getElementById(destino2);
    destino3 = document.getElementById(destino3);
    LimpiarInput(destino);
    LimpiarInput(destino2);
    LimpiarInput(destino3);
    if(arrastre.value != 0)
    {

        $.ajax({
            type: 'get',
            dataType: 'text',
            url: 'obt_ban.php',
            data: {codigo: arrastre.value},
            success: function(text){
                LlenarDatos(text,destino,destino2,destino3,arrastre);
            }
        });     
    }
}
</script>
<title>MeSubo.cl - Modificar Banner</title>	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">	<link id="base-style" href="css/style.css" rel="stylesheet">	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>	<link rel="shortcut icon" type="image/x-icon" href="logo2.ico" />	<script type="text/javascript" src="js/vendors/modernizr/modernizr.custom.js"></script></head><body><div id="panel">



<div class="navbar">



		<div class="navbar-inner">



			<div class="container-fluid">



				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>



				</a>



				<a class="brand" href="/index.php"><span>MeSubo.cl - Modificar Banner</a>

			</div>

		</div>

	</div>


<?php include 'menuadmin.php';
include '../conexion/conexion.php';
?>

<div id="content">
<form class="form-horizontal">
	<fieldset>
	<legend>Complete el formulario:</legend>
	
		<div class="control-group">
		<label class="control-label" for="selectError3">Banner</label>
		<div class="controls">
		  <select id="banner" name="banner" required onchange="obten_datos(this,'tipoban','nomdesc', 'urlban');">
			<option value="">Seleccione una opcion</option>
		  <?php 
$result = mysql_query("SELECT COD_BANNER, TXT_BANNER FROM M_BANNER", $link);

while($row = mysql_fetch_array($result, MYSQL_NUM)) {
	echo "<option value='".$row[0]."'>".$row[1]."</option>";
}
mysql_free_result($result);
?>	
		  </select>
		</div>
	  </div>
	
	<div class="control-group">
		<label class="control-label" for="selectError3">Tipo banner</label>
		<div class="controls">
		  <select id="tipoban" required name="tipoban">
			<option value="">Seleccione una opcion</option>
		  <?php 
$result = mysql_query("SELECT COD_TIPO_BANNER, TXT_TIPO_BANNER FROM M_TIPO_BANNER", $link);

while($row = mysql_fetch_array($result, MYSQL_NUM)) {
	echo "<option value='".$row[0]."'>".$row[1]."</option>";
}
mysql_free_result($result);
?>	
		  </select>
		</div>
	  </div>
	  	  <div class="control-group">
		<label class="control-label" for="nomdesc">Nombre descriptivo</label>
		<div class="controls">
		  <input class="input-xlarge focused" id="nomdesc" required name="nomdesc" type="text" placeholder="Nombre comercial">
		</div>
	  </div>
	  	  	  <div class="control-group">
		<label class="control-label" for="urlban">Url</label>
		<div class="controls">
		  <input class="input-xlarge focused" id="urlban" required name="urlban" type="text" placeholder="Url banner">
		</div>
	  </div>
	  <div class="control-group">
		<label class="control-label">Imagen</label>
		<div class="controls">
		  <input type="file" required>
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