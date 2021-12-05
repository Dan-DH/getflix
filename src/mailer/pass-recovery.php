<?php
include_once('./includes/PHPMailer.php');
include_once('./includes/SMTP.php');
include_once('./includes/Exception.php');

// require './includes/PHPMailer.php';
// require './includes/SMTP.php';
// require './includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = 'true';
$mail->SMTPSecure = 'tls';
$mail->Port = '587';
$mail->Username = 'bxlgetflix@gmail.com';
$mail->Password = 'getflixbxl';
$mail->Subject = 'Getflix: Password recovery';
$mail->setFrom('bxlgetflix@gmail.com');
$mail->isHTML(true);
$mail->Body = 'Please, follow the below link to set a new password:<br>';
$mail->addAddress('b.sabutyte@gmail.com');
if($mail->Send()) {
    echo 'Email sent';
} else {
    echo 'There was an error somewhere';
};
$mail->smtpClose();
