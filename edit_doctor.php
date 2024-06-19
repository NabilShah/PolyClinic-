<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <title>Edit Doctor</title>
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
    <div class="container mt-5">
        <center>
            <h2>Edit Doctor</h2>
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

        // Receive the doctor's ID from the URL
        $doctor_id = $_GET['id'];

        // Initialize variables to prevent notices
        $doctorName = "";
        $username = "";
        $password = "";
        $email = "";

        // SQL query to retrieve doctor information by ID
        $sql = "SELECT * FROM register WHERE username = '$doctor_id'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // Populate form fields with fetched data
            $doctorName = $row['fullname'];
            $username = $row['username'];
            $password = $row['password'];
            $email = $row['email'];
        }
        ?>

        <form action="update_doctor.php?id=<?php echo $doctor_id; ?>" method="POST">
            <div class="mb-3">
                <label for="doctorName" class="form-label">Doctor Name:</label>
                <input type="text" class="form-control" id="doctorName" name="doctorName"
                    value="<?php echo $doctorName; ?>" required>
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>"
                    required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" name="password" value="<?php echo $password; ?>"
                    required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>

            <button type="submit" class="btn btn-outline-primary mt-2">Update</button>
        </form>
    </div>
    <footer class="fixed-bottom bg-light text-dark text-center">
        <p>&copy; 2023 Guardians. All rights reserved.</p>
    </footer>
    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>