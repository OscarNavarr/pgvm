<?php
    $destinatario = 'alejandronavarroaviles@gmail.com';
    $asunto = 'Prueba de correo electrónico';
    $mensaje = 'Este es un ejemplo de correo electrónico enviado desde PHP.';
    
    $remitente = 'farruleskendokaponi@gmail.com'; // Dirección de correo electrónico del remitente
    $clave = 'Administrad0r*'; // Contraseña de la cuenta de correo electrónico del remitente
    
    // Cabeceras del correo electrónico
    $headers = 'From: ' . $remitente . "\r\n" .
        'Reply-To: ' . $remitente . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    
    // Configuración adicional para enviar correo mediante SMTP en Gmail
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "Content-Transfer-Encoding: 8bit\r\n";
    $headers .= "X-Priority: 1\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    
    // Configuración de autenticación SMTP
    $headers .= 'SMTPAuth: true' . "\r\n";
    $headers .= 'Username: ' . $remitente . "\r\n";
    $headers .= 'Password: ' . $clave . "\r\n";
    
    // Envío del correo electrónico
    if (mail($destinatario, $asunto, $mensaje, $headers)) {
        echo 'El correo electrónico se envió correctamente ahora.';
    } else {
        echo 'Hubo un error al enviar el correo electrónico.';
    }
?>