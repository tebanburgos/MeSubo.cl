<!DOCTYPE html>



<head>

<?php include 'template/char.php';?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<meta name="keywords" content="mesubo, recorridos, recorrido, trayecto, temuco, microbuses, micro, micros, buses, bus, colectivo, colectivos, acualmesubo, me, subo, cl, transtemuco, transantiago">

<meta name="author" content="MeSubo">

<meta name="description" content="Contáctate con nosotros">

<title>MeSubo.cl - Contacto</title>

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

                var map,

                    dir;



                map = L.map('map', {

                    layers: MQ.mapLayer(),

                    center: [ -38.7411, -72.5913 ],

                    zoom: 13

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



            }



        </script>

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

			

          <!-- New widget -->
          <div class="content" align="justify">
            <p>
                <br>
                <br>
                Si quieres contactarte con nosostros, puedes hacerlo directamente a <b>mesubo.contacto@gmail.com</b>.
                <br>
                Si quieres contactarnos por temas de publicidad escríbenos y te haremos llegar el mediakit con los valores y espacios que tenemos disponibles.
                <br>
                O si prefieres puedes escribirnos a través de este formulario:
                <br>
            </p>
          </div>
          
                <form name="frmContacto" method="post" enctype="multipart/form-data" action="sendbymail.php">
					<table width="700px">
						<tr>
							<td>
								<label for="name">Nombre: (requerido)</label>
							</td>
							<td>
								<input type="text" name="name" maxlength="50" size="40" required>
							</td>
						</tr>
						
            <tr>
              <td>
                <label for="email">E-mail: (requerido)</label>
              </td>
              <td>
                <input type="email" name="email" maxlength="80" size="40" required>
              </td>
            </tr>
            <tr>
              <td>
                <label for="subject">Asunto: (requerido)</label>
              </td>
              <td>
                <select name="subject" required>
                  <option value ="Publicidad">Consulta sobre publicidad</option>
                  <option value ="Sugerencia_Reclamo_Felicitaciones">Sugerencias, reclamos y/o felicitaciones</option>
                  <option value ="Otro">Otro</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>
                <label for="comments">Mensaje: (requerido) </label>
              </td>
              <td>
                <textarea name="comments" maxlength="1000" cols="40" rows="10" required></textarea>
              </td>
            </tr>
            <tr>
              <td colspan="2" style="text-align:right">
                <input type="submit" value="Enviar">
                <br>
                <br>
              </td>
            </tr>
          </table>
</form>

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