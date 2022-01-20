<?php
ini_set('memory_limit', '-1');
namespace PhpOffice;
include ".\PhpOffice\autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;

if(!isset($_SESSION[''])){
    session_start();
}

include_once('../../php/db.php');
include_once('../dist/print.php');

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
	if(!empty($_POST['regRadio']) && isset($_POST['fieldList']) && !empty($_POST['fieldList'])){
		$reportType = $_POST['regRadio'];
		$aDoor = $_POST['fieldList'];
		$N = count($aDoor);
	    $query = 'SELECT * FROM `admin`';
		$result = mysqli_query($con, $query);
		if(mysqli_num_rows($result) != 0){
			$html = '<table class="table table-striped"><thead><tr>';
			for($i=0; $i < $N; $i++) {
			 	$html .= '<th class="border-top-0">'.$aDoor[$i].'</th>';
			}
			$html .= '</tr></thead><tbody>';
			while($row = mysqli_fetch_array($result)){
				$html .= '<tr>';
				for($i=0; $i < $N; $i++) {
				 	$fromList = $row[$aDoor[$i]];
				 	$html .= '<td class="border-top-0">'.$fromList.'</td>';
				}
				$html .= '</tr>';
			}
			$html .= '</table>';
			if($reportType == "excel"){
				// header('Location:excel.php?file=all-admin-report&html='.$html);
				$fileName = "all-admin-report";
				$CntDisposition = "Content-Disposition: attachment;filename=";
				$CntDisposition = $CntDisposition . $fileName . ".xls";
				header($CntDisposition);
				header('Cache-Control: max-age=0');
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Html();
				$htmlString = $html;
				$spreadsheet = $reader->loadFromString($htmlString);
				$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
				$writer->save('php://output');
			} else if($reportType == "pdf") {
				$pdf->AddPage('L', 'A4');
				$pdf->Cell(0, 0, 'View All Admin Details', 1, 1, 'C');
				$pdf->writeHTML($html, true, false, true, false, '');
				$pdf->lastPage();
				$pdf->Output('all-admin-report.pdf', 'D');
			}
		}
	} else {
	    header('Location:admin.php');
	}
} else {
	session_destroy();
    header('Location:admin.php');
}
?>