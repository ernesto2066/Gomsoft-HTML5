<?php
#Metodo para el envio de correos desde la pagina web
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
    # Definir la dirección de destino de gomsoft
    $dest = "jorge@gomsoft.tech"; 
    $mensaje_correo = "Nombre: $nombre\nCorreo electrónico: $correo\nAsunto: $asunto\nMensaje:\n$mensaje";
    $cabeceras = "From: $correo\r\n";
    $cabeceras .= "Reply-To: $correo\r\n";

    if (mail($dest, $asunto, $mensaje_correo, $cabeceras)) {
        # Validacion para confirmar el envio de correo electronico de manera correcta
        echo "<p>El mensaje ha sido enviado correctamente</p>";
    } else {
        # Confirmacion si encuentra algun error en el envio de correo
        echo "<p>Ha habido un error al enviar el mensaje</p>";
    }
} else {
    # Confirmacion si encuentra algun error en el envio de correo
    header("Location: index.html");
    echo "<p>Algo salió mal en el envió del correo</p>";
    exit;
}
?>