<?php
	include_once('../../php/db.php');
	if(!isset($_SESSION[''])){
        session_start();
    }
    if(isset($_SESSION["adminId"])){
	    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && isset($_POST['id'])){
	        if(!empty($_POST['id'])){
	        	$id = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['id'])));
	            $getCard = "SELECT * FROM coach WHERE coachId='".$id."'";
	            $resultCard = mysqli_query($con, $getCard);
	            if(mysqli_num_rows($resultCard) != 0){
	            	while($row = mysqli_fetch_array($resultCard)){
	                    $affiliationCat = $row['affiliationCat'];
	                    $athleteName = $row['coachName'];
	                    $gender = $row['gender'];
	                    $dob = $row['dob'];
	                    $address = $row['homeAddress'];
	                    $phone1 = $row['coachMobileOne'];
	                    $phone2 = $row['coachMobileTwo'];
	                    $whatsapp = $row['coachWhatsapp'];
	                    $email = $row['coachEmail'];
	                    $nameForCert = $row['coachNameForId'];
	                    $application = $row['application'];
	                    $designation = $row['designation'];
	                    $qualifications = $row['qualifications'];
	                    $photoForId = $row['photoForId'];
	                    $ppNo = $row['ppNo'];
	                    $nic = $row['nic'];
	                    $nicPhoto = $row['nicPhoto'];
	                    if($gender == 1){
	                        $gender = "Male";
	                    } else if($gender == 2) {
	                        $gender = "Female";
	                    } 
	                    if($affiliationCat == 1){
	                        $affiliationCat = "Swimming";
	                    } else if($affiliationCat == 2) {
	                        $affiliationCat = "Water Polo";
	                    } else if($affiliationCat == 3) {
	                        $affiliationCat = "High Diving";
	                    } else if($affiliationCat == 4) {
	                        $affiliationCat = "Free Swimming";
	                    }
	            	}
	            } else {
	                //card exists
	                header('Location:coach.php');
	            }
	        } else {
	            //empty fields redirect to cards
	            header('Location:coach.php');
	        }
	    } else {
	        //if submit button is not clicked
	        header('Location:coach.php');	
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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="payments.php"
                                aria-expanded="false">
                                <i class="mdi mdi-cash"></i>
                                <span class="hide-menu">Payment Status</span>
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
                                    <li class="mdi mdi-arrow-right-bold" aria-current="page"><a href="coach.php">Coaches</a></li>
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
                    <form role="form" action="coachEdit.php" method="POST" class="contact-one__form" enctype="multipart/form-data">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Coach Information</h4>
                            </div>
                            <div class="card-body row">
		                        <?php
		                         echo '<div class="form-group col-md-12">
		                                    <label class="">Personal Information</label>
		                                    <hr/>
		                                </div>
                                        <div class="col-md-5">
                                            <label class="">Upload Passport Size Photo for ID</label>
                                        </div>
                                        <div class="">
                                            <input type="file" class="custom-file-input form-control" id="photo" name="photo"/>
                                            <label class="custom-file-label" for="inputGroupFile01">Choose File</label>
                                    </div><!-- /.col-md-12 -->
                                        
		                         		<div class="form-group col-md-5">
		                                    <label class="">Full Name</label>
		                                    <div class="">
		                                        <input type="text" value="'.$athleteName.'"
		                                            class="form-control form-control-line" name="name" id="name" required pattern="^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$" title="Only Letters">
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Name For ID</label>
		                                    <div class="">
		                                        <input type="text" value="'.$nameForCert.'"
		                                            class="form-control form-control-line" name="nameForId" id="nameForId" required pattern="^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$" title="Only Letters">
		                                    </div>
		                                </div>
                                        <div class="form-group col-md-5">
                                            <label class="">Designation</label>
                                            <div class="">
                                                <input type="text" value="'.$designation.'"
                                                    class="form-control form-control-line" name="designation" id="designation" pattern="[A-Za-z]+" title="Only Letters">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="">DOB</label>
                                            <div class="">
                                                <input type="date" value="'.$dob.'"
                                                    class="form-control form-control-line" name="dob" id="dob" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="">Address</label>
                                            <div class="">
                                                <input type="text" value="'.$address.'"
                                                    class="form-control form-control-line" name="address" id="address" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                        <label>Academic Qualifications in Aquatic Sports (Add all separated by commas)</label>
                                        <div class="col-md-12">
                        <textarea name="qualification" id="qualification" class="form-control">'.$qualifications.'</textarea>
                        </div>
                    </div><!-- /.col-md-12 -->
		                                <div class="col-md-6" style="margin-bottom: 10px;">
                                    <label class="" for="inputGroupSelect01">Gender *</label><br/>
                                  <select class="form-control form-select" id="gender" name="gender" required>';
                                    if($gender == "Male"){
                                        echo '<option selected value="Male">Male</option>
                                    <option value="Female">Female</option></select>
                            </div>';
                                    } else {
                                        echo '<option value="Male">Male</option>
                                    <option selected value="Female">Female</option></select>
                            </div>';
                                    }
		                                echo '
		                                <div class="form-group col-md-12">
		                                    <label class="">Contact Information</label>
		                                    <hr/>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Primary Contact Number</label>
		                                    <div class="">
		                                        <input type="text" value="'.$phone1.'"
		                                            class="form-control form-control-line" name="phone1" id="phone1" pattern="[0-9]{10}" title="Only 10 numbers" required>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Secondary Contact Number</label>
		                                    <div class="">
		                                        <input type="text" value="'.$phone2.'"
		                                            class="form-control form-control-line" name="phone2" id="phone2" pattern="[0-9]{10}" title="Only 10 numbers">
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">WhatsApp Number</label>
		                                    <div class="">
		                                        <input type="text" value="'.$whatsapp.'"
		                                            class="form-control form-control-line" name="whatsapp" id="whatsapp" pattern="[0-9]{10}" title="Only 10 numbers">
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Email</label>
		                                    <div class="">
		                                        <input type="text" value="'.$email.'"
		                                            class="form-control form-control-line" name="emailAd" id="emailAd">
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-12">
		                                    <label class="">ID Information</label>
		                                    <hr/>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">NIC</label>
		                                    <div class="">
		                                        <input type="text" value="'.$nic.'"
		                                            class="form-control form-control-line" name="nic" id="nic" required pattern="^(?:19|20)?\d{2}[0-9]{10}|[0-9]{9}[x|X|v|V]$" title="Should match NIC format">
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Passport Number</label>
		                                    <div class="">
		                                        <input type="text" value="'.$ppNo.'"
		                                            class="form-control form-control-line" name="ppno" id="ppno" pattern="^(?!^0+$)[a-zA-Z0-9]{6,9}$" title="Should be a valid passport number">
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-12">
		                                    <label class="">NIC Photo</label>
		                                    <div class="col-md-5">
                            <input type="file" class="custom-file-input form-control" id="nicPhoto" name="nicPhoto"/>
                            <label class="custom-file-label" for="inputGroupFile01">Choose File</label>
                    </div>
		                                </div>                    <div class="col-lg-12"><hr/></div>
                                    
                                <div class="col-md-12" style="text-align: center;">
                                <input type="text" value="'.$id.'" name="athleteId" id="athleteId" required hidden>
                                    <input type="submit" name="submit" value="Edit" onclick="return clicked();" id="submit" class="btn btn-success" style="margin: auto;"></input>
                                </div><!-- /.col-md-12 -->
		                                ';
		                        ?>
                        	</div>	
                        </div>
                    </div></form>
                    
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