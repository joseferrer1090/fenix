<?php 
require "./phpmailer/vendor/autoload.php";
//require './phpmailer/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer();

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'a2plcpnl0751.prod.iad2.secureserver.net';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'noresponder@bvaults.com';                 // SMTP username
$mail->Password = 'bvaults2017$$';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('noresponder@bvaults.com','B-VAULT');
$mail->addAddress('danykyroz@hotmail.com','DANIEL QUIROZ');
$mail->AddCC('support@bvaults.com','Support');
     // Add a recipient
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Pruebas Hotmail';
$mail->Body    = 'Esto es el cuerpo del mensaje';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>