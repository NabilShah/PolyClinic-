<?php
// Check if the form is submitted
if (isset($_GET["username"])) {
    // Get data from the form
    $doctorName = $_GET["doctorName"];
    $appointmentDate = $_GET["appointment_date"];
    $username = $_GET["username"]; // Get username from URL

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

    // Begin a transaction
    $conn->begin_transaction();

    // SQL query to insert data into the "appointments" table
    $sql = "INSERT INTO appointments (patientName, doctorName, appointment_date)
            VALUES ('$username', '$doctorName', '$appointmentDate')";

    if ($conn->query($sql) === TRUE) {
        // Update the slots in the doctorschedule table
        $updateSql = "UPDATE doctorschedule SET slots = slots - 1 
                      WHERE username = '$doctorName' 
                      AND appointment_date = '$appointmentDate' 
                      AND slots > 0";

        if ($conn->query($updateSql) === TRUE) {
            // Commit the transaction
            $conn->commit();
            header("Location:UserAppointment.php");
        } else {
            // Rollback the transaction if the update fails
            $conn->rollback();
            echo "Error updating slots: " . $conn->error;
        }
    } else {
        // Rollback the transaction if the appointment insertion fails
        $conn->rollback();
        echo "You Maybe Already Have An Appointment check Appointments: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle the case where the form is not submitted
    echo "Form not submitted.";
}
?>