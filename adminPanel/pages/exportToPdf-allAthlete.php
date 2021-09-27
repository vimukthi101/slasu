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
	    $query = 'SELECT * FROM `athlete` WHERE clubId='.$_SESSION["clubId"];
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
				 	$clubId = $row['athleteId'];
				 	$clubCode = $row['athleteCode'];
				 	$clubIdCode = $clubCode.$clubId;
				 	if($aDoor[$i] == "athleteCode"){
				 		$html .= '<td class="border-top-0">'.$clubIdCode.'</td>';
				 	} else if($aDoor[$i] == "clubId"){
				 		$html .= '<td class="border-top-0">'.$clubName.'</td>';
				 	} else if($aDoor[$i] == "regType"){
				 		if($fromList == 1){
		                    $html .= '<td class="border-top-0">School</td>';
		                } else if($fromList == 2) {
		                    $html .= '<td class="border-top-0">Club</td>';
		                } else if($fromList == 3) {
		                    $html .= '<td class="border-top-0">UnAttached</td>';
		                }
				 	} else if($aDoor[$i] == "gender"){
 		                if($fromList == 1){
		                    $html .= '<td class="border-top-0">Male</td>';
		                } else if($fromList == 2) {
		                    $html .= '<td class="border-top-0">FeMale</td>';
		                }
				 	} else if($aDoor[$i] == "bbPhoto"){
				 		$html .= '<td class="border-top-0"><a href="http://localhost:1234/slasu/adminPanel/adminPages/downloadAthlete.php?id='.$clubId.'">Download The Application</a></td>';
				 	} else if($aDoor[$i] == "affiliationCat"){
 		                if($fromList == 1){
		                    $html .= '<td class="border-top-0">Swimming</td>';
		                } else if($fromList == 2) {
		                    $html .= '<td class="border-top-0">Artistic Swimming</td>';
		                } else if($fromList == 3) {
		                    $html .= '<td class="border-top-0">Water Polo</td>';
		                } else if($fromList == 4) {
		                    $html .= '<td class="border-top-0">Diving</td>';
		                }
				 	} else if($aDoor[$i] == "paymentStatus"){
 		                if($fromList == 1){
		                    $html .= '<td class="border-top-0">Pending</td>';
		                } else if($fromList == 2) {
		                    $html .= '<td class="border-top-0">Approved</td>';
		                } else if($fromList == 3) {
		                    $html .= '<td class="border-top-0">Rejected</td>';
		                } else if($fromList == 4) {
		                    $html .= '<td class="border-top-0">To Be Renewed</td>';
		                } else if($fromList == 5) {
		                    $html .= '<td class="border-top-0">Not Paid</td>';
		                }
				 	} else if($aDoor[$i] == "paymentRef"){
				 		$html .= '<td class="border-top-0">SLASU/A/00'.$fromList.'</td>';
				 	} else {
				 		$html .= '<td class="border-top-0">'.$fromList.'</td>';
				 	}
				}
				$html .= '</tr>';
			}
			$html .= '</table>';
			$pdf->AddPage('L', 'A4');
			$pdf->Cell(0, 0, 'View All Athlete Details', 1, 1, 'C');
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->lastPage();
			$pdf->Output('all-athlete-report.pdf', 'D');
		}
	} else {
	    header('Location:athlete.php');
	}
} else {
	session_destroy();
    header('Location:athlete.php');
}
?>