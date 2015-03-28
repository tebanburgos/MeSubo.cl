<!DOCTYPE html>







<head>



<?php include 'template/char.php';?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<meta name="keywords" content="mesubo, recorridos, recorrido, trayecto, temuco, microbuses, micro, micros, buses, bus, colectivo, colectivos, acualmesubo, me, subo, cl, transtemuco, transantiago">

<meta name="author" content="MeSubo">

<meta name="description" content="Descargo de resposabilidad de MeSubo.cl">


<meta name="viewport" content="width=device-width, initial-scale=1">



<title>MeSubo.cl - Descargo de Responsabilidad</title>



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

                  <h4>Recogida, tratamiento y protección de datos del usuario.</h4>

                  <br>

                  MeSubo.cl archiva únicamente datos personales, relativos a los usuarios del sitio web, con la previa autorización de los mismos. Si usted visita nuestro sitio de internet, nuestro servidor  registra automáticamente la información que no puede ser asociada con ninguna identidad personal. Dicha información podrá incluir, por ejemplo, el nombre del dominio y domicilio IP de la computadora solicitante, la fecha de acceso, la duración de vuestra visita, o el sitio web desde el cual usted nos visita. Estos datos son generalmente recolectados para fines de seguridad del sistema y análisis estadístico, de modo que podamos continuar optimizando nuestro sitio y nuestro servicio.

                  <br>

                  Otra información personal, como su nombre, domicilio, número telefónico o dirección de correo electrónico, no se registran a menos que usted expresamente comunique esta información a nosotros (por ejemplo, mediante el formulario de contacto o por correo electrónico). Si tal es el caso, nosotros no divulgaremos vuestra información a terceros de manera automática, a menos que su divulgación sea requerida de conformidad con la ley aplicable.

                  <br>

                  Acogemos su visita a nuestra página web. Es nuestro propósito ofrecerle el mejor servicio posible. Ello incluye una optimización continua de nuestra presencia en internet y, naturalmente, la protección de vuestra información.

                  <br>

                  <br>

                  <h4>Referencia a la información del sitio.</h4>

                 <br>

                 La información dada por MeSubo.cl es meramente <b>referencial</b> e informativa y no pretende ser exhaustiva.

                 <br>

                 Los datos que se usaron para realizar este sitio web fueron proporcionados por la Dirección de Desarrollo Estudiantil de la Universidad de la Frontera y por la Secretaría Regional Ministerial de Trasportes y Telecomunicación de la IX Región. Esta información está disponible a través de este <a href="http://dde.ufro.cl/index.php?option=com_docman&task=doc_download&gid=94&...">link</a> o a través de en los adhesivos informativos pegados en el interior de los microbuses de la ciudad de Temuco.

                 <br>

                 MeSubo.cl no está, de ninguna de las formas, asociada, afiliada, ni es propiedad de alguna de las entidades de las anteriormente nombradas.

                 <br>

                 Si bien hemos incluido en el sitio web la mayoría de los recorridos la locomoción pública, empresas representativas a el Taxi Colectivo Urbano N°13, el Taxi Colectivo Urbano N°13-A, y el Taxi Colectivo Urbano N°111 Express, se han manifestado expresamente en no aparecer en absoluto en este servicio.

                 <br>

                 Toda la información, tal cual se proporciona, tiene fines exclusivamente informativos sin declaraciones, garantías, condiciones e indemnizaciones de ningún tipo, ni expresas ni implícitas.

                 <br>

                 <br>

                 <h4>Actualización de Información y tratamiento de la página.</h4>

                 <br>

                 Si bien en MeSubo.cl tenemos la política interna de actualizar la página el primer domingo de cada mes, la información contenida en esta Web, así como los productos o las prestaciones de servicios descritos en la misma, podrán ser modificados o actualizados por los administradores del sitio en cualquier momento, sin comunicación previa. Salvo cuando se mencione expresamente, esto no contiene ninguna garantía o información, explícita o implícita, de las que pueda ser responsabilizada.

                 <br>

                 MeSubo.cl declina toda responsabilidad relativa a su Web. La responsabilidad relativa a daños o perjuicios, directos o indirectos, solicitudes de indemnización y/o daños derivados de cualquier naturaleza, sea cual sea la base legal, sufridos como resultado del acceso o la utilización de la Web, particularmente cualquier ataque al ordenador de virus, se encuentran excluidos.

                 <br>

                 <br>

                 <h4>Enlaces a otras páginas Web.</h4>

                 <br>

                 Como servicio adicional, ponemos a su disposición enlaces a páginas Web operadas por terceros. Estas páginas Web son completamente independientes y están fuera del control de MeSubo.cl. MeSubo.cl no se responsabiliza por los contenidos de esas páginas de terceros, a las que puede acceder a través de nuestro sitio, y no acepta ninguna responsabilidad, sea cual sea el contenido, conforme las leyes de protección de datos o el uso de tales páginas.

                 <br>

                 <br>

                 <h4>Marca registrada y Derechos de autor</h4>

                 <br>

                 La marca registrada y el logotipo ("trademarks") presentes en esta Web son propiedad de MeSubo.cl. Ninguna información contenida en esta Web podrá ser interpretada en el sentido de que se conceden licencias o permisos de utilización de las marcas registradas. Para ello, se exige el expreso consentimiento de MeSubo.cl. Queda estrictamente prohibido utilizar, sin autorización, esta marca registrada. MeSubo.cl, reclamará sus derechos de propiedad intelectual en todo el mundo, de conformidad con la legislación aplicable en cada caso. Copyright © MeSubo.cl. Todos los derechos reservados.

                 <br>

                 Todos los textos, imágenes, gráficos, animaciones, vídeos, música, sonidos y otro material incluido en este sitio Web, están sujetos a derechos de autor y a otros derechos de propiedad intelectual de MeSubo.cl. MeSubo.cl es propietaria de los derechos de autor para la selección, coordinación y organización de la información contenida en esta página Web. Estas informaciones no pueden ser copiadas para uso comercial o distribución. Ni pueden ser modificadas o trasmitidas a otras páginas Web.

                 <br>

                 <br>

                 <br>

                 <br>

                 <br>

                 <br>

                 <br>

                 <div class="content" align="right"> Administradores de MeSubo.cl </div>
                 <br>
<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img alt="Licencia Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">MeSubo.cl</span> por <a xmlns:cc="http://creativecommons.org/ns#" href="http://www.teban.cl/" property="cc:attributionName" rel="cc:attributionURL">Esteban Nicolás Burgos Viveros</a> se distribuye bajo una <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">Licencia Creative Commons Atribución-NoComercial-SinDerivar 4.0 Internacional</a>.
             

                   

                  <br>  </p>

                 <br>

                 <br>

                 <br>

                </div>



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