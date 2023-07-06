<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    //IMPORT THE Exception FILE FROM INCLUDES FOLDER
    require_once "../includes/Exception.php";
        
    //IMPORT THE PHPMailer FILE FROM INCLUDES FOLDER
    require_once "../includes/PHPMailer.php";
    
    //IMPORT THE SMTP FILE FROM INCLUDES FOLDER
    require_once "../includes/SMTP.php";

    

    class EmailSender {
        
        
    
        public function send_email_to_employe($instance,$email_employé, $subject, $message) {
            try {

               //Server settings
               $instance->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
               $instance->isSMTP();                                            //Send using SMTP
               $instance->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
               $instance->SMTPAuth   = true;                                   //Enable SMTP authentication
               $instance->Username   = 'farruleskendokaponi@gmail.com';                     //SMTP username
               $instance->Password   = 'pbyqozgewkntqnti';                               //SMTP password
               $instance->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
               $instance->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

               //Recipients
               $instance->setFrom('farruleskendokaponi@gmail.com', 'PGVM');
               $instance->addAddress('alejandronavarroaviles@gmail.com', '');     //Add a recipient
               $instance->addReplyTo('farruleskendokaponi@gmail.com', 'PGVM');

           
               //Content
               $instance->isHTML(true);                                  //Set email format to HTML
               $instance->Subject = 'Here is the subject';
               $instance->Body    = 'This is the HTML message body <b>in bold! from aplication PGVM</b>';
               $instance->AltBody = 'This is the body in plain text for non-HTML mail clients';

               $instance->send();
               echo json_encode("Email envoyé");
            } catch (Exception $e) {
                echo json_encode("Email pas envoyé: ". $e->getMessage());
            }
        }
    }