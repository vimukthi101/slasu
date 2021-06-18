<?php
	include_once('../../php/db.php');
	if(!isset($_SESSION[''])){
        session_start();
    }
    if(isset($_SESSION["adminId"])){
	    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && isset($_POST['id'])){
	        if(!empty($_POST['id'])){
	        	$id = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['id'])));
	            $getCard = "SELECT * FROM club WHERE clubId='".$id."'";
	            $resultCard = mysqli_query($con, $getCard);
	            if(mysqli_num_rows($resultCard) != 0){
	            	while($row = mysqli_fetch_array($resultCard)){
	                    $clubType = $row['clubType'];
	                    $clubName = $row['clubName'];
	                    $district = $row['district'];
	                    $operatorName = $row['operatorName'];
	                    $operatorEmail = $row['operatorEmail'];
	                    $operatorMobile = $row['operatorMobile'];
	                    $operatorWhatsapp = $row['operatorWhatsapp'];
	                    $operatorNic = $row['operatorNic'];
	                    $regType = $row['regType'];
	                    $requestLetter = $row['requestLetter'];
	                    $affiliationCat = $row['affiliationCat'];
	                    $postalAddress = $row['postalAddress'];
	                    $clubContactOne = $row['clubContactOne'];
	                    $clubContactTwo = $row['clubContactTwo'];
	                    $clubEmailOne = $row['clubEmailOne'];
	                    $clubEmailTwo = $row['clubEmailTwo'];
	                    $inchargeName = $row['inchargeName'];
                        $inchargeMobile = $row['inchargeMobile'];
                        $inchargeEmail = $row['inchargeEmail'];
                        $status = $row['status'];
	                    if($clubType == 1){
	                        $clubType = "School";
	                    } else if($clubType == 2) {
	                        $clubType = "Club";
	                    } 
                        if($status == 1){
                            $status = "Inactive";
                        } else if($status == 2) {
                            $status = "Active";
                        } else if($status == 3) {
                            $status = "Disabled";
                        } 
                        if($regType == 1){
                            $regType = "New Registration";
                        } else if($regType == 2) {
                            $regType = "Existing";
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
                                    <li class="mdi mdi-arrow-right-bold" aria-current="page"><a href="athlete.php">Clubs</a></li>
                                    <li class="mdi mdi-arrow-right-bold" aria-current="page">View</li>
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
                    <div class="col-12">
                        <form role="form" action="club-registration-confirm.php" method="POST" class="contact-one__form" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Club Information</h4>
                            </div>
                            <div class="card-body row">
		                        <?php
		                         echo '<div class="form-group col-md-12">
		                                    <label class="">Club Information</label>
		                                    <hr/>
		                                </div>
		                         		<div class="form-group col-md-5">
		                                    <label class="">Club Name</label>
		                                    <div class="">
		                                        <input type="text" value="'.$clubName.'"
		                                            class="form-control form-control-line" id="name" name="name" required pattern="^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$" title="Only Letters">
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Status</label>
		                                    <div class="">
                                              <select class="form-select form-control" id="status" name="status" required>
                                                <option selected value="'.$status.'">'.$status.'</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                                <option value="Disabled">Disabled</option>
                                              </select>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Type</label>
		                                    <div class="">
		                                        <input type="text" placeholder="'.$clubType.'"
		                                            class="form-control form-control-line" disabled>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Affiliation Category</label>
		                                    <div class="">
		                                        <select class="form-select form-control" id="category" name="category" required>
                                                    <option selected value="'.$affiliationCat.'">'.$affiliationCat.'</option>
                                                    <option value="Swimming">Swimming</option>
                                                    <option value="Water Polo">Water Polo</option>
                                                    <option value="High Diving">High Diving</option>
                                                    <option value="Free Swimming">Free Swimming</option>
                                                  </select>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Registration Type</label>
		                                    <div class="">
		                                        <input type="text" placeholder="'.$regType.'"
		                                            class="form-control form-control-line" disabled>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">District</label>
		                                    <div class="">
		                                        <select class="form-select form-control" id="district" name="district" required>
                                                    <option selected value="'.$district.'">'.$district.'</option>
                                                    <option value="Colombo">Colombo</option>
                                                    <option value="Galle">Galle</option>
                                                    <option value="Kandy">Kandy</option>
                                                  </select>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-12">
		                                    <label class="">Club Contact Information</label>
		                                    <hr/>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Postal Address</label>
		                                    <div class="">
		                                        <input type="text" value="'.$postalAddress.'"
		                                            class="form-control form-control-line" name="clubAddress" id="clubAddress" required> 
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Primary Contact Number</label>
		                                    <div class="">
		                                        <input type="tel" value="'.$clubContactOne.'"
		                                            class="form-control form-control-line" name="clubPhone1" pattern="[0-9]{10}" title="Only 10 numbers" id="clubPhone1" required>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Secondary Contact Number</label>
		                                    <div class="">
		                                        <input type="tel" placeholder="'.$clubContactTwo.'"
		                                            class="form-control form-control-line" name="clubPhone2" pattern="[0-9]{10}" title="Only 10 numbers" id="clubPhone2">
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Email One</label>
		                                    <div class="">
		                                        <input type="email" value="'.$clubEmailOne.'"
		                                            class="form-control form-control-line" name="clubEmail1" id="clubEmail1">
		                                    </div>
		                                </div>
                                        <div class="form-group col-md-5">
                                            <label class="">Email Two</label>
                                            <div class="">
                                                <input type="email" value="'.$clubEmailTwo.'"
                                                    class="form-control form-control-line" name="clubEmail2" id="clubEmail2">
                                            </div>
                                        </div>
		                                <div class="form-group col-md-12">
		                                    <label class="">Operator Information</label>
		                                    <hr/>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Operator Name</label>
		                                    <div class="">
		                                        <input type="text" value="'.$operatorName.'"
		                                            class="form-control form-control-line" name="operatorName" id="operatorName" required pattern="^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$" title="Only Letters">
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Operator Email</label>
		                                    <div class="">
		                                        <input type="email" value="'.$operatorEmail.'"
		                                            class="form-control form-control-line" name="operatorEmail" id="operatorEmail" required>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Operator Mobile</label>
		                                    <div class="">
		                                        <input type="text" placeholder="'.$operatorMobile.'"
		                                            class="form-control form-control-line" disabled>
		                                    </div>
		                                </div>
                                        <div class="form-group col-md-5">
                                            <label class="">Operator WhatsApp</label>
                                            <div class="">
                                                <input type="tel" value="'.$operatorWhatsapp.'"
                                                    class="form-control form-control-line" pattern="[0-9]{10}" title="Only 10 numbers" name="whatsapp" id="whatsapp">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="">Operator NIC</label>
                                            <div class="">
                                                <input type="text" value="'.$operatorNic.'"
                                                    class="form-control form-control-line" name="operatorNic" id="operatorNic" required pattern="^(?:19|20)?\d{2}[0-9]{10}|[0-9]{9}[x|X|v|V]$" title="Should match NIC format">
                                            </div>
                                        </div>
		                                <div class="form-group col-md-12">
		                                    <label class="">Incharge Information</label>
		                                    <hr/>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Incharge Name</label>
		                                    <div class="">
		                                        <input type="text" value="'.$inchargeName.'"
		                                            class="form-control form-control-line" name="inchargeName" required pattern="^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$" title="Only Letters">
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Incharge Mobile</label>
		                                    <div class="">
		                                        <input type="tel" value="'.$inchargeMobile.'"
		                                            class="form-control form-control-line" name="inchargePhone" pattern="[0-9]{10}" title="Only 10 numbers" required>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Incharge Email</label>
		                                    <div class="">
		                                        <input type="email" value="'.$inchargeEmail.'"
		                                            class="form-control form-control-line" name="inchargeEmail">
		                                    </div>
		                                </div>
		                                <div class="col-md-12">
                                                <label class="">Upload Request Letter *</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="file" class="custom-file-input form-control" id="application" name="application"/>
                                                <label class="custom-file-label" for="inputGroupFile01">Choose File</label>
                                        </div><!-- /.col-md-12 -->
                                        <div class="col-lg-12"><hr/></div>
                                    
                                <div class="col-md-12" style="text-align: center;">
                                <input type="text" value="'.$id.'" name="clubId" id="clubId" hidden>
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