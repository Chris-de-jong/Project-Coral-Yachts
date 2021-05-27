<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
  <?php
    include 'connect.php';
    include 'header.php';


    if (isset($_GET['userSearch'])) {
      $searchTestConstructor = array($_GET['userSearch'], "!");
      $searchTest = join("", $searchTestConstructor);
    }else{
      $searchTest = "!";
    }
    
    if (isset($_GET['search_activate'])) {
      if ($searchTest != "!!") {
        $userSearch = $_GET['userSearch'];
        $sql = "SELECT YachtID, name, portname, status, priceperday FROM yachts WHERE portname = '$userSearch'";
      }else{
        $sql = "SELECT YachtID, name, portname, status, priceperday FROM yachts";
      }
    }else{
      $sql = "SELECT YachtID, name, portname, status, priceperday FROM yachts";
    }


    $result = mysqli_query($db, $sql);

    $yachtidArray = array();
    $yachtnameArray = array();
    $portnameArray = array();
    $statusArray = array();
    $priceArray = array();


    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_row($result)) {
        array_push($yachtidArray, $row['0']);
        array_push($yachtnameArray, $row['1']);
        array_push($portnameArray, $row['2']);
        array_push($statusArray, $row['3']);
        array_push($priceArray, $row['4']);
      }
    }



    $totalrow = count($yachtidArray);
  ?>
  <head>
      <!-- PAGE TITLE -->
      <title>Yacht list</title>

      <!-- META-DATA -->
      <meta http-equiv="content-type" content="text/html; charset=utf-8" >
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="" >
      <meta name="keywords" content="" >

      <!-- FAVICON -->
      <link rel="shortcut icon" href="assets/images/favicon.png">

      <!-- CSS:: FONTS -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

      <link rel="stylesheet" type="text/css" href="assets/css/plugins/scrollbar/jquery.mCustomScrollbar.css">

      <!-- CSS:: MAIN -->
      <link rel="stylesheet" type="text/css" href="assets/css/main.css">
      <link rel="stylesheet" type="text/css" id="r-color-roller" href="assets/color-files/color-08.css">

  </head>
  <body>
     <section id="r-customizer" class="r-customizer">
            <i id="r-selector_icon" class="fa fa-cog"></i>
      </section>
      <div class="r-wrapper">
        <?php
          include "header.php";
        ?>
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-7 col-lg-6 col-md-6 col-sm-12 col-xs-12 r-list-area">
              <div class="r-car-search r-carlist-search">
                <div class="container">
                  <form action="yachts-list-map.php" method="get">
                    <div class="row">
                      <div class="r-search-full col-md-12">
                       <div class="form-group">
                          <input type="text" class="form-control" name="userSearch" placeholder="Search Yachts by port">
                          <input type="submit" value="GO" class="fa fa-search" name="search_activate">
                        </div>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
              <div class="clearfix r-sort-val">
                <div class="pull-left">
                </div>
                <div class="pull-right"><span class="r-total-result"><?php echo count($yachtidArray); ?> results</span></div>
              </div>
              <div class="r-best-offer-list r-car-list-map mCustomScrollbar">
                <form class="row clearfix" method="post">
                
                    <?php


                      for ($rowselector=0; $rowselector < $totalrow ; $rowselector++) { 

                        echo "
                          <div class=\"col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12\">
                            <div class=\"r-best-offer-single\">
                              <div class=\"r-best-offer-in\">
                                <div class=\"r-offer-img\">
                                  <a class=\"d-inline-block\" href=\"yachts-booking.php?yacht=", $yachtidArray[$rowselector], "\"><img src=\"assets/images/car-1.png\" class=\"img-fluid d-block m-auto\" alt=\"\"></a>
                                </div>
                                <div class=\"r-best-offer-content\">
                                  <a href=\"yachts-booking.php?yacht=", $yachtidArray[$rowselector], "\"><b>", $yachtnameArray[$rowselector], "</b></a>
                                  <p>Start at <b>", $priceArray[$rowselector], " EUR</b> per day</p>
                                  <ul class=\"pl-0 mb-0\">
                                    <li><span>PORT: ", $portnameArray[$rowselector],  "</span></li><br>
                                    <li></i><span>STATUS: ", $statusArray[$rowselector], "</span></li><br>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        ";
                      }
                    ?>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
        <section id="r-get-in-touch">
          <div class="r-get-in-touch">
            <div class="container">
              <div class="r-get-header">
                <span>CONTACT US NOW</span>
                <h2>Keep <b>In Touch.</b></h2>
              </div>
              <div class="r-get-form">
                <form action="#">
                  <div class="clearfix">
                    <div class="form-group"><input type="text" placeholder="User name"></div>
                    <div class="form-group"><input type="email" placeholder="Email Address"></div>
                  </div>
                  <div class="form-group"><input type="email" placeholder="Title Message"></div>
                  <div class="form-group">
                    <textarea placeholder="Message"></textarea>
                  </div>
                  <div class="text-center">
                    <button class="btn btn-full">SEND MESSAGE NOW</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
        <footer>
          <div class="r-footer">
            <div class="container">
              <div class="row clearfix">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="r-footer-block">
                    <img src="assets/images/footer-logo.png" class="d-block img-fluid" alt="">
                    <p>
                      We know the difference is in the details and that’s why our car rental services, in the tourism and business industry, stand out for their quality.
                    </p>
                    <form action="#">
                      <div class="r-newsletter">
                        <input type="email" placeholder="Subscribe Newsletter">
                        <button class="btn"><i class="fa fa-envelope"></i></button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="r-footer-block">
                    <div class="r-footer-widget r-footer-phone">
                      <span><i class="fa fa-phone"></i> CALL US ON LINE 1</span>
                      <h5>100.1212.2000</h5>
                    </div>
                    <div class="r-footer-widget r-footer-nav">
                      <h6>USEFUL LINK</h6>
                      <nav>
                        <ul>
                          <li><a href="#">Private Policy</a></li>
                          <li><a href="#">Term & Conditions</a></li>
                          <li><a href="#">Copyright Notification</a></li>
                          <li><a href="#">Register for New Member</a></li>
                          <li><a href="#">Press Release</a></li>
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="r-footer-block">
                    <div class="r-footer-widget r-footer-phone">
                      <span><i class="fa fa-phone"></i> CALL US ON LINE 2</span>
                      <h5>100.2424.2000</h5>
                    </div>
                    <div class="r-footer-widget r-footer-nav">
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="r-footer-block">
                    <div class="r-footer-widget r-footer-map">
                      <a href="#"> <img src="assets/images/icon-footer-map.png" class="icon" alt=''/> RoyalCars on Map</a>
                    </div>
                    <div class="r-footer-widget r-footer-nav">
                      <h6>ACCOUNT INFORMATION</h6>
                      <nav>
                        <ul>
                          <li><a href="#">Login to My Account</a></li>
                          <li><a href="#">Press Releases</a></li>
                          <li><a href="#">User Dashboard</a></li>
                          <li><a href="#">Email Address</a></li>
                          <li><a href="#">Lorem Ipsum dolorsit</a></li>
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row clearfix r-footer-strip">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 ©2018 Created by jThemes Studio
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 <ul>
                   <li><a href="#"><i class="fa fa-facebook"></i>. <span>Facebook</span></a></li>
                   <li><a href="#"><i class="fa fa-twitter"></i>.<span>Twitter</span></a></li>
                   <li><a href="#"><i class="fa fa-instagram"></i>.<span>Instagram</span></a></li>
                 </ul>
                </div>
              </div>
            </div>
          </div>
        </footer>
      </div>
      <div id="r-to-top" class="r-to-top"><i class="fa fa-angle-up"></i></div>
      <!-- JQUERY:: JQUERY.JS -->
      <script src="assets/js/jquery.min.js"></script>

      <!-- JQUERY:: BOOTSTRAP.JS -->
      <script src="assets/js/tether.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>

      <script src="assets/js/custom.js"></script>

      <script src="assets/js/plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>

      <script src="assets/js/map.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAl-EDTJ5_uU3zBIX7-wNTu-qSZr1DO5Dw"></script>
  </body>
</html>
