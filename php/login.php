<?php
	include_once('db.php');
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        if(!empty($_POST['username']) && !empty($_POST['password'])){
        	$username = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['username'])));
        	$password = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['password'])));
            $getCard = "SELECT clubName, clubId, status FROM club WHERE operatorMobile='".$username."' and operatorPassword='".$password."'";
            $resultCard = mysqli_query($con, $getCard);
            if(mysqli_num_rows($resultCard) != 0){
            	while($statusRow = mysqli_fetch_array($resultCard)){
            		$clubName = $statusRow['clubName'];
            		$operatorMobile = $statusRow['operatorMobile'];
            		$clubId = $statusRow['clubId'];
                    $status = $statusRow['status'];
            		session_start();
	            	$_SESSION["clubName"] = $clubName;
	            	$_SESSION["operatorMobile"] = $operatorMobile;
	            	$_SESSION["clubId"] = $clubId;
                    $_SESSION["status"] = $status;
            	}
                if($status == 2){
                    header('Location:../adminPanel/pages/dashboard.php');
                } else {
                    session_destroy();
                    header('Location:../login.php?er=na');
                }
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