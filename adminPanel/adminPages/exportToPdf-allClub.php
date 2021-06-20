<?php
if(!isset($_SESSION[''])){
    session_start();
}
include_once('../dist/print.php');
if(isset($_SESSION['html'])){
	$pdf->AddPage('L', 'A4');
	$pdf->Cell(0, 0, 'View All Club Details', 1, 1, 'C');
	$pdf->writeHTML($_SESSION['html'], true, false, true, false, '');
	$pdf->lastPage();
	$pdf->Output('all-club-report.pdf', 'D');
} else {
	session_destroy();
    header('Location:club.php');
}
?>