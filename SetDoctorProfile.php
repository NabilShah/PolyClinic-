<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $username = $_GET["username"];
    $specialty = $_POST["specialty"];
    $qualifications = $_POST["qualifications"];

    // Database connection setup (replace with your database configuration)
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "polyclinic";

    // Create a database connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to update Specialty and Qualifications
    $sql = "UPDATE doctorschedule SET specialty = '$specialty', qualifications = '$qualifications' WHERE username = '$username'";

    if ($conn->query($sql) === TRUE) {
        header("Location: DoctorPage.php");
    } else {
        echo "Error updating data: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle the case where the form is not submitted
    echo "Form not submitted.";
}
?>