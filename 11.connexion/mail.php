<?php  
require "PHPMailer/PHPMailerAutoload.php";
/** 
 * Cette fonction créer un token unique
 * @param int $length
 * @return string
 */

function GenerateToken($length) {
    $token = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    return substr(str_shuffle(str_repeat($token, $length)), 0, $length);
}

/**
 * Fonction envoie de mail
 * @param string $email
 * @param string $msg
 * @param string $objet
 * @param string $name
 * @return void
 */

function SendEmail($email, $msg, $objet, $name) {
        $from = "dwwm.auboue@hotmail.com";

        $mail = new PHPMailer();
        $mail -> isSMTP();
        $mail -> SMTPAuth = true;

        $mail -> SMTPSecure = 'tls';
        $mail-> Host = 'smtp-mail.outlook.com';
        $mail->Port = 587;
        $mail-> Username = $from;
        $mail-> Password = 'DWWMauboue';

        $mail->isHTML();
        $mail->From = $from;
        $mail->FromName = $name;
        $mail->Sender = $from;
        $mail->addReplyTo($from, $name);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = $objet;
        $mail-> Body = $msg;
        $mail->addAddress($email);
        

        if(!$mail->Send()) {
            echo "le mail ne c'est pas envoyé, ressayer plus tard";
        } else {
            echo "le mail c'est envoyé avec succès";
        }

    
    // $msg = "Lien pour reinitialiser votre mot de passe : http://localhost:8888/presentielle/11.connexion/reset.php?id=$id&token=$token";
    // smtpmailer($email, 'dwwm.auboue@hotmail.com', $name, $objet , $msg);
}


?>

