<!doctype html>
<html lang="en">

<head>
  <title>PatientRegistration</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<style>
  form {
    box-shadow: 0 0 10px 0(rgb(rgb(0, 0, 0), rgb(0, 0, 0), rgb(0, 0, 0)));
  }

  .container1 {
    display: block;
    max-width: 500px;
    margin: 30px auto;
    padding: 40px 20px;
    background-color: #ffffff;
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
              <a class="nav-link" href="index.html"><strong>About Us</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.html"><strong>Contact</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php"><strong>Login</strong></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main class="main1">

    <div class="container1 ">
      <form action="Registration.php" method="post" class="p-md-2 m-md-2 card rounded-3 text-black">
        <h3 class="text-center py-4">Register Yourself</h3>
        <input type="hidden" name="role" value="user">
        <div class="form-floating m-4">
          <input type="text" id="form2Example11" class="form-control" name="username" placeholder="Email address" />
          <label class="form-label" for="form2Example11">Username</label>
        </div>

        <div class="form-floating m-4">
          <input type="text" id="form2Example11" name="fullname" ; class="form-control" placeholder="Email address" />
          <label class="form-label" for="form2Example11">Fullname</label>
        </div>


        <div class="form-floating m-4">
          <input type="email" id="form2Example11" name="email" class="form-control" placeholder="Email address" />
          <label class="form-label" for="form2Example11">Email</label>
        </div>

        <div class="form-floating m-4">
          <input type="password" id="form2Example22" class="form-control" placeholder="Password" name="password" />
          <label class="form-label" for="form2Example22">Password</label>
        </div>
        <div class="form-floating m-4">
          <input type="password" id="form2Example22" class="form-control" placeholder="Password"
            name="confirm_password" />
          <label class="form-label" for="form2Example22">Confirm Password</label>
        </div>
        <div class="text-center pt-1 mb-2 pb-1">
          <button class="btn btn-outline-success btn-block fa-lg mb-3" type="submit">
            Register
          </button>
      </form>
    </div>
  </main>

  <footer style="text-align: center">
    <p>&copy; 2023 Polyclinic. All rights reserved.</p>
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>