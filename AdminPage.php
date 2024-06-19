<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
} else {
  if ($_SESSION['role'] != 'admin') {
    echo "Invalid!";
    exit();
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
  <style>
    .container {
      margin-top: 20px;
    }

    .card {

      margin-bottom: 20px;
    }

    .card img {
      height: 350px;

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
              <a class="nav-link" href="AdminRegister.html"><strong>Register</strong></a>
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
    <div class="container">
      <div class="row justify-content-center align-items-center g-2">
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card">
            <img src="images/OnlineDoctor.png" class="card-img-top" alt="..." style="object-fit: contain;">
            <div class="card-body">
              <h5 class="card-title">Doctor Details</h5>
              <p class="card-text">Manage Doctors Here.</p>
              <a class="btn btn-outline-success" data-bs-target="#card1Modal" href="ShowDoctorDetails.php">Show
                Details</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card">
            <img src="images/contact.jpg" class="card-img-top" alt="..." style="object-fit: contain;">
            <div class="card-body">
              <h5 class="card-title">Contact Details</h5>
              <p class="card-text">Manage Contact Here.</p>
              <a class="btn btn-outline-success" data-bs-target="#card1Modal" href="contactdetails.php">Show
                Details</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card">
            <img src="images/p.png" class="card-img-top" alt="..." style="object-fit: contain;">
            <div class="card-body">
              <h5 class="card-title">Patient Details</h5>
              <p class="card-text">Manage Patients Here.</p>
              <a class="btn btn-outline-success" href="ShowPatientDetails.php">Show Details</a>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <img src="images/OnlineDoctor.png" class="card-img-top" alt="..." style="object-fit: contain;">
            <div class="card-body">
              <h5 class="card-title">Doctor Details</h5>
              <p class="card-text">Manage Doctors Here.</p>
              <a class="btn btn-outline-success" data-bs-target="#card1Modal" href="ShowDoctorDetails.php">Show
                Details</a>
            </div>
          </div>
           <div class="col-md-4">
            <div class="card">
              <img src="images/contact.jpg" class="card-img-top" alt="..." style="object-fit: contain;">
              <div class="card-body">
                <h5 class="card-title">Contact Details</h5>
                <p class="card-text">Manage Contact Here.</p>
                <a class="btn btn-outline-success" data-bs-target="#card1Modal" href="ShowDoctorDetails.php">Show
                  Details</a>
              </div>
            </div>
          </div> 
          <div class="col-md-4">
            <div class="card">
              <img src="images/p.png" class="card-img-top" alt="..." style="object-fit: contain;">
              <div class="card-body">
                <h5 class="card-title">Patient Details</h5>
                <p class="card-text">Manage Patients Here.</p>
                <a class="btn btn-outline-success" href="ShowPatientDetails.php">Show Details</a>
              </div>
            </div>
          </div> -->
    <!-- <div class="col-md-4">
                <div class="card">
                  <img src="https://thumbs.dreamstime.com/b/%D0%BF%D0%B0%D1%80%D0%B0%D0%BC%D0%B5%D1%82%D1%80%D1%8B-%D0%BA%D0%BE%D0%BC%D0%BF%D0%B0%D0%BD%D0%B8%D0%B8-%D0%B8%D1%89%D1%83%D1%82-%D1%87%D0%B5%D1%80%D0%BD%D1%8B%D0%B9-%D0%B7%D0%BD%D0%B0%D1%87%D0%BE%D0%BA-%D0%B7%D0%B5%D0%BB%D0%B5%D0%BD%D0%BE%D0%B3%D0%BE-%D0%BF%D0%BE%D0%B8%D1%81%D0%BA%D0%B0-%D0%B8%D0%B4%D0%B5%D0%B8-%D1%83%D0%BF%D1%80%D0%B0%D0%B2%D0%BB%D0%B5%D0%BD%D0%B8%D1%8F-140230347.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Admin Details</h5>
                    <p class="card-text">Manage Admins Here.</p>
                    <a class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#card3Modal">Show Details</a>
                  </div>
                </div>
              </div>
            </div>
          </div> -->

  </main>
  <footer class="fixed-bottom bg-light text-dark text-center">
    <p>&copy; 2023 Guardians. All rights reserved.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz"
    crossorigin="anonymous"></script>
</body>

</html>