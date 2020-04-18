<?php

header ("Location: https://ernesto2066.github.io/gomsoft/");
//Importamos las variables del formulario de contacto

@$nombre = addslashes($_POST['name']);
@$email = addslashes($_POST['email']);
@$asunto = addslashes($_POST['website']);
@$mensaje = addslashes($_POST['message']);



//Preparamos el mensaje de contacto
$cabeceras = "From: $email\n" //La persona que envia el correo
 . "Reply-To: $email\n";
$asunto = "Mensaje desde la pagina Web"; //asunto aparecera en la bandeja del servidor de correo
$email_to = "ernesto2066@gmail.com"; //cambiar por tu email
$contenido = "$nombre ha enviado un mensaje desde la web www.gomsoft.co\n"
. "\n"
. "Nombre: $nombre\n"
. "Email: $email\n"
. "Sitio Web: $web\n"
. "Mensaje: $mensaje\n"
. "\n";
//Enviamos el mensaje y comprobamos el resultado
@mail($email_to, $asunto ,$contenido ,$cabeceras ) 
 

//Si el mensaje se envía muestra una confirmación
//die("<p>Gracias, su mensaje se envio correctamente.<p><a>http://www.gomsoft.co</a>");
//}else{
//Si el mensaje no se envía muestra el mensaje de error
//die("Error: Su información no pudo ser enviada, intente más tarde");
//}
?>