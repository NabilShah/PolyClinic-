<?php
$id = $_POST["id"];
$name = $_POST["name"];
$uemail = $_POST["email"];
$reply = $_POST["reply"];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\Polyclinic 2.0\PHPMailer\src\Exception.php';
require 'C:\xampp\htdocs\Polyclinic 2.0\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\Polyclinic 2.0\PHPMailer\src\SMTP.php';

$mail = new PHPMailer(true);

$email = 'nabilshahpubg@gmail.com';
$password = 'iwggoihwpvnvdkpx';

try {
    // Configure SMTP settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $email;
    $mail->Password = $password;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipient information
    $mail->setFrom($email, 'Guardians');
    $mail->addAddress($uemail, $name);
    $mail->addReplyTo($email, 'Guardians');

    //Attachments
    //Add attachments
    // $mail->addAttachment('Chrysanthemum.jpg', 'Chrysanthemum.jpg');

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'Reply for your query from Guardians.';
    $mail->Body = $reply;

    $mail->send();
    header("Location:contactdetails.php");
} catch (Exception $e) {
    echo 'Failed to send email: ', $mail->ErrorInfo;
}
?>