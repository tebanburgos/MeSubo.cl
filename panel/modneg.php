<!DOCTYPE html>
<head>
<?php include 'template/char.php';?>
<meta name="keywords" content="mesubo, recorridos, temuco">
<meta name="author" content="MeSubo">
<meta name="description" content="Sitio web informativo de las rutas de locomocion en Temuco">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>MeSubo.cl - Panel</title>	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">	<link id="base-style" href="css/style.css" rel="stylesheet">	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">	<link href='css/font.css' rel='stylesheet' type='text/css'>	<link rel="shortcut icon" type="image/x-icon" href="logo2.ico" />	<script type="text/javascript" src="js/vendors/modernizr/modernizr.custom.js"></script></head><body><div id="panel">
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
	
        <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
        <script src="http://www.mapquestapi.com/sdk/leaflet/v1.s/mq-map.js?key=Fmjtd%7Cluurnuubnu%2Ca5%3Do5-9wrxq6"></script>
        <script src="http://www.mapquestapi.com/sdk/leaflet/v1.s/mq-routing.js?key=Fmjtd%7Cluurnuubnu%2Ca5%3Do5-9wrxq6"></script>
	

<script type="text/javascript">

window.onload = function() {
    var map,
        dir;

    map = L.map('map', {
        layers: MQ.mapLayer(),
        center: [ -38.7411, -72.5913 ],
        zoom: 14
    });

    dir = MQ.routing.directions();

    dir.route({
        locations: [
            
        ]
        
    });

    CustomRouteLayer = MQ.Routing.RouteLayer.extend({
        createStopMarker: function(location, stopNumber) {
            var custom_icon,
                marker;

            custom_icon = L.icon({
                iconUrl: 'http://www.mapquestapi.com/staticmap/geticon?uri=poi-red_1.png',
                iconSize: [0, 0],
                iconAnchor: [10, 29],
                popupAnchor: [0, -29]
            });

            marker = L.marker(location.latLng, { icon: custom_icon })
                .bindPopup(location.adminArea5 + ' ' + location.adminArea3)
                .openPopup()
                .addTo(map);

            return marker;
        }
    });

    map.addLayer(new CustomRouteLayer({
        directions: dir,
        fitBounds: true,
        draggable: true,
        ribbonOptions: {
            draggable: false,
            ribbonDisplay: { color: '#CC0000', opacity: 1 },
            widths: [ 1 ]
        }
    }));
	var popup = L.popup();

function onMapClick(e) {
popup
.setLatLng(e.latlng)
.setContent("Coordenadas de este punto : " + e.latlng.toString())
.openOn(map);
}
map.on('click', onMapClick);
}
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
            url: 'obt_neg.php',
            data: {codigo: arrastre.value},
            success: function(text){
                LlenarDatos(text,destino,destino2,destino3,arrastre);
            }
        });     
    }
}</script>

<div class="navbar">



		<div class="navbar-inner">



			<div class="container-fluid">



				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>



				</a>



				<a class="brand" href="/index.php"><span>MeSubo.cl - Modificar Negocio</a>



								



				



			</div>



		</div>



	</div>







<?php include 'menuadmin.php';
include '../conexion/conexion.php';
?>

<div id="content">
<form class="form-horizontal" action="modificar.php?q=1" method="post">
	<fieldset>
	<legend>Complete el formulario:</legend>
	
	<div class="control-group">
		<label class="control-label" for="tipoTrans">Seleccionar negocio</label>
		<div class="controls">
		  <select id="tipoTrans" required name="negocio" onchange="obten_datos(this,'nomdesc','url','ubica');">
			<option value="">Seleccione una opcion</option>
		  <?php 
$result = mysql_query("SELECT COD_NEGOCIO, TXT_NEGOCIO FROM M_NEGOCIO", $link);

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
		  <input class="input-xlarge focused" id="nomdesc" name="nomdesc" type="text" placeholder="Nombre comercial">
		</div>
	  </div>
	  
	   <div class="control-group">
		<label class="control-label" for="url">URL</label>
		<div class="controls">
		  <input class="input-xlarge focused" id="url" required name="url" type="text" placeholder="http://www.negocio.dom">
		</div>
	  </div>
	  
	  	<div class="control-group">  
	<div class="control-label" id="map" style='width:850px; height:350px;'></div>
	</div>
	
		  	  	  <div class="control-group">
		<label class="control-label" for="ubica">Ubicacion</label>
		<div class="controls">
		  <input class="input-xlarge focused" id="ubica" required name="ubicacion" type="text" placeholder='"123.345, 345.123"'>
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