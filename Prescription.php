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
$doctorName = $_GET['doctorName'];
$patientName = $_GET['patientName'];
$medications = $_POST['medications'];
$dosage = $_POST['dosage'];
$addInfo = $_POST['addInfo'];


// Check if a record with the given patientName, doctorName, and today's date already exists
$today = date("Y-m-d H:i:s");
echo $today;
$selectSql = "SELECT * FROM prescription WHERE patientName = ? AND doctorName = ? AND DATE(timestamp) = ?";
$selectStmt = mysqli_prepare($connection, $selectSql);
mysqli_stmt_bind_param($selectStmt, "sss", $patientName, $doctorName, $today);
mysqli_stmt_execute($selectStmt);
$result = mysqli_stmt_get_result($selectStmt);

if (mysqli_num_rows($result) > 0) {
    // A record with the given patientName, doctorName, and today's date already exists
    echo "A prescription record for today already exists for this patient and doctor.";
} else {

    // A prescription was given on the previous day; allow prescribing for today
    $sql = "INSERT INTO prescription (doctorName, patientName, medications, dosage, addInfo, timestamp) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $sql);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "ssssss", $doctorName, $patientName, $medications, $dosage, $addInfo, $today);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Update the 'status' column in the 'appointment' table
        $updateSql = "UPDATE appointments SET status = 'yes' WHERE doctorName = ? AND patientName = ?";
        $updateStmt = mysqli_prepare($connection, $updateSql);

        // Bind parameters to the update statement
        mysqli_stmt_bind_param($updateStmt, "ss", $doctorName, $patientName);

        // Execute the update statement
        if (mysqli_stmt_execute($updateStmt)) {
            header("Location: DoctorPage.php?doctorName=" . urlencode($doctorName) . '&username=' . urlencode($username));
        } else {
            echo "Error updating status: " . mysqli_error($connection);
        }

        // Close the update statement
        mysqli_stmt_close($updateStmt);
    } else {
        echo "Error: " . mysqli_error($connection);
    }

    // Close the insert statement
    mysqli_stmt_close($stmt);

}

// Close the database connection
mysqli_close($connection);
?>