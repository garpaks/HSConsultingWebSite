<?php 
$nombre = $_POST['nombre'];
$email = $_POST['correo'];
$telefono = $_POST['telefono'];
$sobreque = $_POST['sobreque'];

// Cuerpo de mail
$mensaje = "Este mensaje es enviado por " . $nombre . ",\r\n";
$mensaje .= "El asunto del que quiere informacion es sobre " . $sobreque . ",\r\n";
$mensaje .= "Su Email es " . $email . ",\r\n";
$mensaje .= "Su teléfono es " . $telefono . ",\r\n";

$destinatario = 'contacto@haconsulting.mx';
$asunto = 'Asesoría solicitada desde haconsulting.mx';

// Encabezados del correo
$headers = "From: $email";

// Función mail
if (mail($destinatario, $asunto, $mensaje, $headers)) {
    // Redirecciona a una página de agradecimiento en caso de éxito
    header('Location: /exito.html');
    exit();
} else {
    header('Location: /fallo.html');
    exit();
}
?>