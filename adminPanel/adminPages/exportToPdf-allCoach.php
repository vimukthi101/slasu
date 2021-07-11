<?php
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
	    $query = 'SELECT * FROM `coach`';
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
					$clubIdAth = $row['clubId'];
					$queryClub = 'SELECT clubName FROM `club` where clubId='.$clubIdAth;
					$resultClub = mysqli_query($con, $queryClub);
					if(mysqli_num_rows($resultClub) != 0){
						while($rowClub = mysqli_fetch_array($resultClub)){
							$clubName = $rowClub['clubName'];
						}
					}
				 	$fromList = $row[$aDoor[$i]];
				 	$clubId = $row['coachId'];
				 	$clubCode = $row['coachCode'];
				 	$clubIdCode = $clubCode.$clubId;
				 	if($aDoor[$i] == "coachCode"){
				 		$html .= '<td class="border-top-0">'.$clubIdCode.'</td>';
				 	} else if($aDoor[$i] == "clubId"){
				 		$html .= '<td class="border-top-0">'.$clubName.'</td>';
				 	} else if($aDoor[$i] == "regType"){
				 		if($fromList == 1){
		                    $html .= '<td class="border-top-0">School</td>';
		                } else if($fromList == 2) {
		                    $html .= '<td class="border-top-0">Club</td>';
		                }
				 	} else if($aDoor[$i] == "gender"){
 		                if($fromList == 1){
		                    $html .= '<td class="border-top-0">Male</td>';
		                } else if($fromList == 2) {
		                    $html .= '<td class="border-top-0">FeMale</td>';
		                }
				 	} else if($aDoor[$i] == "photoForId" || $aDoor[$i] == "nicPhoto" || $aDoor[$i] == "application"){
				 		$html .= '<td class="border-top-0"><img width="180" height="180" src="data:image/jpeg;base64,'.base64_encode($fromList).'"/></td>';
				 	} else if($aDoor[$i] == "affiliationCat"){
 		                if($fromList == 1){
		                    $html .= '<td class="border-top-0">Swimming</td>';
		                } else if($fromList == 2) {
		                    $html .= '<td class="border-top-0">Artistic Swimming</td>';
		                } else if($fromList == 3) {
		                    $html .= '<td class="border-top-0">Water Polo</td>';
		                } else if($fromList == 4) {
		                    $html .= '<td class="border-top-0">Diving</td>';
		                } else if($fromList == 5) {
		                    $html .= '<td class="border-top-0">All</td>';
		                }
				 	} else {
				 		$html .= '<td class="border-top-0">'.$fromList.'</td>';
				 	}
				}
				$html .= '</tr>';
			}
			$html .= '</table>';
			$pdf->AddPage('L', 'A4');
			$pdf->Cell(0, 0, 'View All Coach Details', 1, 1, 'C');
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->lastPage();
			$pdf->Output('all-coach-report.pdf', 'D');
		}
	} else {
	    header('Location:coach.php');
	}
} else {
	session_destroy();
    header('Location:coach.php');
}
?>