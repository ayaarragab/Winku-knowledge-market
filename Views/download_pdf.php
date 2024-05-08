<?php
$file = $_GET['file'];
// Set headers for PDF download
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename='$file'");
@readfile($file);
?>
