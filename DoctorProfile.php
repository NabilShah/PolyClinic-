<?php
// Check if username is set in the URL
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

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
        $email = $row['email'];
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
    <title>Doctor Information Form</title>
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
        <h2>Doctor Information Form</h2>
        <form action="SetDoctorProfile.php?username=<?php echo $doctorName; ?>" method="POST">
            <div class="mb-3">
                <label for="doctorName" class="form-label">Doctor Name:</label>
                <input type="text" class="form-control" id="doctorName" name="doctorName"
                    value="<?php echo $doctorName; ?>" disabled required>
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" value="<?php echo $username; ?>" name="username"
                    disabled required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" value="<?php echo $email; ?>" name="email" disabled
                    required>
            </div>

            <div class="mb-3">
                <label for="specialty" class="form-label">Specialty:</label>
                <input type="text" class="form-control" id="specialty" name="specialty" required>
            </div>

            <div class="mb-3">
                <label for="qualifications" class="form-label">Qualifications:</label>
                <textarea class="form-control" id="qualifications" name="qualifications" rows="3" required></textarea>
            </div>

            <button type="submit" class="btn btn-outline-success">Submit</button>
        </form>
    </div>
    <footer class="fixed-bottom bg-light text-dark text-center">
        <p>&copy; 2023 Guardians. All rights reserved.</p>
    </footer>
    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>