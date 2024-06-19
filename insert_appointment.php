<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $doctorName = $_POST["name"];
    $appointmentDate = $_POST["appointment_date"];
    $startTime = $_POST["start_time"];
    $endTime = $_POST["end_time"];
    $slotsAvailable = $_POST["slots_available"];

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

    // SQL query to insert or update data into the database based on username
    $sql = "INSERT INTO doctorschedule (username, appointment_date, start_time, end_time, slots)
            VALUES ('$doctorName', '$appointmentDate', '$startTime', '$endTime', $slotsAvailable)
            ON DUPLICATE KEY UPDATE
            appointment_date = '$appointmentDate',
            start_time = '$startTime',
            end_time = '$endTime',
            slots = $slotsAvailable";

    if ($conn->query($sql) === TRUE) {
        $username = $_GET['username']; 
        header("Location: DoctorPage.php?username=" . $username);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle the case where the form is not submitted
    echo "Form not submitted.";
}
?>
