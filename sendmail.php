<?php
// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include library files 
require 'mail/src/Exception.php';
require 'mail/src/PHPMailer.php';
require 'mail/src/SMTP.php';

// Create an instance; Pass `true` to enable exceptions 
$mail = new PHPMailer;

// Server settings 
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;    //Enable verbose debug output 
$mail->isSMTP(); // Set mailer to use SMTP 
$mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers 
$mail->SMTPAuth = true; // Enable SMTP authentication 
$mail->Username = 'yuvaraj.webrixtec@gmail.com'; // SMTP username 
$mail->Password = 'irmlwgtlbjzvnaki'; // app password  get gmail
$mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 465; // TCP port to connect to 

// Sender info 
$mail->setFrom('demo@example.com', 'SenderName');
//$mail->addReplyTo('reply@example.com', 'SenderName'); 

// Add a recipient 
$mail->addAddress('reemaprincess478@gmail.com');

//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 

// Set email format to HTML 
$mail->isHTML(true);

// Mail subject 
$mail->Subject = 'THANKS FOR SUBSCRIBING SHANMUGAR FUNDS ';

// Mail body content 
$bodyContent = '<h1>contact form message</h1>';



$mail->Body = $bodyContent;

// Send email 
if ($mail->send()) {
    echo "<script> location.href='./index.php'; </script>";
    // header("Location:./index.html");

} else {
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
}



?>