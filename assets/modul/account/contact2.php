<?php
//Importamos las variables del formulario de contacto

@$nombre = addslashes($_POST['nombre']);
@$email = addslashes($_POST['email']);
@$monto = addslashes($_POST['monto']);
@$mensaje = addslashes($_POST['mensaje']);





//Preparamos el ApellidoInscripto de contacto
$cabeceras = "From: $email\n" //La persona que envia el correo
 . "Reply-To: $email\n";
$asunto = "Mensaje desde la pagina Web"; //asunto aparecera en la bandeja del servidor de correo
$email_to = "$email"; //cambiar por tu email
$contenido = "$nombre ha enviado una inscripcion\n"
. "\n"
. "USER ID: $nombre\n"
. "email: $email\n"
. "monto: $monto\n"
. "mensaje: $mensaje\n"


. "\n";
//Enviamos el ApellidoInscripto y comprobamos el resultado
if (@mail($email_to, $asunto ,$contenido ,$cabeceras )) {

//Si el mensaje se envía muestra una confirmación
die("Gracias, su mensaje se envio correctamente.");
}else{
//Si el mensaje no se envía muestra el mensaje de error
die("Error: Su información no pudo ser enviada, intente más tarde");
}
?>