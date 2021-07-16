<?php
    include_once('../../php/db.php');
    if(!isset($_SESSION[''])){
        session_start();
    }
    if(isset($_SESSION["clubId"])){
        $getCard = "SELECT * FROM club WHERE clubId='".$_SESSION["clubId"]."'";
        $resultCard = mysqli_query($con, $getCard);
        if(mysqli_num_rows($resultCard) != 0){
            while($row = mysqli_fetch_array($resultCard)){
                $clubType = $row['clubType'];
                $district = $row['district'];
                $operatorName = $row['operatorName'];
                $operatorEmail = $row['operatorEmail'];
                $operatorMobile = $row['operatorMobile'];
                $operatorWhatsapp = $row['operatorWhatsapp'];
                $operatorNic = $row['operatorNic'];
                $regType = $row['regType'];
                $requestLetter = $row['requestLetter'];
                $affiliationCat = $row['affiliationCat'];
                $clubContactOne = $row['clubContactOne'];
                $clubContactTwo = $row['clubContactTwo'];
                $clubEmailOne = $row['clubEmailOne'];
                $clubEmailTwo = $row['clubEmailTwo'];
                $postalAddress = $row['postalAddress'];
                $inchargeName = $row['inchargeName'];
                $inchargeMobile = $row['inchargeMobile'];
                $inchargeEmail = $row['inchargeEmail'];
                $status = $row['status'];
                if($clubType == 1){
                    $clubType = "School";
                } else if($clubType == 2) {
                    $clubType = "Club";
                }
                if($regType == 1){
                    $regType = "New Registration";
                } else if($regType == 2) {
                    $regType = "Existing Registration";
                }
                if($status == 1){
                    $status = "Active";
                } else if($status == 2) {
                    $status = "Inactive";
                }
                if($affiliationCat == 1){
                    $affiliationCat = "Swimming";
                } else if($affiliationCat == 2) {
                    $affiliationCat = "Artistic Swimming";
                } else if($affiliationCat == 3) {
                    $affiliationCat = "Water Polo";
                } else if($affiliationCat == 4) {
                    $affiliationCat = "Diving";
                } else if($affiliationCat == 5) {
                    $affiliationCat = "All";
                }
            }
        } else {
            //card exists
            header('Location:dashboard.php');
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
    <title style="text-transform:uppercase;"><?php echo $_SESSION["clubName"] ?></title>
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
                        <li class="nav-item search-box">

                        </li>
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
                        <h4 class="page-title">Profile</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="">
                                        <a href="dashboard.php">Home</a>
                                    </li>
                                    <li class="mdi mdi-arrow-right-bold" aria-current="page">Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    if(isset($_GET['er'])){
                        if(!empty($_GET['er'])){
                            $error = $_GET['er'];
                            if($error == "er"){
                                echo '<div class="col-md-12">
                                    <span style="color:red;margin-left:20px;">Couldn\'t save the changes, try again.</span>
                                    <div class="col-lg-12"><hr/></div>
                                </div>';
                            } else if ($error == "su"){
                                echo '<div class="col-md-12">
                                    <span style="color:green;margin-left:20px;">Updated succesfully.</span>
                                    <div class="col-lg-12"><hr/></div>
                                </div>';
                            }
                        }
                    }
                ?>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="col-md-12">Request Letter</label>
                                    <div class="col-md-12">
                                        <a href="../adminPages/download.php?id=<?php echo $_SESSION["clubId"]; ?>">Download The Application</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Club Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="<?php echo $_SESSION["clubName"]; ?>"
                                            class="form-control form-control-line" disabled="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Reg Status</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="<?php echo $status; ?>"
                                            class="form-control form-control-line" disabled="">
                                    </div>
                                </div>
                                <div class="form-group col-md-12" style="padding-bottom: 1px;"> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group col-md-12">
                                    <label class="">Club Information</label>
                                    <hr/>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Type</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="<?php echo $clubType; ?>"
                                            class="form-control form-control-line" disabled="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Registration Type</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="<?php echo $regType; ?>"
                                            class="form-control form-control-line" disabled="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Affiliation Category</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="<?php echo $affiliationCat; ?>"
                                            class="form-control form-control-line" disabled="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">District</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="<?php echo $district; ?>"
                                            class="form-control form-control-line" disabled="">
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <form role="form" action="profileEdit.php" method="POST" class="contact-one__form">
                    <div class="col-lg-12 col-xlg-12">
                        <div class="card">
                            <div class="card-body row">
                                <div class="form-group col-md-12">
                                    <label class="">Operator Information</label>
                                    <hr/>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="col-md-12">Operator Name</label>
                                    <div class="col-md-12">
                                        <input id="name" name="name" type="text" value="<?php echo $operatorName; ?>"
                                            class="form-control form-control-line" required pattern="^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$" title="Only Letters">
                                    </div>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="col-md-12">Operator Email</label>
                                    <div class="col-md-12">
                                        <input id="email" name="email" type="email" value="<?php echo $operatorEmail; ?>"
                                            class="form-control form-control-line" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="col-md-12">Operator Mobile</label>
                                    <div class="col-md-12">
                                        <input type="text" maxlength="10" placeholder="<?php echo $operatorMobile; ?>"
                                            class="form-control form-control-line" disabled="">
                                    </div>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="col-md-12">Operator WhatsApp</label>
                                    <div class="col-md-12">
                                        <input id="wtzap" maxlength="10" name="wtzap" type="tel" value="<?php echo $operatorWhatsapp; ?>"
                                            class="form-control form-control-line" pattern="[0-9]{10}" title="Only 10 numbers">
                                    </div>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="col-md-12">Operator NIC</label>
                                    <div class="col-md-12">
                                        <input id="nic" name="nic" type="text" value="<?php echo $operatorNic; ?>"
                                            class="form-control form-control-line" required pattern="^(?:19|20)?\d{2}[0-9]{10}|[0-9]{9}[x|X|v|V]$" title="Should match NIC format">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="">Club Contact Information</label>
                                    <hr/>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="col-md-12">Club Address</label>
                                    <div class="col-md-12">
                                        <input id="adrs" name="adrs" type="text" value="<?php echo $postalAddress; ?>"
                                            class="form-control form-control-line" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="col-md-12">Club Contact Primary</label>
                                    <div class="col-md-12">
                                        <input id="cp1" maxlength="10" name="cp1" type="tel" value="<?php echo $clubContactOne; ?>"
                                            class="form-control form-control-line" required pattern="[0-9]{10}" title="Only 10 numbers">
                                    </div>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="col-md-12">Club Contact Secondary</label>
                                    <div class="col-md-12">
                                        <input id="cp2" maxlength="10" name="cp2" type="tel" value="<?php echo $clubContactTwo; ?>"
                                            class="form-control form-control-line" pattern="[0-9]{10}" title="Only 10 numbers">
                                    </div>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="col-md-12">Club Email Primary</label>
                                    <div class="col-md-12">
                                        <input id="cemail1" name="cemail1" type="email" value="<?php echo $clubEmailOne; ?>"
                                            class="form-control form-control-line" >
                                    </div>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="col-md-12">Club Email Secondary</label>
                                    <div class="col-md-12">
                                        <input id="cemail2" name="cemail2" type="email" value="<?php echo $clubEmailTwo; ?>"
                                            class="form-control form-control-line" >
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="">Incharge Information</label>
                                    <hr/>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="col-md-12">Incharge Name</label>
                                    <div class="col-md-12">
                                        <input id="iname" name="iname" type="text" value="<?php echo $inchargeName; ?>"
                                            class="form-control form-control-line" required pattern="^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$" title="Only Letters">
                                    </div>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="col-md-12">Incharge Mobile</label>
                                    <div class="col-md-12">
                                        <input id="imobile" maxlength="10" name="imobile" type="tel" value="<?php echo $inchargeMobile; ?>"
                                            class="form-control form-control-line" pattern="[0-9]{10}" title="Only 10 numbers" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="col-md-12">Incharge Email</label>
                                    <div class="col-md-12">
                                        <input id="iemail" name="iemail" type="email" value="<?php echo $inchargeEmail; ?>"
                                            class="form-control form-control-line" >
                                    </div>
                                </div>
                                <div class="col-md-12" style="text-align: center;">
                                    <input type="submit" name="submit" value="Edit" onclick="return clicked();" id="submit" class="btn btn-success" style="margin: auto;"></input>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
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