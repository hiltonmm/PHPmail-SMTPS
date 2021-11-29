<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require 'phpmailer/autoload.php';

function enviaMail($desinatario, $assunto, $menssagem){
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->Host = 'smtp.mail.us-east-1.awsapps.com'; //SERVIDOR SMTP
    $mail->Port = 465; //POTRTA
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->SMTPAuth = true;
    $mail->Username = 'EMAILDEAUTENTICACAO@EMAIL.COM'; // SEU EMAIL DE AUTENTICAÇÃO
    $mail->Password = '*******'; // SUA SENHA
    $mail->setFrom('SEUEMAIL@MAIL.COM', 'SEU NOME');
    $mail->addReplyTo('RESPONDERPARA@MAIL.COM'); // ESSA LINHA É OPCIONAL
    $mail->addAddress($desinatario);
    $mail->Subject = utf8_decode($assunto);
    $mail->msgHTML(utf8_decode($menssagem));


    if (!$mail->send()) {
        //return 'Mailer Error: ' . $mail->ErrorInfo;
        return false;
    } else {
        return true;

    }
}
//EXEMPLO DE USO
enviaMail('EMAILDESTINATARIO@MAIL.COM', 'ASSUNTO', 'MENSSAGEM QUE PODE SER UM HTML COMPLEXO COM CSS');