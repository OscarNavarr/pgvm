<?php
//IMPORT THE Exception FILE FROM INCLUDES FOLDER

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "../includes/Exception.php";
        
//IMPORT THE PHPMailer FILE FROM INCLUDES FOLDER
require_once "../includes/PHPMailer.php";

//IMPORT THE SMTP FILE FROM INCLUDES FOLDER
require_once "../includes/SMTP.php";

//CREATE NEW INSTANCE OF PHPMailer CLASS
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'farruleskendokaponi@gmail.com';                     //SMTP username
    $mail->Password   = 'pbyqozgewkntqnti';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('farruleskendokaponi@gmail.com', 'PGVM');
    $mail->addAddress('alejandronavarroaviles@gmail.com', '');     //Add a recipient
    $mail->addReplyTo('farruleskendokaponi@gmail.com', 'PGVM');


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold! from aplication PGVM</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo json_encode('Message has been sent');
} catch (Exception $e) {
    die( json_encode("Error: " . $e->getMessage()));
}