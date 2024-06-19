<?php
// Replace these database connection details with your own
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'polyclinic';

// Create a database connection
$connection = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$username = $_GET['username'];
echo $username;
$doctorName = $_GET['doctorName'];
$patientName = $_GET['patientName'];
$age = $_POST['age'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$gender = $_POST['gender'];
$symptoms = $_POST['symptoms'];

// Prepare and execute the SQL query to insert data into the 'pretest' table
$sql = "INSERT INTO pretest (doctorName , patientName , age, height, weight, gender, symptoms) VALUES (?,?,?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($connection, $sql);

// Bind parameters to the prepared statement
mysqli_stmt_bind_param($stmt, "ssddsss", $doctorName, $patientName, $age, $height, $weight, $gender, $symptoms);

// Execute the statement
if (mysqli_stmt_execute($stmt)) {
    header("Location: DoctorPage.php?doctorName=" . urlencode($doctorName) . '&username=' . urlencode($username));
} else {
    echo "Error: " . mysqli_error($connection);
}

// Close the statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($connection);
?>
