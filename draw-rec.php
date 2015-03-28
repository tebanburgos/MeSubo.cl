<?php 

include 'conexion/conexion.php';

?> 

<!DOCTYPE html>



<head>

<?php include 'template/char.php';?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<meta name="keywords" content="mesubo, recorridos, recorrido, trayecto, temuco, microbuses, micro, micros, buses, bus, colectivo, colectivos, acualmesubo, me, subo, cl, transtemuco, transantiago">

<meta name="author" content="MeSubo">

<meta name="description" content="Información relativa al recorrido">

<link href="css/styles.css" rel="stylesheet" type="text/css">

<!--Demo Colors Override-->

<link id="demo-styles" href="css/styles-defaults.css" rel="stylesheet" type="text/css">

<link rel="shortcut icon" type="image/x-icon" href="logo2.ico" />

<script type="text/javascript" src="js/vendors/modernizr/modernizr.custom.js"></script>



<link rel="stylesheet" href="css/leaflet.css" />

<script src="js/leaflet.js"></script>

<script src="js/mq-map.js?key=Fmjtd%7Cluurnuubnu%2Ca5%3Do5-9wrxq6"></script>

<script src="js/mq-routing.js?key=Fmjtd%7Cluurnuubnu%2Ca5%3Do5-9wrxq6"></script>

<script type="text/javascript">





            window.onload = function() {

                var map, map2,

                    dir;



                map = L.map('map', {

                    layers: MQ.mapLayer(),

                    center: [ -38.7411, -72.5913 ],

                    zoom: 13

                });



				map2 = L.map('map2', {

                    layers: MQ.mapLayer(),

                    center: [ -38.7411, -72.5913 ],

                    zoom: 13

                });

				

                dir = MQ.routing.directions();



                dir.route({

                    locations: [

                        <?php 

                        $result = mysql_query("SELECT DES_RUTA_IDA, DES_RUTA_VUELTA, TXT_RECORRIDO, COD_RECORRIDO, ACTIVO FROM M_RECORRIDO WHERE COD_TRANSPORTE = ".$_GET['r'], $link);                      

                        if (1 == mysql_result($result, 0, "ACTIVO")) {

                        	echo mysql_result($result, 0, "DES_RUTA_IDA");

                        }

                        

                        

                        ?>

                    ]

                    

                });
                <?php
 
                				if (0 == mysql_result($result, 0, "ACTIVO")) {
                				
                					echo 'alert("Recorrido no disponible");';
                				
                				}

                				?>        

				dir2 = MQ.routing.directions();



                dir2.route({

                    locations: [

                        <?php 

                        if (1 == mysql_result($result, 0, "ACTIVO")) {

                        	echo mysql_result($result, 0, "DES_RUTA_VUELTA");

                        }                        

                        ?>

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



                        marker = L.marker(location.latLng, { icon: custom_icon });



                        return marker;

                    }

                });



                map.addLayer(new CustomRouteLayer({

                    directions: dir,

                    fitBounds: true,

                    draggable: true,

                    ribbonOptions: {

                        draggable: false,

                        <?php 

                        if ($_GET['s'] == 1) {

                        	echo "ribbonDisplay: { color: '#CC0000', opacity: 1 },";

                        }

                        else if ($_GET['s'] == 2) {

		                	echo "ribbonDisplay: { color: '#0000ff', opacity: 1 },";

		                }

                        else {

		                	echo "ribbonDisplay: { color: '#CC0000', opacity: 1 },";

		                }

		                ?>widths: [ 1 ]

                    }

                }));



				map2.addLayer(new CustomRouteLayer({

                    directions: dir2,

                    fitBounds: true,

                    draggable: true,

                    ribbonOptions: {

                        draggable: false,

                        <?php 

                        if ($_GET['s'] == 1) {

                        	echo "ribbonDisplay: { color: '#CC0000', opacity: 1 },";

                        }

                        else if ($_GET['s'] == 2) {

		                	echo "ribbonDisplay: { color: '#0000ff', opacity: 1 },";

		                }

                        else {

		                	echo "ribbonDisplay: { color: '#0000ff', opacity: 1 },";

		                }

		                ?>widths: [ 1 ]

                    }

                }));





				

            }



        </script>

<title>MeSubo.cl - Información sobre recorrido de la locomoción colectiva en Temuco</title>
</head>



<body>



<!--Smooth Scroll-->

<div class="smooth-overflow"> 

  <!--Navigation-->

  <nav class="main-header clearfix" role="navigation"> <a class="navbar-brand" href="index.php"><span><img id="logo" alt="MeSubo.cl" src="images/logo2_color.png"></span></a> 

    

    <!--Navigation Itself-->

    

    <div class="navbar-content"> 



      <!--Main menu-->

      

     <?php 

      include 'template/menu_nav.php';

      ?>

  </nav>

  

  <!--/Navigation--> 

  

  <!--MainWrapper-->

  <div class="main-wrap"> 



    <!--Main Menu-->

    <div class="responsive-admin-menu">

      <div class="responsive-menu">MeSubo

        <div class="menuicon"><i class="fa fa-angle-down"></i></div>

      </div>

      <?php 

      include 'template/menu.php';

      ?>

    </div>

    <!--/MainMenu-->

    

    <div class="content-wrapper"> 

      <!--Content Wrapper--><!--Horisontal Dropdown-->

      <nav class="cbp-hsmenu-wrapper" id="cbp-hsmenu-wrapper">

        <div class="cbp-hsinner">

          <ul class="cbp-hsmenu">

            

          </ul>

        </div>

      </nav>



      

      <!-- Widget Row Start grid -->

      <div class="row" id="powerwidgets">

        

       

        <!-- /Inner Row Col-md-6 -->

        

        <div class="col-xs-12 bootstrap-grid"> 
        
			<div id="titleMap"><span><?php echo mysql_result($result, 0, "TXT_RECORRIDO")." IDA"; ?> 
			</span>
            
			<div id='map' class='mapQuest'></div>

			</div>

			<div id="titleMap2"><span><?php echo mysql_result($result, 0, "TXT_RECORRIDO"). " REGRESO"; ?> 

			</span>

			<div id='map2' class='mapQuest'></div>
            
			</div>
            <?php
			$result = mysql_query("SELECT IMAGEN_RECORRIDO FROM M_RECORRIDO WHERE COD_TRANSPORTE = ".$_GET['r']." AND ACTIVO = 1", $link); 
			while ($row = mysql_fetch_array ($result))
			{        
echo "            <div class='col-xs-12 boostrap-grid' align='center'> ¿Te es complicado identificar los trayectos? Te invitamos a ver nuestra <a href= '".$row["IMAGEN_RECORRIDO"]."' target='_blank' >vista simple</a> de este recorrido.
            </div>";
			}
			?>
          <!-- New widget -->

          <!-- End Widget --> 

          
        </div>

        <!-- /Inner Row Col-md-6 --> 

      </div>

      <!-- /Widgets Row End Grid--> 
<div id="banner1">
<?php 
$result = mysql_query("SELECT MIN(COD_BANNER) as minimo, MAX(COD_BANNER) as maximo FROM M_BANNER WHERE ACTIVO = 1", $link);

$minimo = mysql_result($result, 0, "minimo");

$maximo = mysql_result($result, 0, "maximo");

$random = rand($minimo, $maximo);

$result2 = mysql_query("SELECT IMAGEN, URL FROM M_BANNER WHERE COD_BANNER = ".$random." AND ACTIVO = 1", $link);

$ruta = mysql_result($result2, 0, "IMAGEN");
$url = mysql_result($result2, 0, "URL");

echo "<a href='".$url."'><img src='".$ruta."'/></a>";
		
?>
</div>
<div id="banner2">
<?php 
$random2 = rand($minimo, $maximo);

$result3 = mysql_query("SELECT IMAGEN, URL FROM M_BANNER WHERE COD_BANNER = ".$random2." AND ACTIVO = 1", $link);

$ruta2 = mysql_result($result3, 0, "IMAGEN");
$url2 = mysql_result($result3, 0, "URL");
echo "<a href='".$url2."'><img src='".$ruta2."'/></a>";
?>
</div>
    </div>


    <!-- / Content Wrapper --> 

  </div>

  <!--/MainWrapper--> 

</div>

<!--/Smooth Scroll--> 



<!--Scripts--> 

<!--GMaps--> 

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 



<!--JQuery--> 

<script type="text/javascript" src="js/vendors/jquery/jquery.min.js"></script> 

<script type="text/javascript" src="js/vendors/jquery/jquery-ui.min.js"></script> 



<!--GMap--> 

<script type="text/javascript" src="js/vendors/gmap/jquery.gmap.js"></script> 



<!--NanoScroller--> 

<script type="text/javascript" src="js/vendors/nanoscroller/jquery.nanoscroller.min.js"></script> 



<!--Sparkline--> 

<script type="text/javascript" src="js/vendors/sparkline/jquery.sparkline.min.js"></script> 



<!--Horizontal Dropdown--> 

<script type="text/javascript" src="js/vendors/horisontal/cbpHorizontalSlideOutMenu.js"></script> 

<script type="text/javascript" src="js/vendors/classie/classie.js"></script> 



<!--PowerWidgets--> 

<script type="text/javascript" src="js/vendors/powerwidgets/powerwidgets.min.js"></script> 



<!--Morris Chart--> 

<script type="text/javascript" src="js/vendors/raphael/raphael-min.js"></script> 

<script type="text/javascript" src="js/vendors/morris/morris.min.js"></script> 



<!--FlotChart--> 

<script type="text/javascript" src="js/vendors/flotchart/jquery.flot.min.js"></script> 

<script type="text/javascript" src="js/vendors/flotchart/jquery.flot.resize.min.js"></script> 

<script type="text/javascript" src="js/vendors/flotchart/jquery.flot.axislabels.js"></script> 

<script type="text/javascript" src="js/vendors/flotchart/jquery.flot-tooltip.js"></script> 



<!--Chart.js--> 

<script type="text/javascript" src="js/vendors/chartjs/chart.min.js"></script> 



<!--Bootstrap--> 

<script type="text/javascript" src="js/vendors/bootstrap/bootstrap.min.js"></script> 



<!--Vector Map--> 

<script type="text/javascript" src="js/vendors/vector-map/jquery.vmap.min.js"></script> 

<script type="text/javascript" src="js/vendors/vector-map/jquery.vmap.sampledata.js"></script> 

<script type="text/javascript" src="js/vendors/vector-map/jquery.vmap.world.js"></script> 



<!--Main App--> 

<script type="text/javascript" src="js/scripts.js"></script>



<!--Switcher-->



<script type="text/javascript" src="js/vendors/demo-switcher/switcher.load.js"></script>  

 



<!--/Scripts-->



</body>

</html>