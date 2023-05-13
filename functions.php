<?php
// functions.php

function fetch_emails() {
    // Fetch emails from MailHog API
    $ch = curl_init('http://localhost:8025/api/v2/messages');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $emails = json_decode($response, true);

    return $emails;
}



require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function send_mail($from, $fromName, $to, $toName, $subject, $body, $altBody)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'localhost';
        $mail->SMTPAuth = false;
        $mail->Port = 1025;

        //Recipients
        $mail->setFrom($from, $fromName);
        $mail->addAddress($to, $toName);

        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = $altBody;

        $mail->send();
        return 'Message has been sent';
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
function set_dark_mode_cookie($value) {
    setcookie("dark_mode", $value, time() + (86400 * 30), "/"); // 86400 = 1 day
}