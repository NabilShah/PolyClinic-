<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
  <style>
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

    .navcolor {
      background-color: white;
    }

    @media (min-width: 768px) {
      .gradient-form {
        height: 100vh !important;
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
        line-height: 80px;
      }
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark p-1" id="headerNav"
      style="border-bottom: 1px solid rgb(182, 182, 182)">
      <div class="container-fluid">
        <a class="navbar-brand d-block d-lg-none" href="#">
          <img src="images/logo.png" height="80" />
          <!-- <span class="text-dark display-6" style="display: inline-block; margin-top: 10px;">Guardians</span> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          <img src="https://img.icons8.com/?size=50&id=3096&format=png" alt="" width="30">
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link mx-2 active text-black" aria-current="page" href="index.php">Home</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link mx-2 text-black" href="#">About us</a>
            </li> -->
            <li class="nav-item d-none d-lg-block">
              <a class="nav-link mx-2" href="#">
                <img src="images/logo.png" height="80" />
              </a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link mx-2 text-black" href="#">Contact</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link mx-2 text-black" href="PatientRegister.php">Register</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <section class="h-100 gradient-form">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-xl-10">
            <div class="card rounded-3 text-black">
              <div class="row g-0">
                <div class="col-lg-6">
                  <div class="card-body p-md-5 mx-md-4">
                    <div class="text-center">
                      <img src="images/logo.png" style="width: 185px" alt="logo" />
                      <h4 class="mt-1 mb-5 pb-1">We are The Guardians</h4>
                    </div>

                    <form action="login.php" method="post">
                      <h3 class="text-center">Login to your account.</h3>

                      <div class="form-floating m-4">
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username" />
                        <label class="form-label" for="form2Example11">Username</label>
                      </div>

                      <div class="form-floating m-4">
                        <input type="password" id="password" name="password" class="form-control"
                          placeholder="Password" />
                        <label class="form-label" for="form2Example22">Password</label>
                      </div>
                      <div class="text-center text-danger">
                        <?php
                        if (isset($_SESSION['LoginError'])) {
                          echo $_SESSION['LoginError'];
                        }
                        ?>
                      </div>
                      <div class="text-center pt-1 m-2 pb-1">
                        <button class="btn btn-outline-success btn-block fa-lg mb-3" type="submit">
                          Log in</button><br />
                        <!-- <a class="text-muted" href="#!">Forgot password?</a> -->
                      </div>

                      <div class="d-flex align-items-center justify-content-center pb-4">
                        <p class="mb-0 me-2">Don't have an account?</p>
                        <a type="button" class="btn btn-outline-success" href="PatientRegister.php">
                          Create new
                        </a>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                  <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                    <h4 class="mb-4">We are more than just a company.</h4>
                    <p class="small mb-0">
                      Lorem ipsum dolor sit amet, consectetur adipisicing
                      elit, sed do eiusmod tempor incididunt ut labore et
                      dolore magna aliqua. Ut enim ad minim veniam, quis
                      nostrud exercitation ullamco laboris nisi ut aliquip ex
                      ea commodo consequat.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer>
    <!-- place footer here -->
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