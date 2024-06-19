<?php
session_start();
// Database connection setup (replace with your database configuration)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "polyclinic";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Receive the doctor's ID from the URL
$doctor_id = $_GET['id'];

// SQL query to delete the doctor record by ID
$sql = "DELETE FROM register WHERE username = '$doctor_id'";

if ($conn->query($sql) === TRUE) {
    header("Location: ShowDoctorDetails.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

// Close the database connection
$conn->close();
?>