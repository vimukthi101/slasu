<?php
	include_once('db.php');
    if(!isset($_SESSION[''])){
        session_start();
    }
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        if(!empty($_POST['optradio']) && !empty($_POST['name']) && !empty($_POST['district']) && !empty($_POST['operatorName']) && !empty($_POST['operatorEmail']) && !empty($_POST['phone']) && !empty($_POST['operatorNic']) && !empty($_POST['regRadio']) && !empty($_POST['category']) && !empty($_POST['clubAddress']) && !empty($_POST['clubPhone1']) && !empty($_POST['inchargeName']) && !empty($_POST['inchargePhone'])){
                $allowTypes = array('jpg','png','jpeg'); 
                if(!empty($_FILES["requestLetter"]["name"])){
                    $fileNameApplication = basename($_FILES["requestLetter"]["name"]); 
                    $fileTypeApplication = pathinfo($fileNameApplication, PATHINFO_EXTENSION);
                    if(in_array($fileTypeApplication, $allowTypes)){
                        $requestLetter = $_FILES['requestLetter']['tmp_name']; 
                        $applicationContent = addslashes(file_get_contents($requestLetter));
                    } else {
                        session_destroy();
                        header('Location:../club-registration.php?er=wi');
                    }
                } else {
                    $requestLetter = "";
                }
                $optradio   = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['optradio'])));
                $name = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['name'])));
                $district = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['district'])));
                $operatorName = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['operatorName'])));
                $operatorEmail = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['operatorEmail'])));
                $phone = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['phone'])));
                if(!empty($_POST['whatsapp'])){
                    $whatsapp = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['whatsapp'])));
                } else {
                    $whatsapp = "";
                }
                $operatorNic = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['operatorNic'])));
                $regRadio = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['regRadio'])));
                $category = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['category'])));
                $clubAddress = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['clubAddress'])));
                $clubPhone1 = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['clubPhone1'])));
                if(!empty($_POST['clubPhone2'])){
                    $clubPhone2 = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['clubPhone2'])));
                } else {
                    $clubPhone2 = "";
                }
                if(!empty($_POST['clubEmail1'])){
                    $clubEmail1 = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['clubEmail1'])));
                } else {
                    $clubEmail1 = "";
                }
                if(!empty($_POST['clubEmail2'])){
                    $clubEmail2 = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['clubEmail2'])));
                } else {
                    $clubEmail2 = "";
                }
                $inchargeName = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['inchargeName'])));
                $inchargePhone = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['inchargePhone'])));
                if(!empty($_POST['inchargeEmail'])){
                    $inchargeEmail = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['inchargeEmail'])));
                } else {
                    $inchargeEmail = "";
                }
                $_SESSION["optradio"] = $optradio;
                $_SESSION["name"] = $name;
                $_SESSION["district"] = $district;
                $_SESSION["operatorName"] = $operatorName;
                $_SESSION["operatorEmail"] = $operatorEmail;
                $_SESSION["phone"] = $phone;
                $_SESSION["whatsapp"] = $whatsapp;
                $_SESSION["operatorNic"] = $operatorNic;
                $_SESSION["regRadio"] = $regRadio;
                $_SESSION["requestLetter"] = $requestLetter;
                $_SESSION["category"] = $category;
                $_SESSION["clubAddress"] = $clubAddress;
                $_SESSION["clubPhone1"] = $clubPhone1;
                $_SESSION["clubPhone2"] = $clubPhone2;
                $_SESSION["clubEmail1"] = $clubEmail1;
                $_SESSION["clubEmail2"] = $clubEmail2;
                $_SESSION["inchargeName"] = $inchargeName;
                $_SESSION["inchargePhone"] = $inchargePhone;
                $_SESSION["inchargeEmail"] = $inchargeEmail;
        } else {
            //empty fields
            session_destroy();
            header('Location:../club-registration.php?er=em');
        }
    } else {
        //if submit button is not clicked
        session_destroy();
        header('Location:../register.html');    
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aquatic Sports Union Sri Lanka</title>

    <!-- favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="../assets/images/favicon/site.webmanifest">

    <!-- Fonts URL -->
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:300,400,500,600,700,800%7CUbuntu:400,500,700&display=swap" rel="stylesheet">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="../assets/css/magnific-popup.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../assets/css/animate.css">
    <link rel="stylesheet" href="../assets/css/hover-min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/scubo-icons.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
</head>

<body>
    <div class="preloader">
        <img src="../assets/images/preloader.png" class="preloader__image" alt="">
    </div><!-- /.preloader -->
    <div class="page-wrapper">

        <div class="topbar-one">
            <div class="container">
                <div class="topbar-one__left">
                    <a href="../contact.html">Contact Us</a>
                    <a href="../login.php">Login</a>
                    <a href="../register.html">Register</a>
                </div><!-- /.topbar-one__left -->
                <div class="topbar-one__social">
                    <a href="https://www.facebook.com/aquaticslk/" target="_blank"><i class="fab fa-facebook-square"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div><!-- /.topbar-one__social -->
            </div><!-- /.container -->
        </div><!-- /.topbar-one -->

        <nav class="main-nav-one stricky">
            <div class="container">
                <!-- <div class="main-nav-one__infos">
                    <a class="main-nav-one__infos-phone" href="tel:666-888-0000"><i class="fa fa-phone-alt"></i>0711790372</a>
                    <a class="main-nav-one__infos-email" href="mailto:needhelp@example.com"><i class="fa fa-envelope"></i>needhelp@example.com</a>
                </div> -->
                <!-- /.main-nav-one__infos -->
                <div class="inner-container">
                    <div class="logo-box">
                        <a href="../index.html">
                            <img src="../assets/images/logo-1-1.png" alt="" width="280">
                        </a>
                        <a href="#" class="side-menu__toggler"><i class="fa fa-bars"></i></a>
                    </div><!-- /.logo-box -->
                    <div class="main-nav__main-navigation">
                        <ul class="main-nav__navigation-box">
                            <li><a href="../index.html">Home</a></li>
                            <li><a href="../news.html">News</a></li>
                            <li><a href="../gallery.html">Gallery</a></li>
                            <li><a href="../../download.html">Downloads</a></li>
                            <li><a href="../about.html">About Us</a></li>
                        </ul><!-- /.main-nav__navigation-box -->
                    </div><!-- /.main-nav__main-navigation -->
                </div><!-- /.inner-container -->
            </div><!-- /.container -->
        </nav><!-- /.main-nav-one -->


        <section class="page-header">
            <div class="page-header__bg" style="background-image: url(../assets/images/background/footer-bg-1-1.jpg);"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <ul class="list-unstyled thm-breadcrumb">
                    <li><a href="../index.html">Home</a></li>
                    <li><a href="../register.html">Register</a></li>
                    <li class="active">Club Registration</li>
                </ul><!-- /.list-unstyled -->
                <h2 class="page-header__title">Registration</h2><!-- /.page-header__title -->
            </div><!-- /.container -->
        </section><!-- /.page-header -->

        <section class="contact-one">
            <img src="../assets/images/shapes/fish-contact-1.png" class="contact-one__fish" alt="">
            <img src="../assets/images/shapes/tree-contact-1.png" class="contact-one__tree" alt="">
            <img src="../assets/images/shapes/swimmer-contact-1.png" class="contact-one__swimmer" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <form role="form" action="club-registration-controller.php" method="POST" class="contact-one__form">
                            <div class="row">
                                <div class="col-md-6">

<?php
echo '<p>optradio : '.$_SESSION["optradio"].'</p>
                      <p>Name : '.$_SESSION["name"].'</p>
                      <p>district : '.$_SESSION["district"].'</p>
                      <p>operatorName : '.$_SESSION["operatorName"].'</p>
                      <p>operatorEmail : '.$_SESSION["operatorEmail"].'</p>
                      <p>phone : '.$_SESSION["phone"].'</p>
                      <p>whatsapp : '.$_SESSION["whatsapp"].'</p>
                      <p>operatorNic : '.$_SESSION["operatorNic"].'</p>
                      <p>regRadio : '.$_SESSION["regRadio"].'</p>
                      <p>requestLetter : '.$fileNameApplication.'</p>
                      <p>category : '.$_SESSION["category"].'</p>
                      <p>clubAddress : '.$_SESSION["clubAddress"].'</p>
                      <p>clubPhone1 : '.$_SESSION["clubPhone1"].'</p>
                      <p>clubPhone2 : '.$_SESSION["clubPhone2"].'</p>
                      <p>clubEmail1 : '.$_SESSION["clubEmail1"].'</p>
                      <p>clubEmail2 : '.$_SESSION["clubEmail2"].'</p>
                      <p>inchargeName : '.$_SESSION["inchargeName"].'</p>
                      <p>inchargePhone : '.$_SESSION["inchargePhone"].'</p>
                      <p>inchargeEmail : '.$_SESSION["inchargeEmail"].'</p>';
?>
</div>
<div class="col-lg-12"><hr/></div>
                                
                                    <div class="col-md-12 checkbox">
                                        <label><input type="checkbox" id="conditions" name="conditions" value="conditions" required=""> I certify that above details are correct</label>
                                      </div>
                                    <div class="col-lg-12"><hr/></div>
                                      <div class="col-md-12" style="text-align: center;">
                                        <input type="submit" name="submit" value="SUBMIT" id="submit" class="thm-btn contact-one__btn" style="margin: auto;"></input>
                                    </div><!-- /.col-md-12 -->
                                
                            </div><!-- /.row -->
                        </form><!-- /.contact-one__form -->
                        <div class="result"></div><!-- /.result -->
                    </div><!-- /.col-xl-8 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.contact-one -->

<footer class="site-footer-one">

            <div class="site-footer-one__bg" style="background-image: url(../assets/images/background/footer-bg-1-1.jpg);"></div>
            <!-- /.site-footer-one__bg -->

            <!-- footer fishes -->
            <img src="../assets/images/shapes/fish-f-1.png" alt="" class="site-footer__fish-1">
            <img src="../assets/images/shapes/fish-f-2.png" alt="" class="site-footer__fish-2">
            <img src="../assets/images/shapes/fish-f-3.png" alt="" class="site-footer__fish-3">

            <!-- footer trees -->
            <img src="../assets/images/shapes/tree-f-1.png" class="site-footer__tree-1" alt="">
            <img src="../assets/images/shapes/tree-f-2.png" class="site-footer__tree-2" alt="">

            <div class="site-footer-one__upper">
                <div class="container">
                    <div class="footer-widget-row">
                        <div class="footer-widget footer-widget__about">
                            <div class="footer-widget__inner">
                                <a href="index.html">
                                    <img src="../assets/images/logo-2-1.png" alt="" width="143">
                                </a>
                                <p>Designed By 
                                    <a href="http://striking.lk/" target="_blank" style="color: blanchedalmond;">Striking Group</a></p>
                            </div><!-- /.footer-widget__inner -->
                        </div><!-- /.footer-widget -->
                        <div class="footer-widget footer-widget__links__widget-1">
                            <div class="footer-widget__inner">
                                <h3 class="footer-widget__title">Aquatic Sports Union</h3><!-- /.footer-widget__title -->
                                <ul class="footer-widget__links-list list-unstyled">
                                    <li><a href="../about.html">About Us</a></li>
                                    <li><a href="../download.html">Downloads</a></li>
                                    <li><a href="../contact.html">Contact Us</a></li>
                                </ul><!-- /.footer-widget__links-list -->
                            </div><!-- /.footer-widget__inner -->
                        </div><!-- /.footer-widget -->
                        <div class="footer-widget footer-widget__links__widget-2">
                            <div class="footer-widget__inner">
                                <h3 class="footer-widget__title">Members</h3><!-- /.footer-widget__title -->
                                <ul class="footer-widget__links-list list-unstyled">
                                    <li><a href="../register.html">Register</a></li>
                                    <li><a href="../login.php">Login</a></li>
                                </ul><!-- /.footer-widget__links-list -->
                            </div><!-- /.footer-widget__inner -->
                        </div><!-- /.footer-widget -->
                        <div class="footer-widget footer-widget__links__widget-3">
                            <div class="footer-widget__inner">
                                <h3 class="footer-widget__title">Explore</h3><!-- /.footer-widget__title -->
                                <ul class="footer-widget__links-list list-unstyled">
                                    <li><a href="../news.html">News And Events</a></li>
                                    <li><a href="../gallery.html">Gallery</a></li>
                                </ul><!-- /.footer-widget__links-list -->
                            </div><!-- /.footer-widget__inner -->
                        </div><!-- /.footer-widget -->
                        <div class="footer-widget footer-widget__social__widget">
                            <div class="footer-widget__inner">
                                <h3 class="footer-widget__title">Follow</h3><!-- /.footer-widget__title -->
                                <div class="footer-widget__social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.facebook.com/aquaticslk/" target="_blank"><i class="fab fa-facebook-square"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div><!-- /.footer-widget__social -->
                            </div><!-- /.footer-widget__inner -->
                        </div><!-- /.footer-widget -->
                    </div><!-- /.footer-widget-row -->
                </div><!-- /.container -->
            </div><!-- /.site-footer-one__upper -->
            <div class="site-footer__bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <a href="tel:+94-112-675-347"><i class="fa fa-phone-alt"></i>+94 112 675 347</a>
                        </div><!-- /.col-lg-4 -->
                        <div class="col-lg-4">
                            <a href="mailto:office.slasu@gmail.com"><i class="fa fa-envelope"></i>office.slasu@gmail.com</a>
                        </div><!-- /.col-lg-4 -->
                        <div class="col-lg-4">
                            <a href="../contact.html"><i class="fa fa-map"></i>No.33, Torrington Place, Colombo 07</a>
                        </div><!-- /.col-lg-4 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.site-footer__bottom -->
        </footer><!-- /.site-footer-one -->
    </div><!-- /.page-wrapper -->



    <div class="side-menu__block">

        <a href="#" class="side-menu__toggler side-menu__close-btn"><i class="fa fa-times"></i>
            <!-- /.fa fa-close --></a>

        <div class="side-menu__block-overlay custom-cursor__overlay">
            <div class="cursor"></div>
            <div class="cursor-follower"></div>
        </div><!-- /.side-menu__block-overlay -->
        <div class="side-menu__block-inner ">

            <a href="index.html" class="side-menu__logo"><img src="../assets/images/logo-3-1.png" alt="" width="143"></a>
            <nav class="mobile-nav__container">
                <!-- content is loading via js -->
            </nav>
            <p class="side-menu__block__copy">Designed By 
                <a href="http://striking.lk/" target="_blank" style="color: blanchedalmond;">Striking Group</a></p>
            <div class="side-menu__social">
                <a href="https://www.facebook.com/aquaticslk/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-google-plus"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-pinterest-p"></i></a>
            </div>
        </div><!-- /.side-menu__block-inner -->
    </div><!-- /.side-menu__block -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- Template JS -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/bootstrap-datepicker.min.js"></script>
    <script src="../assets/js/bootstrap-select.min.js"></script>
    <script src="../assets/js/isotope.js"></script>
    <script src="../assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="../assets/js/jquery.counterup.min.js"></script>
    <script src="../assets/js/jquery.magnific-popup.min.js"></script>
    <script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../assets/js/jquery.validate.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/TweenMax.min.js"></script>
    <script src="../assets/js/waypoints.min.js"></script>
    <script src="../assets/js/wow.min.js"></script>

    <!-- Custom Scripts -->
    <script src="../assets/js/theme.js"></script>
</body>

</html>