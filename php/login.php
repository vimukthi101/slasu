<?php
	include_once('db.php');
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        if(!empty($_POST['username']) && !empty($_POST['password'])){
        	$username = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['username'])));
        	$password = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['password'])));
            $getCard = "SELECT clubName, clubId FROM club WHERE operatorMobile='".$username."' and operatorPassword='".$password."'";
            $resultCard = mysqli_query($con, $getCard);
            if(mysqli_num_rows($resultCard) != 0){
            	while($statusRow = mysqli_fetch_array($resultCard)){
            		$clubName = $statusRow['clubName'];
            		$operatorMobile = $statusRow['operatorMobile'];
            		$clubId = $statusRow['clubId'];
            		session_start();
	            	$_SESSION["clubName"] = $clubName;
	            	$_SESSION["operatorMobile"] = $operatorMobile;
	            	$_SESSION["clubId"] = $clubId;
            	}
            	header('Location:../adminPanel/pages/dashboard.php');
            } else {
                //card exists
                header('Location:../login.php?er=ce');
            }
        } else {
            //empty fields redirect to cards
            header('Location:../login.php?er=em');
        }
    } else {
        //if submit button is not clicked
        header('Location:../login.php');	
    }
?>