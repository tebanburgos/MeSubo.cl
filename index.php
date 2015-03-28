<!DOCTYPE html>



<head>

<?php include 'template/char.php';?>

<meta name="google-site-verification" content="34H24HH0Rb6OHM_mZSvATKFTj5Zg37t2h3Eb3hTVKKs" />

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<meta name="keywords" content="mesubo, recorridos, recorrido, trayecto, temuco, microbuses, micro, micros, buses, bus, colectivo, colectivos, acualmesubo, me, subo, cl, transtemuco, transantiago">

<meta name="author" content="MeSubo">

<meta name="description" content="Sitio web informativo de las rutas de locomoción coletiva en Temuco">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>MeSubo.cl - Recorrido de Microbuses y Taxis Colectivos de Temuco</title>

<link href="css/styles.css" rel="stylesheet" type="text/css">

<!--Demo Colors Override-->

<link id="demo-styles" href="css/styles-defaults.css" rel="stylesheet" type="text/css">

<link rel="shortcut icon" type="image/x-icon" href="logo2.ico" />

<script type="text/javascript" src="js/vendors/modernizr/modernizr.custom.js"></script>

<?php 

include 'conexion/conexion.php';

?> 

<link rel="stylesheet" href="css/leaflet.css" />

<script src="js/leaflet.js"></script>

<script src="js/mq-map.js?key=Fmjtd%7Cluurnuubnu%2Ca5%3Do5-9wrxq6"></script>

<script src="js/mq-geocoding.js?key=Fmjtd%7Cluurnuubnu%2Ca5%3Do5-9wrxq6"></script>

<script type="text/javascript">



            window.onload = function() {
				var nom = [
					<?php 
					$result = mysql_query("SELECT TXT_NEGOCIO FROM M_NEGOCIO WHERE ACTIVO = 1", $link);

					while($row = mysql_fetch_array($result, MYSQL_NUM)) {
						echo '"'.$row[0].'",';
					}
					mysql_free_result($result);
					?>				];
				
				var link = [
					<?php 
					$result = mysql_query("SELECT URL FROM M_NEGOCIO WHERE ACTIVO = 1", $link);

					while($row = mysql_fetch_array($result, MYSQL_NUM)) {
						echo "'";
						echo '<br><center><a href="'.$row[0].'" target="_blank">Saber más</a></center>';
						echo "',";
					}
					mysql_free_result($result);
					?>				];
                MQ.geocode().search([
                          <?php 
					$result = mysql_query("SELECT UBICACION FROM M_NEGOCIO WHERE ACTIVO = 1", $link);

					while($row = mysql_fetch_array($result, MYSQL_NUM)) {
						echo $row[0].',';
					}
					mysql_free_result($result);
					?>])
                    .on('success', function(e) {
                        var results = e.result,
                            html = '',
                            group = [],
                            features,
                            marker,
                            result,
                            latlng,
                            prop,
                            best,
                            val,
                            map,
                            r,
                            i;

                        map = L.map('map', {
                            layers: MQ.mapLayer()
                        });

                        for (i = 0; i < results.length; i++) {
                            result = results[i].best;
                            latlng = result.latlng;



                            // create POI markers for each location
                            marker = L.marker([ latlng.lat, latlng.lng ])
                                .bindPopup(nom[i] + ', ' + result.street + link[i]);

                            group.push(marker);
                        }

                        // add POI markers to the map and zoom to the features
                        features = L.featureGroup(group).addTo(map);
                        map.fitBounds(features.getBounds());


                });
            }


        </script>

</head>



<body>


<!-- Tu ayuda ha sido fundamental, has estado conmigo incluso en los momentos más turbulentos. Este proyecto no fue fácil, pero estuviste motivándome y ayudándome hasta donde tus alcances lo permitían. Te lo agradezco muchísimo, amor. Dedicado a Karina Lezana. A ella, a quien le debo mi apoyo incondicional. Para mi novia y mi futura esposa. -->

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

      

    </div>

  </nav>

  

  <!--/Navigation--> 

  

  <!--MainWrapper-->

  <div class="main-wrap"> 

    

    <!--OffCanvas Menu -->

    <aside class="user-menu"> 

      

      <!-- Tabs -->

      <div class="tabs-offcanvas">

        <ul class="nav nav-tabs nav-justified">

          <li class="active"><a href="#userbar-one" data-toggle="tab">Main</a></li>

          <li><a href="#userbar-two" data-toggle="tab">Users</a></li>

          <li><a href="#userbar-three" data-toggle="tab">ToDo</a></li>

        </ul>

        <div class="tab-content"> 



        </div>

      </div>

      

      <!-- /tabs --> 

      

    </aside>

    <!-- /Offcanvas user menu--> 

    

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

			<div id="titleMap"><span>Sitios de interés en Temuco</span></div>

          <!-- New widget -->

          <div id='map' class='mapQuest'></div>

          <!-- End Widget --> 

          

        </div>


        <!-- /Inner Row Col-md-6 --> 

      </div>
        
      <!-- /Widgets Row End Grid--> 

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