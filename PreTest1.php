<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
  <title>Patient Pre-Test Form</title>
</head>

<body>
  <div class="container mt-5">
    <h2>Patient Pre-Test Form</h2>
    <?php
    $patientName = $_GET['patientName'];
    $doctorName = $_GET['doctorName'];
    $username = $_GET['username'];
    ?>
    <form method="POST"
      action="PreTest.php?patientName=<?php echo urlencode($patientName); ?>&doctorName=<?php echo urlencode($doctorName); ?> &username=<?php echo urlencode($username); ?> ">
      <div class="mb-3">
        <label for="patientName" class="form-label">Patient Name</label>
        <input type="text" value="<?php echo $_GET['patientName'] ?>" class="form-control" id="patientName"
          placeholder="Enter patient's name" disabled />
        <label for="patientAge" class="form-label">Age</label>
        <input type="number" name="age" class="form-control" id="patientAge" placeholder="Enter patient's age" />
      </div>
      <div class="mb-3">
        <label for="patientWeight" class="form-label">Weight</label>
        <input type="number" name="weight" class="form-control" id="patientWeight"
          placeholder="Enter patient's weight" />
      </div>
      <div class="mb-3">
        <label for="patientHeight" class="form-label">Height</label>
        <input type="number" name="height" class="form-control" id="patientHeight"
          placeholder="Enter patient's height" />
      </div>
      <div class="mb-3">
        <label for="patientGender" class="form-label">Gender</label>
        <select class="form-select" name="gender" id="patientGender">
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="patientSymptoms" class="form-label">Symptoms</label>
        <textarea class="form-control" id="patientSymptoms" name="symptoms" rows="3"
          placeholder="Enter patient's symptoms"></textarea>
      </div>
      <button type="submit" class="btn btn-outline-success">Submit</button>
    </form>
  </div>
  <footer class="fixed-bottom bg-light text-dark text-center">
    <p>&copy; 2023 Guardians. All rights reserved.</p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>