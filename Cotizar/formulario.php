<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $ahorro = $_POST["ahorro"];
    $frecuencia = $_POST["frecuencia"];
    $correo = $_POST["correo"];

    // Dirección de correo electrónico donde se enviará el mensaje
    $destinatario = "contacto@haconsulting.mx";

    // Asunto del correo electrónico
    $asunto = "Solicitud de de plan de ahorro desde haconsulting.mx";

    // Contenido del correo electrónico
    $contenido = "Nombre: $nombre\n";
    $contenido .= "Edad: $edad años\n";
    $contenido .= "Monto de ahorro deseado: $ahorro\n";
    $contenido .= "Frecuencia de ahorro: ";
    switch ($frecuencia) {
        case "1":
            $contenido .= "Al mes";
            break;
        case "7":
            $contenido .= "Al trimestre";
            break;
        case "30":
            $contenido .= "Al semestre";
            break;
        case "365":
            $contenido .= "Al año";
            break;
    }
    $contenido .= "\nCorreo electrónico: $correo";

    // Headers del correo
    $headers = "From: $correo";

    if (mail($destinatario, $asunto, $contenido, $headers)) {
        // Redirecciona a una página de agradecimiento en caso de éxito
        header('Location: /exito.html');
        exit();
    } else {
        header('Location: /fallo.html');
        exit();
    }
}
?>