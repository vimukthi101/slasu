<?php
	if(!isset($_SESSION[''])){
		session_start();
	}
	include_once('../../php/db.php');
	if(isset($_SESSION['adminId'])){
		if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && isset($_POST['delete'])){
			if(!empty($_POST['delete'])){
				$tId = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['delete'])));
				$gettt = "SELECT * FROM club WHERE clubId='".$tId."'";
				$resulttt = mysqli_query($con, $gettt);
				if(mysqli_num_rows($resulttt) != 0){
					while($row = mysqli_fetch_array($resulttt)){
                        $to = $row['operatorEmail'];
                        $operatorName = $row['operatorName'];
                        $clubName = $row['clubName'];
                    }
					$deletett = "DELETE FROM club WHERE clubId='".$tId."'";
					$deleteta = "DELETE FROM athlete WHERE clubId='".$tId."'";
					$deletetc = "DELETE FROM coach WHERE clubId='".$tId."'";
					if(mysqli_query($con, $deletett)){
						if(mysqli_query($con, $deleteta)){
							if(mysqli_query($con, $deletetc)){
		                        $from = "info@thestory.host";
		                        $headers = "From:" . $from;
                    			$subject = $clubName." - Account Deleted at SLASU";
$message = "Hi ".$operatorName.",

Your account was deleted at Sri Lanka Aquatic Sports Union. Please contact the admin if you think this was done by a mistake.

Thank You
Admin,
SLASU";
		                        if (mail($to, $subject, $message, $headers)){
		                            header('Location:club.php?er=su');
		                        } else {
		                            header('Location:club.php?er=suf');
		                        }
							} else {
								//query failed
								header('Location:club.php?er=ed');
							}
						} else {
							//query failed
							header('Location:club.php?er=ed');
						}
					} else {
						//query failed
						header('Location:club.php?er=ed');
					}
				} else {
					//no tt
					header('Location:club.php');
				}
			} else {
				//empty fields redirect to cards
				header('Location:club.php');
			}
		} else {
			//redirect to form not submit 404
			header('Location:club.php');	
		}
	} else {
		//error page 404
		header('Location:club.php');
	}	
?>