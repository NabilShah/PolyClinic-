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

if (isset($_POST['delete'])) {
    $deleteUsername = $_POST['delete'];

    // SQL query to delete the patient record
    $deleteSql = "DELETE FROM register WHERE username = '$deleteUsername'";
    if ($conn->query($deleteSql) === TRUE) {
        header("Location:ShowPatientDetails.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>