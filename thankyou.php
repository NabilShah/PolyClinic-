
<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: index.html");
  exit();
}?><!doctype html>
<html lang="en">
    <head>
        <title>Thank You</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>
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
    h1{
        
      color: 
          green;
      /* background-image: linear-gradient(319deg,
          #b4c369 0%,
          #4ec65c 35%,
          #37ac98 80%); */
    

    }

    h4
    {
        color: #4ec65c; 
       
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
                href="UserPage.php?username=<?php echo $username; ?>"><strong>User Page</strong></a>
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
 <br><br>
        <main>
            <center><h1>Thank you !!</h1><br>
            <div ><h4 class="px-5 py-5" >Thanks For Contacting Us With Your Query.  WE've received your message. if you have
            urgent concerns, please call us at given number . Otherwise, expect an
            email from us shortly.</h4></center></div>
        </main>
        <footer class="fixed-bottom bg-light text-dark text-center">
    <p>&copy; 2023 Guardians. All rights reserved.</p>
  </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
