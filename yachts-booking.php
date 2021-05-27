<?php

include "header.php";

session_start();
require 'connect.php';
$_SESSION['email'] = "abcd@abcd";
$email = $_SESSION['email'];

if (isset($_SESSION['email'])) {
  $sql = "SELECT customerid FROM customers WHERE email = '$email'";
  $result = mysqli_query($db, $sql);
  $resultArray = mysqli_fetch_row($result);


  
}else{
  header("Location: login-register.php");
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
  <head>


    <?php
      
      $userID = $resultArray['0'];
      

      $yachtID = $_GET['yacht'];
     

      function isRealDate($date) { 
        if (false === strtotime($date)) { 
            return false;
        } 
        list($day, $month, $year) = explode('-', $date); 
        return checkdate($month, $day, $year);
      }

      if (isset($_POST['submit'])) {

        if(isRealDate($_POST['dpTime'])){
          list($dpday, $dpmonth, $dpyear) = explode('-', $_POST['dpTime']);
          $dpdate = $dpyear . '-' . $dpmonth . '-' . $dpday;
        }else{
          wrongDPDate();
        }

        if (isRealDate($_POST['arTime'])){
          list($arday, $armonth, $aryear) = explode('-', $_POST['arTime']);
          $ardate = $aryear . '-' . $armonth . '-' . $arday;
        }else{
          wrongARDate();
        }

        $fullName = $_POST['fullName'];

        $phoneNumber = $_POST['phoneNumber'];

        $preference = $_POST['payment'];


        $sql = "INSERT INTO bookings (Customers_customerID, Yachts_yachtID, paymentPreference, date_start, date_end)
        VALUES ($userID, $yachtID, '$preference', $dpdate, $ardate)";


        if (mysqli_query($db, $sql)) {
         echo "New record created successfully";
        } else {
         echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
      }


    ?>
      <!-- PAGE TITLE -->
      <title>Home - Coral Yachts</title>



      <!-- META-DATA -->
      <meta http-equiv="content-type" content="text/html; charset=utf-8" >
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
      <meta name="description" content="" >
      <meta name="keywords" content="" >

      <!-- FAVICON -->
      <link rel="shortcut icon" href="assets/images/favicon.png">

      <!-- CSS:: FONTS -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

      <!-- CSS:: MAIN -->
      <link rel="stylesheet" type="text/css" href="assets/css/main.css">
      <link rel="stylesheet" type="text/css" id="r-color-roller" href="assets/color-files/color-08.css">

  </head>
  <body>
      <div class="r-wrapper">

        <section class="r-car-info-wrapper">
          <div class="container">
             <div class="r-car-info-header clearfix">
              <div class="r-car-top-info">
                <div class="r-car-rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <span class="r-rating-text"> yacht RATING: 5/5 </span>
                </div>
                <?php
                  $sql = "SELECT name, priceperday FROM yachts WHERE yachtID = '$yachtID'";
                  $result = mysqli_query($db, $sql);
                  $yachtname = mysqli_fetch_row($result);
                  echo "<h2 class=\"r-car-name\">", $yachtname[0], " </span> </h2>";
                ?>
              </div>

              <div class="r-car-offer">
                <div class="r-offer-cost">
                  <?php

                    echo "<span class=\"fa fa-usd r-currency\"></span>", $yachtname['1'], "    <small>Per Day</small>";
                  ?>
                </div>
              </div>
            </div> <!-- /r-car-info-header -->

            <div class="r-car-whole-info">


            <div class="row">
              <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="r-product-testimonial-wrapper">
                  <h4>Testimonials</h4>
                  <div class="owl-carousel" id="productTestimonial">
                    <div class="r-testimonial-box">
                      "We know the difference is in the details and that’s why our rental services, in the tourism and business."
                    </div>
                    <div class="r-testimonial-box">
                      "We know the difference is in the details and that’s why our rental services, in the tourism and business."
                    </div>
                    <div class="r-testimonial-box">
                      "We know the difference is in the details and that’s why our rental services, in the tourism and business."
                    </div>
                  </div>
                </div>

                <div class="r-product-discount">
                  <span class="r-discount">DISCOUNT 50%</span>
                  <p class="r-discount-content"> Special <strong>STONKS</strong> </p>
                </div>
              </div>

              <div class="col-lg-9 col-md-8 col-sm-12">
                <div class="r-site-default-accordion">
                  <div class="r-accordion-header">
                    <h2 class="r-accordion-heading">Booking Detail</h2>
                    <i class="fa fa-angle-up"></i>
                  </div>
                  <div class="r-accordion-body">
                    <?php echo "<form method=\"post\" action=\"yachts-booking.php?yacht=", $_GET['yacht'], "\">";?>
                      <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label>Departure date</label>
                            <div class="input-group">
                               <input type="text" required class="form-control" placeholder="dd-mm-yyyy" name="dpTime" />
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                               <?php
                                function wrongDPDate() {
                                  echo "Wrong date format, please try again.";
                                }
                               ?>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label>Arival date</label>
                            <div class="input-group">
                               <input type="text" required class="form-control" placeholder="dd-mm-yyyy" name="arTime" />
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                               <?php
                                function wrongARDate(){
                                  echo "wrong date format, please try again.";
                                }
                               ?>
                            </div>
                          </div>
                        </div>
                      </div>
        
                  </div>
                </div>



                <div class="r-site-default-accordion">
                  <div class="r-accordion-header">
                    <h2 class="r-accordion-heading">Customer Information</h2>
                    <i class="fa fa-angle-up"></i>
                  </div>
                  <div class="r-accordion-body">
                    
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" required class="form-control" name="fullName" placeholder="Your full name"/>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" required class="form-control" name="phoneNumber" placeholder=""/>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                        </div>

                      </div>

                    
                  </div>
                </div>

                <div class="r-site-default-accordion">
                  <div class="r-accordion-header">
                    <h2 class="r-accordion-heading">Payment Options</h2>
                    <i class="fa fa-angle-up"></i>
                  </div>
                  <div class="r-accordion-body">
                    
                      <div class="r-payment-options">
                        <div class="row">
                          <div class="col-md-6 col-sm-12">
                            <div>
                              <label>
                                <input type="radio" value="directdebit" name="payment"/>
                                <span class="r-site-checkbox-icon"> </span>
                                <span class="r-site-checkbox-text">Direct bank Transfer</span>
                              </label>
                            </div>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <div>
                              <label>
                                <input type="radio" value="creditcard" name="payment" />
                                <span class="r-site-checkbox-icon"> </span>
                                <span class="r-site-checkbox-text">Credit Card</span>
                              </label>
                              <img src="assets/images/payment-icons.jpg" alt="" class="" />
                            </div>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <div>
                              <label>
                                <input type="radio" value="ideal" name="payment" />
                                <span class="r-site-checkbox-icon"> </span>
                                <span class="r-site-checkbox-text">ideal</span>
                              </label>
                            </div>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <div>
                              <label>
                                <input type="radio" value="paypal" name="payment" />
                                <span class="r-site-checkbox-icon"> </span>
                                <span class="r-site-checkbox-text">Paypal</span>
                              </label>
                              <img src="assets/images/paypal-icon.jpg" alt="" class="" />
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>

                <div class="r-site-default-accordion">
                  <div class="r-accordion-header">
                    <h2 class="r-accordion-heading">Addition Information</h2>
                    <i class="fa fa-angle-up"></i>
                  </div>
                  <div class="r-accordion-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <textarea class="form-control" placeholder="Additional note"></textarea>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>

                <div class="r-booking-form-submission">
                  <div class="row">
                    <div class="col-lg-6 col-md-12">
                      <div class="r-site-checkbox">
                        <label>
                          <input type="checkbox" />
                          <span class="r-site-checkbox-icon"> <i class="fa fa-check-square"></i> </span>
                          <span class="r-site-checkbox-text">I accept all informations & payment etc</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 r-submission-btn-wrapper">
                      <input type="reset" class="btn-default" value="Cancel This" />
                      <input type="submit" class="btn-primary" value="Reserve Now" name="submit" />
                    </div>
                  </div>
                </div>
              </div>
            </form>
            </div>
          </div>
        </section> <!-- /r-car-info -->
        <footer>
          <div class="r-footer">
            <div class="container">
              <div class="row clearfix">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="r-footer-block">
                    <img src="assets/images/footer-logo.png" class="d-block img-fluid" alt="">
                    <p>
                      We know the difference is in the details and that’s why our rental services, in the tourism and business industry, stand out for their quality.
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
                      <h6>OUR INFO</h6>
                      <nav>
                        <ul>
                          <li><a href="#">About Coral Yachts</a></li>
                          <li><a href="#">Our Mission & Strategy</a></li>
                          <li><a href="#">Our Vision</a></li>
                          <li><a href="#">Royal Cars Advantages</a></li>
                          <li><a href="#">Contact Us</a></li>
                        </ul>
                      </nav>
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
      <script src="assets/js/plugins/owl/owl.carousel.min.js"></script>
      <script src="assets/js/plugins/owl/owl.carousel2.thumbs.js"></script>
      <script src="assets/js/custom.js"></script>

  </body>
</html>
