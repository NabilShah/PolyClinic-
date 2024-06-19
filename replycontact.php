<?php

$id = $_GET["id"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "polyclinic";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch all contact information from the database
$sql = "SELECT * FROM contact WHERE `id` = $id";
$result = $conn->query($sql);
$rows = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="en">

<head>
  <title>Reply</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
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

    .container1 {
      display: block;
      max-width: 800px;
      margin: 30px auto;
      padding: 40px 20px;
      background-color: #ffffff;
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
              <a class="nav-link" href="index.html"><strong>About Us</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.html"><strong>Contact</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="PatientRegister.php"><strong>Register</strong></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main class="main1">

    <div class="container1 ">
      <form action="contactmail.php" method="post" class="p-md-2 m-md-2 card rounded-3 text-black">
        <h3 class="text-center py-4">Contact Reply</h3>
        <input type="hidden" name="id" value='<?php echo "{$rows['id']}"; ?>'>
        <div class="form-floating m-4">
          <input type="text" id="form2Example11" class="form-control" name="name" placeholder="Email address"
            value='<?php echo "{$rows['name']}"; ?>' />
          <label class="form-label" for="form2Example11">Name</label>
        </div>


        <div class="form-floating m-4">
          <input type="email" id="form2Example11" name="email" class="form-control" placeholder="Email address"
            value='<?php echo "{$rows['email']}"; ?>' />
          <label class="form-label" for="form2Example11">Email</label>
        </div>

        <div class="form-floating m-4">
          <input type="number" id="form2Example22" class="form-control" placeholder="Mobile no." name="mob"
            value='<?php echo "{$rows['mob']}"; ?>' />
          <label class="form-label" for="form2Example22">Mobile No.</label>
        </div>
        <div class="form-floating m-4">
          <label for="" class="form-label"></label>
          <textarea class="form-control" name="query" id="" rows="3"
            placeholder="Query"><?php echo "{$rows['query']}"; ?></textarea>
        </div>
        <div class="form-floating m-4">
          <label for="" class="form-label"></label>
          <textarea class="form-control" name="reply" id="" rows="3" placeholder="Reply"></textarea>
        </div>
        <div class="text-center pt-1 mb-2 pb-1">
          <button class="btn btn-outline-success btn-block fa-lg mb-3" type="submit">
            Send
          </button>
      </form>
    </div>
  </main>

  <footer style="text-align: center">
    <p>&copy; 2023 Polyclinic. All rights reserved.</p>
  </footer>
  <!-- Footer End -->

  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>
</body>

</html>