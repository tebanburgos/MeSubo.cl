<?php session_start();?>
<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MeSubo.cl - Panel</title>
<link href="css/styles-min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/nimda.js"></script>
<!--Demo Colors Override-->
<link rel="shortcut icon" type="image/x-icon" href="logo2.ico" />

</head>

<body>
<?php
if (isset($_SESSION['er'])) {
echo "<div id='error'>Usuario o contraseña incorrectos</div>";
unset($_SESSION['er']);
}
?>
<div id="login">
<h1>Ingresar</h1>
<form action="inc.php" method="post">
<input type="text" name="usuario" placeholder="Usuario" required/>
<input type="password" name="clave" placeholder="Contraseña" required/>
<input type="submit" value="Aceptar" />
</form>
</div>
</body>
</html>