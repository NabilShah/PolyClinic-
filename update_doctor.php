<?php
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

// Retrieve data from the form
$doctorName = $_POST['doctorName'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// SQL query to update doctor information
$sql = "UPDATE register SET fullname='$doctorName', username='$username', password='$password', email='$email' WHERE username='$doctor_id'";

if ($conn->query($sql) === TRUE) {
    // Redirect to the doctor list page after successful update
    header("Location: ShowDoctorDetails.php");
} else {
    echo "Error updating record: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
