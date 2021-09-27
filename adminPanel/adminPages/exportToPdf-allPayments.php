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
	    $query = 'SELECT * FROM `payment`';
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
					if(!empty($clubIdAth)){
						$queryClub = 'SELECT clubName FROM `club` where clubId='.$clubIdAth;
						$resultClub = mysqli_query($con, $queryClub);
						if(mysqli_num_rows($resultClub) != 0){
							while($rowClub = mysqli_fetch_array($resultClub)){
								$clubName = $rowClub['clubName'];
							}
						}
					} else {
						$clubName = "Unattached";
					}
				 	$fromList = $row[$aDoor[$i]];
				 	$clubId = $row['paymentId'];
				 	$clubCode = $row['paymentCode'];
				 	$clubIdCode = $clubCode.$clubId;
				 	if($aDoor[$i] == "paymentCode"){
				 		$html .= '<td class="border-top-0">'.$clubIdCode.'</td>';
				 	} else if($aDoor[$i] == "clubId"){
				 		$html .= '<td class="border-top-0">'.$clubName.'</td>';
				 	} else if($aDoor[$i] == "athleteList"){
				 		$str = $fromList;
				 		$array = explode(",",$str);
				 		$subjectVal = "";
				 		for($x=0;$x<count($array);$x++){
				 			$subjectVal .= 'SLASU/A/00'.$array[$x].'<br/>';
				 		}
				 		$html .= '<td class="border-top-0">'.$subjectVal.'</td>';
				 	} else if($aDoor[$i] == "coachList"){
				 		$str2 = $fromList;
				 		$array2 = explode(",",$str2);
				 		$subjectVal2 = "";
				 		for($x2=0;$x2<count($array2);$x2++){
				 			$subjectVal2 .= 'SLASU/C/00'.$array2[$x2].'<br/>';
				 		}
				 		$html .= '<td class="border-top-0">'.$subjectVal2.'</td>';
				 	} else if($aDoor[$i] == "paymentType"){
			 		    if($fromList == 1){
			 		    	$html .= '<td class="border-top-0">Athlete Payment</td>';
					    } else if($fromList == 2) {
					    	$html .= '<td class="border-top-0">Coach Payment</td>';
					    }
				 	} else if($aDoor[$i] == "status"){
			 		    if($fromList == 1){
			 		    	$html .= '<td class="border-top-0">Pending</td>';
					    } else if($fromList == 2) {
					    	$html .= '<td class="border-top-0">Approved</td>';
					    } else if($fromList == 3) {
					    	$html .= '<td class="border-top-0">Rejected</td>';
					    } else if($fromList == 4) {
					    	$html .= '<td class="border-top-0">To Be Renewed</td>';
					    }
				 	} else if($aDoor[$i] == "affiliationFeeStatus"){
			 		    if($fromList == 0){
			 		    	$html .= '<td class="border-top-0">Not Included</td>';
					    } else if($fromList == 1) {
					    	$html .= '<td class="border-top-0">Included</td>';
					    }
				 	} else if($aDoor[$i] == "enrollmentFeeStatus"){
			 		    if($fromList == 0){
			 		    	$html .= '<td class="border-top-0">Not Included</td>';
					    } else if($fromList == 1) {
					    	$html .= '<td class="border-top-0">Included</td>';
					    }
				 	} else if($aDoor[$i] == "paymentMode"){
			 		    if($fromList == 0){
			 		    	$html .= '<td class="border-top-0">Cheque Payment</td>';
					    } else if($fromList == 1) {
					    	$html .= '<td class="border-top-0">Bank Transfer</td>';
					    }
				 	}  else {
				 		$html .= '<td class="border-top-0">'.$fromList.'</td>';
				 	}
				}
				$html .= '</tr>';
			}
			$html .= '</table>';
			$pdf->AddPage('L', 'A4');
			$pdf->Cell(0, 0, 'View All Payment Details', 1, 1, 'C');
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->lastPage();
			$pdf->Output('all-payment-report.pdf', 'D');
		}
	} else {
	    header('Location:payment.php');
	}
} else {
	session_destroy();
    header('Location:payment.php');
}
?>