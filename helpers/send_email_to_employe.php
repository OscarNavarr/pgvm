<?php

header('Content-Type: application/json');
//IMPORT THE Exception FILE FROM INCLUDES FOLDER

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST)){
    

    require_once "../includes/Exception.php";
            
    //IMPORT THE PHPMailer FILE FROM INCLUDES FOLDER
    require_once "../includes/PHPMailer.php";

    //IMPORT THE SMTP FILE FROM INCLUDES FOLDER
    require_once "../includes/SMTP.php";

    //CREATE NEW INSTANCE OF PHPMailer CLASS
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'farruleskendokaponi@gmail.com';                     //SMTP username
        $mail->Password   = 'pbyqozgewkntqnti';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->CharSet = 'UTF-8';

        //Recipients
        $mail->setFrom('farruleskendokaponi@gmail.com', 'PGVM');
        $mail->addAddress($_POST["email"], '');     //Add a recipient
        $mail->addReplyTo('farruleskendokaponi@gmail.com', 'PGVM');


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Nouveau rendez-vous médical';
        $mail->Body    = 'Un nouveau rendez-vous médical a été créé pour vous le <b>' . $_POST["date"] . '</b> à <b>' . $_POST["time"] . '</b>';
        $mail->AltBody = 'Un nouveau rendez-vous médical a été créé pour vous le ' . $_POST["date"] . ' à ' . $_POST["time"] . '';

        $mail->send();

        echo json_encode("Le message a été envoyé");

    } catch (Exception $e) {
        die( json_encode("Error: " . $e->getMessage()));
    }
}