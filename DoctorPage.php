<?php
session_start();
if (!isset($_SESSION['doctorName'])) {
  header("Location: index.php");
  exit();
} else {
  if ($_SESSION['role'] != 'doctor') {
    echo "Invalid!";
    exit();
  }
}
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

// Assuming $username is obtained from the URL as in your code
$username = $_SESSION['username'];
$doctorName = $_SESSION['doctorName'];

// SQL query to fetch data from the appointments table for a specific username
$sql = "SELECT * FROM appointments WHERE doctorName = '$doctorName' ";

// Execute the query
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Doctor Page</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
  <style>
    .table-hover tbody tr:hover {
      background-color: #f5f5f5;
      cursor: pointer;
    }

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
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.html"><strong>Home</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link"
                href="DoctorProfile.php?username=<?php echo $username; ?>"><strong>Profile</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link"
                href="ScheduleForm.php?username=<?php echo $username; ?>"><strong>Schedule</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="client_history.php?username=<?php echo $username; ?>"><strong>Client
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
  <main>
    <div class="container mt-4">
      <center>
        <h2>Your Schedules</h2>
      </center>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Sr.No</th>
            <th>Name</th>
            <th>Appointment Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Check if there are any appointments for the user
          if ($result->num_rows > 0) {
            $counter = 1;
            $currentTimestamp = time(); // Get the current timestamp
            while ($row = $result->fetch_assoc()) {
              if ($row['status'] == 'no') {
                $patientName = $row['patientName'];
                $appointmentDateTimestamp = strtotime($row['appointment_date']); // Convert appointment date to timestamp
                // Check if the appointment date is greater than or equal to the current date and time
                if ($appointmentDateTimestamp >= $currentTimestamp) {
                  $appointmentDate = $row['appointment_date'];
                  echo "<tr>";
                  echo "<td>$counter</td>";
                  echo "<td>$patientName</td>";
                  echo "<td>$appointmentDate</td>";
                  echo '<td>';
                  echo '<a class="btn btn-outline-success btn-block fa-lg" type="button" href="PreTest1.php?patientName=' . urlencode($patientName) . '&doctorName=' . urlencode($doctorName) . '&username=' . urlencode($username) . '">Pre-Test</a>';
                  echo '<a class="btn btn-outline-info btn-block fa-lg mx-2" type="button" href="Prescription1.php?patientName=' . urlencode($patientName) . '&doctorName=' . urlencode($doctorName) . '&username=' . urlencode($username) . '">Prescription</a>';
                  echo '</td>';
                  echo "</tr>";
                  $counter++;
                }
              }
            }
          } else {
            echo "<tr><td colspan='3'>No appointments found.</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </main>
  <footer class="fixed-bottom bg-light text-dark text-center">
    <p>&copy; 2023 Guardians. All rights reserved.</p>
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz"
    crossorigin="anonymous"></script>
</body>

</html>

<?php
// Close the database connection
$conn->close();
?>