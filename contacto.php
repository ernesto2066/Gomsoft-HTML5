<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    # Guardar los datos recibidos en variables validando el metodo post de ingreso de datos del formulario html
    $nombre = $_POST['name'];
    $correo = $_POST['email'];
    $asunto = $_POST['subject'];
    $mensaje = $_POST['message'];

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        # Validación de la estructura del correo electronico
        echo "<p>La dirección de correo electrónico no es válida</p>";
        exit;
    }
    if (empty($nombre)) {
        # Validación de la estructura del formulario de contacto
        echo "<p>El campo de nombre es obligatorio</p>";
        exit;
    }
    if (empty($mensaje)) {
        # Validación de la estructura del formulario de contacto
        echo "<p>El campo de mensaje es obligatorio</p>";
        exit;
    }
    # Definir la dirección de destino:
    $dest = "jorge@gomsoft.co"; 
    $mensaje_correo = "Nombre: $nombre\nCorreo electrónico: $correo\nAsunto: $asunto\nMensaje:\n$mensaje";
    $cabeceras = "From: $correo\r\n";
    $cabeceras .= "Reply-To: $correo\r\n";

    if (mail($dest, $asunto, $mensaje_correo, $cabeceras)) {
        # code...
        echo "<p>El mensaje ha sido enviado correctamente</p>";
    } else {
        # code...
        echo "<p>Ha habido un error al enviar el mensaje</p>";
    }


} else {
    # code...
    header("Location: index.html");
    echo "<p>Algo salió mal en el envió del correo</p>";
    exit;
}
/*
// Estas son cabeceras que se usan para evitar que el correo llegue a SPAM:
$headers = "From: $nombre $correo\r\n";
$headers .= "X-Mailer: PHP5\n";
$headers .= 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Aqui definimos el asunto y armamos el cuerpo del mensaje
$cuerpo = "Nombre: ".$nombre."<br>";
$cuerpo .= "Email: ".$correo."<br>";
$cuerpo .= "Asunto: ".$asunto."<br>";
$cuerpo .= "Mensaje: ".$mensaje;

// Esta es una pequena validación, que solo envie el correo si todas las variables tiene algo de contenido:
if($nombre != '' && $correo != '' && $asunto != '' && $mensaje != ''){
    mail($dest,$asunto,$cuerpo,$headers); //ENVIAR!
}*/
?>