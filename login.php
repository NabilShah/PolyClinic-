<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection setup (replace with your database configuration)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "PolyClinic";

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform SQL query to check if the user exists
    $sql = "SELECT * FROM register WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User authenticated, fetch the role from the database
        $row = $result->fetch_assoc();
        $role = $row['role'];

        // Set session variables
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        // Redirect based on the role
        if ($role == 'doctor') {
            $_SESSION['doctorName']=$row['fullname'];
            header("Location: DoctorPage.php");
            // Redirect doctors to DoctorPage
        } elseif ($role == 'admin') {
            header("Location: AdminPage.php"); // Redirect admins to AdminPage
        } else {
            header("Location: UserPage.php"); // Redirect others to UserPage
        }
        $_SESSION['LoginError']="";
    } else {
        // Authentication failed, show an error message
        $_SESSION['LoginError']="Invalid Credentials!!";
        header("Location: index.php");
    }

    // Close the database connection
    $conn->close();
}
?>
