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
	    $query = 'SELECT * FROM `club`';
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
				 	$clubId = $row['clubId'];
				 	$clubCode = $row['clubCode'];
				 	$clubIdCode = $clubCode.$clubId;
				 	if($aDoor[$i] == "clubCode"){
				 		$html .= '<td class="border-top-0">'.$clubIdCode.'</td>';
				 	} else if($aDoor[$i] == "clubType"){
				 		if($fromList == 1){
		                    $html .= '<td class="border-top-0">School</td>';
		                } else if($fromList == 2) {
		                    $html .= '<td class="border-top-0">Club</td>';
		                }
				 	} else if($aDoor[$i] == "status"){
 		                if($fromList == 1){
		                    $html .= '<td class="border-top-0">InActive</td>';
		                } else if($fromList == 2) {
		                    $html .= '<td class="border-top-0">Active</td>';
		                } else if($fromList == 3) {
		                    $html .= '<td class="border-top-0">Disabled</td>';
		                } 
				 	} else if($aDoor[$i] == "regType"){
				 		if($fromList == 1){
		                    $html .= '<td class="border-top-0">New Registration</td>';
		                } else if($fromList == 2) {
		                    $html .= '<td class="border-top-0">Existing</td>';
		                } 
				 	} else if($aDoor[$i] == "requestLetter"){
				 		$html .= '<td class="border-top-0"><a href="https://www.aquatics.lk/adminPanel/adminPages/download.php?id='.$clubId.'">Download The Application</a></td>';
				 	} else if($aDoor[$i] == "affiliationCat"){
 		                if($fromList == 1){
		                    $html .= '<td class="border-top-0">Ordinary Member (Colombo District)</td>';
		                } else if($fromList == 2) {
		                    $html .= '<td class="border-top-0">Ordinary Member (Other Districts) </td>';
		                } else if($fromList == 3) {
		                    $html .= '<td class="border-top-0">Novice Members</td>';
		                } else if($fromList == 4) {
		                    $html .= '<td class="border-top-0">Participant Members (Govt./ Semi Govt. Schools)</td>';
		                } else if($fromList == 5) {
		                    $html .= '<td class="border-top-0">Participant Members (International Schools and Ancillary Clubs)</td>';
		                }
				 	} else if($aDoor[$i] == "affiliationFeeStatus"){
				 		if($fromList == 1){
				 			$html .= '<td class="border-top-0">Pending</td>';
					    } else if($fromList == 2) {
					    	$html .= '<td class="border-top-0">Approved</td>';
					    } else if($fromList == 3) {
					    	$html .= '<td class="border-top-0">Rejected</td>';
					    } else if($fromList == 4) {
					    	$html .= '<td class="border-top-0">To Be Renewed</td>';
					    }else {
					    	$html .= '<td class="border-top-0">Not Paid</td>';
					    }
				 	} else if($aDoor[$i] == "enrollmentFeeStatus"){
				 		if($fromList == 1){
				 			$html .= '<td class="border-top-0">Pending</td>';
					    } else if($fromList == 2) {
					    	$html .= '<td class="border-top-0">Approved</td>';
					    } else if($fromList == 3) {
					    	$html .= '<td class="border-top-0">Rejected</td>';
					    } else if($fromList == 4) {
					    	$html .= '<td class="border-top-0">To Be Renewed</td>';
					    }else {
					    	$html .= '<td class="border-top-0">Not Paid</td>';
					    }
				 	} else {
				 		$html .= '<td class="border-top-0">'.$fromList.'</td>';
				 	}
				}
				$html .= '</tr>';
			}
			$html .= '</table>';
			if($reportType == "pdf"){
				$pdf->AddPage('L', 'A4');
				$pdf->Cell(0, 0, 'View All Club Details', 1, 1, 'C');
				$pdf->writeHTML($html, true, false, true, false, '');
				$pdf->lastPage();
				$pdf->Output('all-club-report.pdf', 'D');
			} else {
				header('Location:excel.php?file=all-club-report&html='.$html);
			}
		}
	} else {
	    header('Location:club.php');
	}
} else {
	session_destroy();
    header('Location:club.php');
}
?>