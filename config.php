<?php
// local conenection

$servername = "127.0.0.12:4306";
$username = "root";
$password = "1234567890";
$database = "shanmugar";
// Create connection
$db = new mysqli($servername, $username, $password, $database);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}


// server connection

// $servername = "localhost";
// $username = "adcbcoin_shanmugarfunds";
// $password = "![.H4p+nd7bM";
// $database = "adcbcoin_shanmugar";
// // Create connection
// $db = new mysqli($servername, $username, $password, $database);

// // Check connection
// if ($db->connect_error) {
//     die("Connection failed: " . $db->connect_error);
// }


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
$mail->Password = 'nfttfcptgfosivjz'; // app password  get gmail
$mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 465; // TCP port to connect to 
// irmlwgtlbjzvnaki
// Sender info 
$mail->setFrom('demo@example.com', 'SenderName');

// Razorpay details
// $keyId = 'rzp_test_9TB3asShG3RvdV';
// $keySecret = 'rzp_live_gQEoo5mjQ0LDGG';
// $displayCurrency = 'INR';
?>