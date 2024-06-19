<?php
require('fpdf/fpdf.php');

// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'polyclinic';

// Create a new PDF document
$pdf = new FPDF();
$pdf->AddPage();

// Set font for header and footer
$pdf->SetFont('Arial', 'B', 12);

// Header Section
$pdf->Image('images/logo.png', 10, 10, 30); // Replace 'logo.png' with the path to your logo image
$pdf->Cell(100);
$pdf->Cell(0, 5, 'Date: ' . date('Y-m-d'), 0, 1, 'R'); // Current date
$pdf->Ln(30); // Move down to make space for the title

// Title
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Prescription', 0, 1, 'C');
$pdf->Ln(20);

// Database connection
$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$patientName = $_GET['username'];

// Fetch prescription data for the patient from the "prescription" table
$query = "SELECT doctorName, patientName, medications, dosage, addInfo, timestamp FROM prescription WHERE patientName = ? ORDER BY timestamp DESC LIMIT 1";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $patientName);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_bind_result($stmt, $doctorName, $patientName, $medications, $dosage, $addInfo, $timestamp);

    while (mysqli_stmt_fetch($stmt)) {
        // Body Section
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(40, 10, 'Doctor Name:', 0);
        $pdf->Cell(60, 10, $doctorName, 0, 1);
        $pdf->Ln(5);

        $pdf->Cell(40, 10, 'Patient Name:', 0);
        $pdf->Cell(60, 10, $patientName, 0, 1);
        $pdf->Ln(5);

        $pdf->Cell(40, 10, 'Medications:', 0);
        $pdf->Cell(60, 10, $medications, 0, 1);
        $pdf->Ln(5);

        $pdf->Cell(40, 10, 'Dosage:', 0);
        $pdf->Cell(60, 10, $dosage, 0, 1);
        $pdf->Ln(5);

        $pdf->Cell(50, 10, 'Additional Instructions:', 0);
        $pdf->MultiCell(0, 10, $addInfo, 0, 'L');
        $pdf->Ln(10);

        $pdf->Cell(40, 10, 'Prescription Date:', 0);
        $pdf->Cell(60, 10, date('Y-m-d H:i:s', strtotime($timestamp)), 0, 1); // Convert timestamp to readable date
        $pdf->Ln(20);
    }
}

// Close database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);

$pdf->Ln(10); // Move down to make space for the footer

// Footer Section
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(0, 5, 'Address Info', 0, 1, 'C'); // Replace with your address info

// Output the PDF to the browser or save it to a file
$pdf->Output('prescription.pdf', 'I'); // 'I' for browser output, 'F' to save to a file

?>