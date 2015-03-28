<?php
//Importamos las variables del formulario de contacto
include 'template/char.php';
@$name = $_POST['name'];
@$email = $_POST['email'];
@$subject = $_POST['subject'];
@$comments = $_POST['comments'];
//Preparamos el mensaje de contacto
$cabeceras = "From: ".$email."\n"; //La persona que envia el correo
//$asunto = "Mensaje desde la pagina Web"; //asunto aparecera en la bandeja del servidor de correo
$destino = "mesubo.contacto@gmail.com"; //cambiar por tu email
$contenido = "$name ha enviado un mensaje desde el formulario de contacto de MeSubo.cl\n"
. "\n"
. "Nombre: $name\n"
. "Email: $email\n"
. "Mensaje: $comments\n"
. "\n";
 
//Enviamos el mensaje y comprobamos el resultado
if (@mail($destino, $subject ,$contenido)) {
echo "<script language='javascript'>
alert('Gracias por contactarse con nosotros. En poco tiempo tendrás una respuesta a su pregunta, inquietud o sugerencia.');
window.location.href = 'http://mesubo.cl';
</script>";
} else {
echo "<script language='javascript'>
alert('Fallo de envío. Por favor, intente nuevamente');
window.location.href = 'http://mesubo.cl/contacto.php';
</script>";
}
?>