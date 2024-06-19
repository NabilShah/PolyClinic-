<!doctype html>
<html lang="en">

<head>
    <title>Contact Details</title>
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
    <main>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "polyclinic";
        $conn = mysqli_connect($servername, $username, $password, $db);
        if (!$conn) {
            echo "DB not connected!" . mysqli_connect_error();
        }
        $sql = "SELECT * FROM `contact`;";
        $result = mysqli_query($conn, $sql);


        if (mysqli_num_rows($result) > 0) {
            echo "<div class='container mt-5'>
    <center>
      <h2>Contact List</h2>
    </center>
  <div class='table-responsive'>
      <table class='table table-hover'>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile No.</th>
        <th>Query</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
";
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "  <tr>
  <td>{$rows['id']}</td>
  <td>{$rows['name']}</td>
  <td>{$rows['email']}</td>
  <td>{$rows['mob']}</td>
  <td>{$rows['query']}</td>
  <td>
    
    <a name='' id='butt' class='btn btn-primary' href='replycontact.php?id={$rows['id']}' role='button'
      >Reply</a
    >
  </td>
</tr>
";
            }
            echo "          </tbody>
  </table>
</div>";

        } else {
            echo "No Record Found!";
        }
        mysqli_close($conn);
        ?>
    </main>
    <footer class="fixed-bottom bg-light text-dark text-center">
        <p>&copy; 2023 Guardians. All rights reserved.</p>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>