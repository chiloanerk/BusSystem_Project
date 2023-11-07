<?php

namespace app\classes;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require base_path('/vendor/autoload.php');

class Emailer
{
    public function sendEmail($recipientName, $recipientEmail, $subject, $message, $pdfFile = null)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'safetransict3715@gmail.com';                     //SMTP username
            $mail->Password = 'umdyizwltjsvzxdw';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port = 465;

            // Recipient
            $recipientEmail = 'safetransict3715@gmail.com';
            $mail->setFrom('safetransict3715@gmail.com', 'SafeTrans');
            $mail->addAddress($recipientEmail, $recipientName);

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;

            // Attachment
            if ($pdfFile !== null) {
                $mail->addAttachment($pdfFile, 'registration.pdf');
            }

            if ($mail->send()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Message could not be send. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}