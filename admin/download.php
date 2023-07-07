<?php
require_once('../tcpdf/tcpdf.php');

// Create a new TCPDF instance
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('SPL Registration Acknowledgment');
$pdf->SetSubject('SPL Registration Acknowledgment');

// Add a page
$pdf->AddPage();

// Get the HTML content
ob_start();
require_once('pdf.php');  // Replace with the path to your HTML file
$html = ob_get_clean();

// Convert HTML to PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Get the PDF content as a string
$pdfContent = $pdf->Output('', 'S');

// Set the appropriate headers for the response
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="SPL_Registration_Acknowledgment.pdf"');

// Output the PDF content
echo $pdfContent;
