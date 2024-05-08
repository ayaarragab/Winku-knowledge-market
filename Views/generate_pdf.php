<?php
// Include the TCPDF library
require_once('tcpdf/tcpdf.php');

// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('Your Website');
$pdf->SetTitle('PDF Report');

// Add a page
$pdf->AddPage();

// Example content (replace with your own)
$content = file_get_contents('http://localhost/Winku-aya-s_branch/Views/admin-all-users-download.php');

// Write the content to the PDF
$pdf->writeHTML($content, true, false, true, false, '');

// Specify the save location
$savePath = 'C:/xampp/htdocs//Winku-aya-s_branch/'; // Change this to your desired save location
$pdfFileName = 'pdf_report_' . uniqid() . '.pdf';
$pdfFilePath = $savePath . $pdfFileName;

// Close and output PDF
$pdf->Output($pdfFilePath, 'F'); // Save PDF to a file

echo $pdfFileName; // Return PDF filename
?>
