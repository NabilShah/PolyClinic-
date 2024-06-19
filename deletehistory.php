<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['username'])) {
    $username = $_GET['username'];

    // Replace 'hostname', 'username', 'password', and 'database_name' with your actual database credentials
    $db = new mysqli('localhost', 'root', '', 'polyclinic');

    // Check for a successful connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $query = "DELETE FROM appointments WHERE patientName = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $username);

    if ($stmt->execute()) {
        echo "Record for username '$username' deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
    $db->close();
} else {
    echo "Invalid request.";
}
?>