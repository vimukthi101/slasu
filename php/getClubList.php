<?php
	include_once('db.php');
	$radio=$_REQUEST['radioval'];
	$selectArray=array();
	if($radio=='School'){
		$query = "SELECT clubName FROM `club` WHERE clubType=1 AND status=2";
	}else if($radio=='Club'){
		$query = "SELECT clubName FROM `club` WHERE clubType=2 AND status=2";
	}
	$coachR = mysqli_query($con, $query);
	$rowCount = mysqli_num_rows($coachR);
    if($rowCount != 0){
        while($rowR = mysqli_fetch_array($coachR)){
        	$selectArray[0] = $rowR['clubName'];
        }
    }
	echo json_encode($selectArray);
?>