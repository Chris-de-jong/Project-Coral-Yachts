<?php

session_start();
$_SESSION['email'] = "abcd@abcd";

include 'connect.php';

$email = $_SESSION['email'];

if (isset($_SESSION['email'])) {
  $sql = "SELECT customerid, firstname, lastname, phone FROM customers WHERE email = '$email'";
  $result = mysqli_query($db, $sql);
  $resultArray = mysqli_fetch_row($result);
}else{
  header("Location: pleaseLogin.php");
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
  <head>


    <?php
      
      $userID = $resultArray['0'];
      $userFirstName = $resultArray['1'];
      $userLastName = $resultArray['2'];
      $userPhone = $resultArray['3'];

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
      <!-- <section id="r-customizer" class="r-customizer">
            <div class="r-selector">
                  <span class="d-block text-center">Color Options</span>
                  <div class="r-color_section r-color_block">
                        <ul class="r-color_selector" id="r-color_selector">
                            <li class="r-color_1" data-attr="color-01"></li>
                            <li class="r-color_6" data-attr="color-06"></li>
                            <li class="r-color_2" data-attr="color-02"></li>
                            <li class="r-color_3" data-attr="color-03"></li>
                            <li class="r-color_4" data-attr="color-04"></li>
                            <li class="r-color_5" data-attr="color-05"></li>
                            <li class="r-color_7" data-attr="color-07"></li>
                            <li class="r-color_8" data-attr="color-08"></li>
                        </ul>
                  </div>
            </div>
            <i id="r-selector_icon" class="fa fa-cog"></i>
      </section>   -->
      <div class="r-wrapper">
          <?php
          include "header.php";
           ?>

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
                  <span class="r-rating-text"> CAR RATING: 5/5 </span>
                </div>
                <h2 class="r-car-name"> High class <span>Floating bathtub</span> </h2>
              </div>

              <div class="r-car-offer">
                <div class="r-offer-cost">
                  <span class="fa fa-usd r-currency"></span> 50.00 <small>Per Day</small>
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
                      "please go commit seppuku."
                    </div>
                  </div>
                </div>

                <div class="r-product-discount">
                  <span class="r-discount">DISCOUNT 50%</span>
                  <p class="r-discount-content"> Special Offers For <strong>STONKS</strong> </p>
                </div>
              </div>

              <div class="col-lg-9 col-md-8 col-sm-12">
                <div class="r-site-default-accordion">
                  <div class="r-accordion-header">
                    <h2 class="r-accordion-heading">Booking Detail</h2>
                    <i class="fa fa-angle-up"></i>
                  </div>
                  <div class="r-accordion-body">
                    <form>
                      <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label>Departure Port</label>
                            <div class="input-group">
                               <input type="text" class="form-control" placeholder="Port name" />
                               <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label>arival Port</label>
                            <div class="input-group">
                               <input type="text" class="form-control" placeholder="Port name" />
                               <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label>Departure date</label>
                            <div class="input-group">
                               <input type="text" class="form-control" placeholder="dd.mm.yyyy" />
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label>Arival date</label>
                            <div class="input-group">
                               <input type="text" class="form-control" placeholder="dd.mm.yyyy" />
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label>Departure time </label>
                            <div class="input-group">
                               <input type="text" class="form-control" placeholder="12.00AM" />
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                          <div class="form-group">
                            <label>Arival time</label>
                            <div class="input-group">
                               <input type="text" class="form-control" placeholder="12.00PM" />
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>



                <div class="r-site-default-accordion">
                  <div class="r-accordion-header">
                    <h2 class="r-accordion-heading">Customer Information</h2>
                    <i class="fa fa-angle-up"></i>
                  </div>
                  <div class="r-accordion-body">
                    <form>
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control" placeholder="Your full name"/>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" placeholder=""/>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                        </div>

                      </div>

                    </form>
                  </div>
                </div>

                <div class="r-site-default-accordion">
                  <div class="r-accordion-header">
                    <h2 class="r-accordion-heading">Payment Options</h2>
                    <i class="fa fa-angle-up"></i>
                  </div>
                  <div class="r-accordion-body">
                    <form>
                      <div class="r-payment-options">
                        <div class="row">
                          <div class="col-md-6 col-sm-12">
                            <div class="r-site-checkbox">
                              <label>
                                <input type="checkbox" />
                                <span class="r-site-checkbox-icon"> <i class="fa fa-check-square"></i> </span>
                                <span class="r-site-checkbox-text">Direct bank Transfer</span>
                              </label>
                            </div>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <div class="r-site-checkbox">
                              <label>
                                <input type="checkbox" />
                                <span class="r-site-checkbox-icon"> <i class="fa fa-check-square"></i> </span>
                                <span class="r-site-checkbox-text">Credit Card</span>
                              </label>
                              <img src="assets/images/payment-icons.jpg" alt="" class="" />
                            </div>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <div class="r-site-checkbox">
                              <label>
                                <input type="checkbox"/>
                                <span class="r-site-checkbox-icon"> <i class="fa fa-check-square"></i> </span>
                                <span class="r-site-checkbox-text">Cheque Payment</span>
                              </label>
                            </div>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <div class="r-site-checkbox">
                              <label>
                                <input type="checkbox"/>
                                <span class="r-site-checkbox-icon"> <i class="fa fa-check-square"></i> </span>
                                <span class="r-site-checkbox-text">Paypal</span>
                              </label>
                              <img src="assets/images/paypal-icon.jpg" alt="" class="" />
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

                <div class="r-site-default-accordion">
                  <div class="r-accordion-header">
                    <h2 class="r-accordion-heading">Addition Information</h2>
                    <i class="fa fa-angle-up"></i>
                  </div>
                  <div class="r-accordion-body">
                    <form>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <textarea class="form-control" placeholder="Additional note"></textarea>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

                <div class="r-booking-form-submission">
                  <div class="row">
                    <div class="col-lg-6 col-md-12">
                      <div class="r-site-checkbox">
                        <label>
                          <input type="checkbox" />
                          <span class="r-site-checkbox-icon"> <i class="fa fa-check-square"></i> </span>
                          <span class="r-site-checkbox-text">I accept all informations & payment eyc</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 r-submission-btn-wrapper">
                      <input type="reset" class="btn-default" value="Cancel This" />
                      <input type="submit" class="btn-primary" value="Reserve Now" />
                    </div>
                  </div>
                </div>
              </div>
            </div>




          </div>
        </section> <!-- /r-car-info -->

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
