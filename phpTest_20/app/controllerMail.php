<?php
session_start(); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "controllerLoad.php";
require 'vendor\autoload.php';


    $mail = new PHPMailer(true);

    $mail->SMTPOptions = array(
    'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    )
);

    //Server settings
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'ruthtest81@gmail.com';
    $mail->Password   = '123456T!';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom('ruthtest81@gmail.com', 'Mailer');
    $mail->addAddress($_SESSION['userLog'], '');

    //Content 
    $mail->isHTML(true);                                  
    $mail->Subject = 'Report from PHP test';
    $mail->Body    = 'You have just processed a CSV file in the application:<br><b>'.$_POST['body'].'</b>';

    $mail->send();


?>