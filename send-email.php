<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Get form data
$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
    $mail->isSMTP(); // Send using SMTP
    $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'haseburh12@gmail.com'; // SMTP username
    $mail->Password = 'hlxc ewvv hwuv cefz'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port = 587; // TCP port to connect to

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('darksanvi@gmail.com', 'Sanvi'); // Add a recipient

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = $subject;

    // Format email body
    $bodyContent = "<h1>Contact Form Submission</h1>";
    $bodyContent .= "<p><strong>Name:</strong> {$name}</p>";
    $bodyContent .= "<p><strong>Email:</strong> {$email}</p>";
    $bodyContent .= "<p><strong>Subject:</strong> {$subject}</p>";
    $bodyContent .= "<p><strong>Message:</strong><br>{$message}</p>";

    $mail->Body = $bodyContent;

    // Send email
    $mail->send();
    echo 'Message has been sent';
    header("Location: sent.html");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
