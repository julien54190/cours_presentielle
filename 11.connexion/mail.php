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

function SendEmail($id, $token, $email) {
    function smtpmailer($to, $from, $from_name, $subject, $body) {
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
        $mail->FromName = $from_name;
        $mail->Sender = $from;
        $mail->addReplyTo($from, $from_name);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = $subject;
        $mail-> Body = $body;
        $mail->addAddress($to);
        

        if(!$mail->Send()) {
            echo "le mail ne c'est pas envoyé, ressayer plus tard";
        } else {
            echo "le mail c'est envoyé avec succès";
        }

    }
    $msg = "Lien pour reinitialiser votre mot de passe : http://localhost:8888/presentielle/11.connexion/reset.php?id=$id&token=$token";
    smtpmailer($email, 'dwwm.auboue@hotmail.com', 'mot de passe', 'Rénitiallisez votre mot de passe  ', $msg);
}


?>

