<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
} else {
  if ($_SESSION['role'] != 'user') {
    echo "Invalid!";
    exit();
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
  <title>User Page</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
  <style>
    .navbar .navbar-brand {
      padding: 0;
      font-size: 25px;
      font-weight: 500;
      letter-spacing: -0.5px;
      margin-right: 20px;

    }

    .navbar .navbar-brand h4 {
      margin: 0;
      font-family: "Poppins", sans-serif;
    }

    .navbar .nav-item {
      margin-right: 40px;
      font-size: 14px;
      font-weight: 500;
      letter-spacing: -0.5px;
      padding-right: 22px;
      padding-left: 22px;
      font-family: "Poppins", sans-serif;
    }


    .nav-item :hover {
      color: blue;
    }

    .gradient-custom-2 {
      background-color: #dbf26e;
      background-image: linear-gradient(319deg,
          #b4c369 0%,
          #4ec65c 35%,
          #37ac98 80%);
    }

    .btn-outline-success:hover {
      background-color: #dbf26e;
      background-image: linear-gradient(319deg,
          #b4c369 0%,
          #4ec65c 35%,
          #37ac98 80%);
    }



    @media (min-width: 768px) {
      .gradient-form {
        height: auto !important;
      }
    }

    @media (min-width: 769px) {
      .gradient-custom-2 {
        border-top-right-radius: 0.3rem;
        border-bottom-right-radius: 0.3rem;
      }
    }

    @media screen and (min-width: 992px) {
      .nav-item {
        line-height: 50px;
      }
    }
  </style>
</head>


<body>
  <header>
    <!-- place navbar here -->
    <nav class="navbar  navbar-expand-md navbar-light bg-light m-0 p-0">
      <div class="container my-0">
        <a class="navbar-brand" href="#">
          Guardians
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
          <ul class="navbar-nav" <?php $username = $_SESSION['username'];
          ?>>
            <li class="nav-item">
              <a class="nav-link" href="index.html"><strong>Home</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link"
                href="UserAppointment.php?username=<?php echo $username; ?>"><strong>Appointments</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="AppointmentHistory.php?username=<?php echo $username; ?>"><strong>Appointment
                  History</strong></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="Logout.php"><strong>Logout</strong></a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
  </header>
  <div class="container mt-4">
    <center>
      <h2>Doctor Schedule</h2>
    </center>

    <?php
    // Database connection setup (replace with your database configuration)
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "polyclinic";
    $username = $_SESSION['username'];
    // Create a database connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to retrieve data from the doctorschedule table
    $sql = "SELECT * FROM doctorschedule";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        // Extract data for each record
        $doctorName = $row['username'];
        $specialty = $row['specialty'];
        $qualifications = $row['qualifications'];
        $appointmentDate = $row['appointment_date'];
        $startTime = $row['start_time'];
        $endTime = $row['end_time'];
        $slot = $row['slots'];
        $today = date('Y-m-d');

        // Generate a card for each record
    
        if (strtotime($appointmentDate) >= strtotime($today) && $slot != 0) {
          // Generate a card for each record
          echo '<div class="card mb-3">';
          echo '<div class="card-body">';
          echo "<h5 class='card-title'>Dr. $doctorName</h5>";
          echo "<p class='card-text'>Specialty: $specialty</p>";
          echo "<p class='card-text'>Qualifications: $qualifications</p>";
          echo "<p class='card-text'>Availability Date: $appointmentDate</p>";
          echo "<p class='card-text'>Start Time: $startTime</p>";
          echo "<p class='card-text'>End Time: $endTime</p>";
          echo "<p class='card-text'>Slots: $slot</p>";
          echo '<input type="hidden" name="doctorName" value="' . $doctorName . '">';
          echo '<input type="hidden" name="appointment_date" value="' . $appointmentDate . '">';
          echo '<a href="make_appointment.php?doctorName=' . urlencode($doctorName) . '&appointment_date=' . urlencode($appointmentDate) . '&username=' . urlencode($username) . '" class="btn btn-outline-primary">Make Appointment</a>';
          echo '</div>';
          echo '</div>';
        }
      }
    } else {
      echo "No doctor schedules found.";
    }

    // Close the database connection
    $conn->close();
    ?>
  </div>
  <footer class="fixed-bottom bg-light text-dark text-center">
    <p>&copy; 2023 Guardians. All rights reserved.</p>
  </footer>
  <!-- Include Bootstrap JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>