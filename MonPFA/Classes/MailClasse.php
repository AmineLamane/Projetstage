<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer/PHPMailerAutoload.php';


class MailClasse{
    
    public static function fctsendMail($reciver,$cc,$subject,$body){
        
        //Load Composer's autoloader
        
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            
            $mail->isSMTP();// Set mailer to use SMTP
            $mail->CharSet = "utf-8";// set charset to utf8
            $mail->SMTPAuth = true;// Enable SMTP authentication
            $mail->SMTPSecure = 'tls';// Enable TLS encryption, `ssl` also accepted
            
            $mail->Host = 'smtp.gmail.com';// Specify main and backup SMTP servers
            $mail->Port = 587;// TCP port to connect to
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->isHTML(true);// Set email format to HTML
            
            $mail->Username = 'hellouserphp20@gmail.com';// SMTP username
            $mail->Password = 'adminphp2021';// SMTP password
            
            $mail->setFrom('hellouserphp20@gmail.com', 'APPLICATION POUR LA GESTION DES PFA');//Your application NAME and EMAIL
            $mail->Subject = $subject;//Message subject
            $mail->MsgHTML($body);// Message body
            $mail->addAddress($reciver);
            if(is_array($cc)){
                foreach ($cc as $copy){
                    $mail->addCC($copy);
                }
            }
           
            $mail->send();
            echo "<script>alert('Votre demande est envoyee vous avez 48h avant de choisir un autre binome.Merci pour votre comprension   ')</script>";
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
        
    }
}

