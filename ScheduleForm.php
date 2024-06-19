<?php
// Check if username is set in the URL
if (isset($_GET['username'])) {
    $username = $_GET['username'];

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

    // Query to retrieve the doctor's name based on the username
    $query = "SELECT * FROM register WHERE username = '$username'";

    // Execute the query
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Fetch the doctor's name
        $row = $result->fetch_assoc();
        $doctorName = $row['fullname'];

        // Close the database connection
        $conn->close();
    } else {
        // Handle the case where the username doesn't exist in the table
        echo "Doctor not found for username: $username";
        exit; // Terminate the script
    }
} else {
    // Handle the case where the username is not set in the URL
    echo "Username not provided in the URL.";
    exit; // Terminate the script
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <title>Doctor Appointment Form</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <!-- <style>
        .btn-outline-success:hover {
        background-color: #dbf26e;
        background-image: linear-gradient(
          319deg,
          #b4c369 0%,
          #4ec65c 35%,
          #37ac98 80%
        );
      }
    </style> -->
</head>

<body>
    <div class="container mt-5">
        <h2>Doctor Appointment Form</h2>
        <form action="insert_appointment.php?username=<?php echo $username; ?>&doctorName=<?php echo $doctorName; ?> "
            method="POST">
            <input type="text" name="name" value="<?php echo $doctorName; ?> " hidden>
            <div class="mb-3">
                <label for="name" class="form-label">Doctor Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $doctorName; ?> "
                    disabled required readonly>
            </div>
            <div class="mb-3">
                <label for="appointment_date" class="form-label">Appointment Date:</label>
                <input type="date" class="form-control" id="appointment_date" name="appointment_date" required>
            </div>
            <div class="mb-3">
                <label for="start_time" class="form-label">Start Time:</label>
                <input type="time" class="form-control" id="start_time" name="start_time" required>
            </div>
            <div class="mb-3">
                <label for="end_time" class="form-label">End Time:</label>
                <input type="time" class="form-control" id="end_time" name="end_time" required>
            </div>
            <div class="mb-3">
                <label for="slots_available" class="form-label">Slots Available:</label>
                <input type="number" class="form-control" id="slots_available" name="slots_available" required>
            </div>
            <button type="submit" class="btn btn-outline-success">Submit</button>
        </form>
    </div>
    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>