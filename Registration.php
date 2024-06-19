<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\Xampp\htdocs\Polyclinic 2.0\PHPMailer\src\Exception.php';
require 'C:\Xampp\htdocs\Polyclinic 2.0\PHPMailer\src\PHPMailer.php';
require 'C:\Xampp\htdocs\Polyclinic 2.0\PHPMailer\src\SMTP.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password']; // Added confirm password field
    $role = $_POST['role'];
    if ($role == "") {
        $role = "user";
    }
    $fullname = $_POST['fullname'];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "Passwords do not match. Please try again.";
        exit; // Stop further processing
    }

    // Database connection setup (replace with your database configuration)
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "PolyClinic";

    // Create a database connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Perform SQL query to insert user data into the database
    $sql = "INSERT INTO register (username, email, password, role, fullname) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $username, $email, $password, $role, $fullname);

    if ($stmt->execute()) {
        // Registration successful, now send a confirmation email

        // Configure SMTP settings for Gmail (replace with your email service)
        $mail = new PHPMailer(true);

        $senderEmail = 'nabilshahpubg@gmail.com'; // Replace with your email
        $senderPassword = 'iwggoihwpvnvdkpx'; // Replace with your email password

        try {
            // SMTP settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = $senderEmail;
            $mail->Password = $senderPassword;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Sender and recipient
            $mail->setFrom($senderEmail);
            $mail->addAddress($email, $fullname);
            $mail->addReplyTo($senderEmail, 'Guardians');
            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Account Registered';
            $mail->Body = 'Thank you for registering. You can now login.';

            $mail->send();
            header("Location: index.php");
        } catch (Exception $e) {
            echo 'Failed to send email: ', $mail->ErrorInfo;
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>