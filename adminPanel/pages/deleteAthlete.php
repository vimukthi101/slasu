<?php
	if(!isset($_SESSION[''])){
		session_start();
	}
	include_once('../../php/db.php');
	if(isset($_SESSION['clubId'])){
		if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && isset($_POST['delete'])){
			if(!empty($_POST['delete'])){
				$tId = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['delete'])));
				$gettt = "SELECT * FROM athlete WHERE athleteId='".$tId."'";
				$resulttt = mysqli_query($con, $gettt);
				if(mysqli_num_rows($resulttt) != 0){
					$deletett = "DELETE FROM athlete WHERE athleteId='".$tId."'";
					if(mysqli_query($con, $deletett)){
						//success
						header('Location:athlete.php?er=su');
					} else {
						//query failed
						header('Location:athlete.php');
					}
				} else {
					//no tt
					header('Location:athlete.php');
				}
			} else {
				//empty fields redirect to cards
				header('Location:athlete.php');
			}
		} else {
			//redirect to form not submit 404
			header('Location:athlete.php');	
		}
	} else {
		//error page 404
		header('Location:athlete.php');
	}	
?>