<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
  <title>Prescription Form</title>
</head>

<body>
  <?php
  $username = $_GET['username'];
  $patientName = $_GET['patientName'];
  $doctorName = $_GET['doctorName'];
  ?>
  <div class="container mt-5">
    <h2>Prescription Form</h2>
    <form
      action="Prescription.php?patientName=<?php echo urlencode($patientName); ?>&doctorName=<?php echo urlencode($doctorName); ?>&username=<?php echo urlencode($username); ?>"
      method="post">
      <div class="mb-3">
        <label for="patientName" class="form-label">Patient's Name</label>
        <input type="text" value="<?php echo $_GET['patientName'] ?>" class="form-control" id="patientName"
          placeholder="Enter patient's name" disabled />
      </div>
      <div class="mb-3">
        <label for="medications" class="form-label">Medications</label>
        <textarea class="form-control" id="medications" name="medications" rows="3"
          placeholder="Enter prescribed medications"></textarea>
      </div>
      <div class="mb-3">
        <label for="dosage" class="form-label">Dosage</label>
        <input type="text" class="form-control" id="dosage" name="dosage" placeholder="Enter dosage instructions" />
      </div>
      <div class="mb-3">
        <label for="instructions" class="form-label">Additional Instructions</label>
        <textarea class="form-control" id="instructions" rows="3" name="addInfo"
          placeholder="Enter any additional instructions"></textarea>
      </div>
      <button type="submit" class="btn btn-outline-info">
        Submit Prescription
      </button>
    </form>
  </div>
  <footer class="fixed-bottom bg-light text-dark text-center">
    <p>&copy; 2023 Guardians. All rights reserved.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>