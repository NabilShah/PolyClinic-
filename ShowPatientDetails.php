<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
  <title>Patient Details</title>
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
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.html"><strong>Home</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="AdminPage.php"><strong>Admin Page</strong></a>
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
      <h2>Patient Details</h2>
    </center>

    <?php
    // Database connection setup (replace with your database configuration)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "polyclinic";

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Handle delete request
    if (isset($_POST['delete'])) {
      $deleteUsername = $_POST['delete'];

      // SQL query to delete the patient record
      $deleteSql = "DELETE FROM register WHERE username = '$deleteUsername'";
      if ($conn->query($deleteSql) === TRUE) {
        echo "Record deleted successfully.";
      } else {
        echo "Error deleting record: " . $conn->error;
      }
    }

    // SQL query to retrieve patient details where username is "user"
    $sql = "SELECT * FROM register WHERE role = 'user'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo '<div class="table-responsive">';
      echo '<table class="table table-hover">';
      echo '<thead>';
      echo '<tr>';
      echo '<th>Full Name</th>';
      echo '<th>Username</th>';
      echo '<th>Password</th>';
      echo '<th>Email</th>';
      echo '<th>Action</th>'; // Added Action column for delete button
      echo '</tr>';
      echo '</thead>';
      echo '<tbody>';

      while ($row = $result->fetch_assoc()) {
        // Extract data for each patient
        $fullName = $row['fullname'];
        $username = $row['username'];
        $email = $row['email'];
        $password = $row['password'];

        // Generate table rows dynamically with delete button
        echo '<tr>';
        echo "<td>$fullName</td>";
        echo "<td>$username</td>";
        echo "<td>$password</td>";
        echo "<td>$email</td>";
        echo '<td>';
        echo '<form action="delete_patientDetails.php" method="POST">';
        echo '<input type="hidden" name="delete" value="' . $username . '">';
        echo '<button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
      }

      echo '</tbody>';
      echo '</table>';
      echo '</div>';
    } else {
      echo "No patient details found for username 'user'.";
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