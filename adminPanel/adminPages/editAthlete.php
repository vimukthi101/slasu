<?php
	include_once('../../php/db.php');
	if(!isset($_SESSION[''])){
        session_start();
    }
    if(isset($_SESSION["adminId"])){
	    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && isset($_POST['id'])){
	        if(!empty($_POST['id'])){
	        	$id = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['id'])));
	            $getCard = "SELECT * FROM athlete WHERE athleteId='".$id."'";
	            $resultCard = mysqli_query($con, $getCard);
	            if(mysqli_num_rows($resultCard) != 0){
	            	while($row = mysqli_fetch_array($resultCard)){
                        $clubId = $row['clubId'];
                        if($clubId != 0){
                            $queryClub = "SELECT clubName FROM `club` WHERE clubId='".$clubId."'";
                            $resultClub = mysqli_query($con, $queryClub);
                            if(mysqli_num_rows($resultClub) != 0){
                                while($rowClub = mysqli_fetch_array($resultClub)){
                                    $clubName = $rowClub['clubName'];
                                }
                            }
                        } else {
                            $clubName = "Unattached";
                        }
	                    $affiliationCat = $row['affiliationCat'];
	                    $athleteName = $row['athleteName'];
	                    $gender = $row['gender'];
	                    $dob = $row['dob'];
	                    $address = $row['address'];
	                    $phone1 = $row['phone1'];
	                    $phone2 = $row['phone2'];
	                    $whatsapp = $row['whatsapp'];
	                    $email = $row['email'];
	                    $nameForCert = $row['nameForCert'];
	                    $bbNo = $row['bbNo'];
	                    $bbDistrict = $row['bbDistrict'];
	                    $bbDate = $row['bbDate'];
	                    $bbPhoto = $row['bbPhoto'];
	                    $postalId = $row['postalId'];
	                    $nic = $row['nic'];
	                    $ppNo = $row['ppNo'];
	                    if($gender == 1){
	                        $gender = "Male";
	                    } else if($gender == 2) {
	                        $gender = "Female";
	                    } 
                        if($affiliationCat == 1){
                            $affiliationCat = "Swimming";
                        } else if($affiliationCat == 2) {
                            $affiliationCat = "Artistic Swimming";
                        } else if($affiliationCat == 3) {
                            $affiliationCat = "Water Polo";
                        } else if($affiliationCat == 4) {
                            $affiliationCat = "Diving";
                        }
	            	}
	            } else {
	                //card exists
	                header('Location:athlete.php');
	            }
	        } else {
	            //empty fields redirect to cards
	            header('Location:athlete.php');
	        }
	    } else {
	        //if submit button is not clicked
	        header('Location:athlete.php');	
	    }
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title style="text-transform:uppercase;"><?php echo $_SESSION["firstName"] ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon/favicon.png">
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
        <style type="text/css">
        .footer {
  position: inherit;
  left: 0;
  bottom: 0;
  width: 100%;
}

    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full"
        data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <a href="dashboard.php" class="logo">
                            <!-- Logo icon -->
                            <b class="logo-icon">
                                <!-- Light Logo icon -->
                                <img src="../../assets/images/logo-1-1.png" width="200" height="50" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-start me-auto">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-end">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../../assets/images/resources/testi-1-1.png" alt="user" class="rounded-circle" width="31">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="profile.php"><i class="mdi mdi-account-network"></i>
                                    My Profile</a>
                                    <a class="dropdown-item" href="changepwd.php"><i class="mdi mdi-key"></i>
                                    Change Password</a>
                                <a class="dropdown-item" href="../../php/logout.php"><i class="mdi mdi-logout"></i>
                                        Log Out</a>
                            </ul>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php"
                                aria-expanded="false">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="admin.php"
                                aria-expanded="false">
                                <i class="mdi mdi-key"></i>
                                <span class="hide-menu">Admins</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="club.php"
                                aria-expanded="false">
                                <i class="mdi mdi-home "></i>
                                <span class="hide-menu">Clubs</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="athlete.php"
                                aria-expanded="false">
                                <i class="mdi mdi-human-child"></i>
                                <span class="hide-menu">Athletes</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="coach.php"
                                aria-expanded="false">
                                <i class="mdi mdi-av-timer"></i>
                                <span class="hide-menu">Coaches</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="sendPayments.php"
                                aria-expanded="false">
                                <i class="mdi mdi-cash-multiple"></i>
                                <span class="hide-menu">Unattached Registration</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="payments.php"
                                aria-expanded="false">
                                <i class="mdi mdi-cash"></i>
                                <span class="hide-menu">Approve Payment</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class=""><a href="dashboard.php">Home</a></li>
                                    <li class="mdi mdi-arrow-right-bold" aria-current="page"><a href="athlete.php">Athletes</a></li>
                                    <li class="mdi mdi-arrow-right-bold" aria-current="page">Edit</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <!-- column -->
                    <form role="form" action="athleteEdit.php" method="POST" class="contact-one__form" enctype="multipart/form-data">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Athlete Information</h4>
                            </div>
                            <div class="card-body row">
		                        <?php
		                         echo '<div class="form-group col-md-12">
                                            <label class="">Club Information</label>
                                            <hr/>
                                        </div>
                                        <div class="col-md-6">
                                <label class="" for="inputGroupSelect01">Club *</label><br/>
                              <select class="form-select form-control" id="club" name="club" required>
                                <option selected value='.$clubId.'>'.$clubName.'</option>';
                                $getClub = "SELECT * FROM club";
                                $resultClub = mysqli_query($con, $getClub);
                                if(mysqli_num_rows($resultClub) != 0){
                                    while($rowClub = mysqli_fetch_array($resultClub)){
                                        $newClubId = $rowClub['clubId'];
                                        $newClubName = $rowClub['clubName'];
                                        echo '<option value="'.$newClubId.'">'.$newClubName.'</option>';
                                    }
                                }
                              echo '</select>
                        </div><!-- /.col-md-12 -->
                                        <div class="form-group col-md-12">
		                                    <label class="">Personal Information</label>
		                                    <hr/>
		                                </div>
		                         		<div class="form-group col-md-5">
		                                    <label class="">Full Name</label>
		                                    <div class="">
		                                        <input type="text" value="'.$athleteName.'" class="form-control form-control-line" name="name" id="name" required pattern="^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$" title="Only Letters">
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Name For Certificate</label>
		                                    <div class="">
		                                        <input type="text" value="'.$nameForCert.'" class="form-control form-control-line" name="nameForId" id="nameForId" required pattern="^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$" title="Only Letters">
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Address</label>
		                                    <div class="">
		                                        <input type="text" value="'.$address.'" class="form-control form-control-line" name="postal" id="postal" required>
		                                    </div>
		                                </div>
                                        <div class="col-md-5" style="margin-bottom: 10px;">
                                    <label class="" for="inputGroupSelect01">Gender *</label><br/>
                                  <select class="form-select form-control" id="gender" name="gender" required>';
                                    if($gender == "Male"){
                                        echo '<option selected value="Male">Male</option>
                                    <option value="Female">Female</option></select>
                            </div>';
                                    } else {
                                        echo '<option value="Male">Male</option>
                                    <option selected value="Female">Female</option></select>
                            </div>';
                                    }
		                                echo '<div class="form-group col-md-12">
                                <label class="">Date Of Birth *</label>
                            </div>
                            <div class="col-md-5">
                                <input type="date" name="dob" value="'.$dob.'" id="dob" required class="form-control form-control-line">
                            </div>
                                        <div class="form-group col-md-12">
		                                    <label class="">Contact Information</label>
		                                    <hr/>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Primary Contact Number</label>
		                                    <div class="">
		                                        <input type="tel" value="'.$phone1.'" maxlength="10" class="form-control form-control-line" name="phone1" id="phone1" required>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Secondary Contact Number</label>
		                                    <div class="">
		                                        <input type="tel" value="'.$phone2.'" maxlength="10" class="form-control form-control-line" name="phone2" id="phone2">
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">WhatsApp Number</label>
		                                    <div class="">
		                                        <input type="tel" value="'.$whatsapp.'" maxlength="10" class="form-control form-control-line" name="whatsapp" id="whatsapp">
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Email</label>
		                                    <div class="">
		                                        <input type="text" value="'.$email.'" class="form-control form-control-line" name="emailAd" id="emailAd">
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-12">
		                                    <label class="">ID Information</label>
		                                    <hr/>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Postal ID</label>
		                                    <div class="">
		                                        <input type="text" value="'.$postalId.'" class="form-control form-control-line" name="postalId" id="postalId">
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">NIC</label>
		                                    <div class="">
		                                        <input type="text" value="'.$nic.'" class="form-control form-control-line" name="nic" id="nic" pattern="^(?:19|20)?\d{2}[0-9]{10}|[0-9]{9}[x|X|v|V]$" title="Should match NIC format">
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Passport Number</label>
		                                    <div class="">
		                                        <input type="text" value="'.$ppNo.'" class="form-control form-control-line" name="ppno" id="ppno" pattern="^(?!^0+$)[a-zA-Z0-9]{6,9}$" title="Should be a valid passport number">
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-12">
		                                    <label class="">Birth Certificate Information</label>
		                                    <hr/>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Birth Certificate Number</label>
		                                    <div class="">
		                                        <input type="text" value="'.$bbNo.'" class="form-control form-control-line" name="bbno" id="bbno" require>
		                                    </div>
		                                </div>
		                                <div class="col-md-6">
                                <label class="" for="inputGroupSelect01">Select Birth Certificate Issued District *</label><br/>
                              <select class="form-select form-control" id="district" name="district" required>
                                <option selected value='.$bbDistrict.'>'.$bbDistrict.'</option>
                                <option value="Ampara">Ampara</option>
                                <option value="Anuradhapura">Anuradhapura</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Batticaloa">Batticaloa</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Galle">Galle</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Hambantota">Hambantota</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Kalutara">Kalutara</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Kegalle">Kegalle</option>
                                <option value="Kilinochchi">Kilinochchi</option>
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="Mannar">Mannar</option>
                                <option value="Matale">Matale</option>
                                <option value="Matara">Matara</option>
                                <option value="Monaragala">Monaragala</option>
                                <option value="Mullaitivu">Mullaitivu</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                <option value="Polonnaruwa">Polonnaruwa</option>
                                <option value="Puttalam">Puttalam</option>
                                <option value="Ratnapura">Ratnapura</option>
                                <option value="Trincomalee">Trincomalee</option>
                                <option value="Vavuniya">Vavuniya</option>
                              </select>
                        </div><!-- /.col-md-12 -->
		                                <div class="form-group col-md-5">
		                                    <label class="">Birth Certificate Issued Date</label>
		                                    <div class="">
		                                        <input type="text" value="'.$bbDate.'" class="form-control form-control-line" name="bbdate" id="bbdate" required>
		                                    </div>
		                                </div>
		                                <div class="col-md-12">
                            <label class="">Upload Birth Certficate *</label>
                        </div>
                        <div class="col-md-5">
                            <input type="file" accept="application/pdf" class="custom-file-input form-control" id="bbPhoto" name="bbPhoto"/>
                            <label class="custom-file-label" for="inputGroupFile01">Choose File</label>
                    </div><!-- /.col-md-12 -->
                    <div class="col-lg-12"><hr/></div>
                                    <input type="text" value="'.$id.'" name="athleteId" id="athleteId" required hidden>
                                <div class="col-md-12" style="text-align: center;">
                                    <input type="submit" name="submit" value="Edit" onclick="return clicked();" id="submit" class="btn btn-success" style="margin: auto;"></input>
                                </div><!-- /.col-md-12 -->
		                                ';
		                        ?>
                        	</div>	
                        </div></form>
                    </div>

                </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Sri Lanka Aquatic Sports Union. Designed and Developed by
                <a href="http://striking.lk/" target="_blank">Strking Group</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../dist/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="../dist/js/pages/dashboards/dashboard1.js"></script>
</body>
<script type="text/javascript">
    function clicked() {
       if (confirm('Do you want to update the details?')) {
           yourformelement.submit();
       } else {
           return false;
       }
    }
</script>
</html>
<?php
} else {
    session_destroy();
    header('Location:../../login.php');
}
?>