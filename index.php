<!DOCTYPE html>
<?php 
include('server.php');



    
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
  <head>
      <!-- PAGE TITLE -->
      <title>Home - Coral Yacht</title>


      <!-- META-DATA -->
      <meta http-equiv="content-type" content="text/html; charset=utf-8" >
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
      <meta name="description" content="" >
      <meta name="keywords" content="" >

      <!-- FAVICON -->
      <link rel="shortcut icon" href="assets/images/favicon.png">

      <!-- CSS:: FONTS -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

      <!-- CSS:: ANIMATE -->
      <link rel="stylesheet" type="text/css" href="assets/css/plugins/animate/animate.css">

      <!-- CSS:: MAIN -->
      <link rel="stylesheet" type="text/css" href="assets/css/main.css">
      <link rel="stylesheet" type="text/css" id="r-color-roller" href="assets/color-files/color-08.css">

       <header>
         <div class="r-header r-header-inner r-header-strip-01">
           <div class="r-header-strip r-header-strip-01">
             <div class="container">
               <div class="row clearfix">
                 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                   <div class="r-logo">
                     <a href="#" class="d-inline-block"><img src="assets/images/logo-white.png" class="img-fluid d-block" alt=""></a>
                   </div>
                   <a href="javaScript:void(0)" class="menu-icon"> <i class="fa fa-bars"></i> </a>
                 </div>
                 <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                   <div class="r-header-action float-left">

                     <?php  if (isset($_SESSION['email'])) : ?>
                            <a href="index.php?logout='1'"><img src="assets/images/icon-lock.png" alt='' /><span>Logout</span></a>
                      <?php endif ?>
                      <?php  if (!isset($_SESSION['email'])) : ?>
                            <a href="login-register.php"> <img src="assets/images/icon-lock.png" alt='' /> <span>Login</span></a>
                          <?php endif ?>
                     <div class="r-search-wrapper">
                       <div class="r-search-inner">
                         <form>
                             <input type="text" class="r-search-field" placeholder="Search"/>
                             <button type="submit" class="r-search-btn">
                               <i class="fa fa-search"></i>
                             </button>
                         </form>
                       </div>
                     </div> <!-- /r-search-wrapper -->
                   </div>
                   <div class="r-nav-section float-right">
                     <nav>
                       <ul>
                        <li><a href="index.php">HOME</a></li>
                             <li><a href="yachts-list-map.php">YACHTS</a></li>
                         <li><a href="gallery.php">GALLERY</a></li>
                       </ul>
                     </nav>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <div class="r-slider owl-carousel" id="defaultHomeSlider">
             <div class="r-slider-item">
               <img style="width: 100%; height: 650px;" src="assets/images/main-slider-01.png" class="img-fluid d-block m-auto" alt="">
               <div class="container">
                 <div class="r-slider-top-content">
                   <h1 class="animated fadeInDown">Boat <span>#1</span></h1>
                   <h4 class="animated fadeInLeft">FOR RENT <strong>$50</strong> PER DAY</h4>
                   <a href="#" class="btn btn-outlined animated fadeInUp"> Reserve Now </a>
                 </div>
               </div>
             </div>
             <div class="r-slider-item">
               <img style="width: 100%; height: 650px;" src="assets/images/main-slider-02.png" class="img-fluid d-block m-auto" alt="">
               <div class="container">
                 <div class="r-slider-top-content">
                   <h1>Boat <span>#2</span></h1>
                   <h4>FOR RENT <strong>$150</strong> PER DAY</h4>
                   <a href="#" class="btn btn-outlined"> Reserve Now </a>
                 </div>
               </div>
             </div>
             <div class="r-slider-item">
               <img style="width: 100%; height: 650px;" src="assets/images/main-slider-03.png" class="img-fluid d-block m-auto" alt="">
               <div class="container">
                 <div class="r-slider-top-content">
                   <h1>Boat <span>#3</span></h1>
                   <h4>FOR RENT <strong>$100</strong> PER DAY</h4>
                   <a href="#" class="btn btn-outlined"> Reserve Now </a>
                 </div>
               </div>
             </div>
           </div>

           <div class="r-yacht-search">
             <div class="container">
               <div class="content">
                  <!-- notification message -->
                  <?php if (isset($_SESSION['success'])) : ?>
                     <div class="error success" >
                      <h3>
                         <?php
                          echo $_SESSION['success'];
                          unset($_SESSION['success']);
                         ?>
                      </h3>
                     </div>
                  <?php endif ?>
                  <?php
                  if (isset($_GET['logout'])) {
                    session_unset();
                    $_POST = array();
                    unset($_POST);
                  }
                  ?>





               </div>
               <div class="r-top-form-title animated fadeInUp">
                 <br><br>
                 <h3>Search available Yachts at your Port <b></b></h3>
               </div>
               <form action="index.php" method="get">
                 <div class="row">
                   <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                     <div class="form-group">
                       <label> Port </label>
                       <select class="form-control" name="searchSelector">
                       	<option value="!">Choose an option</option>
                        <option value="Rotterdam">Rotterdam</option>
                        <option value="Curacao">Curacao</option>
                        <option value="Hawaii">Hawaii</option>
                       </select>
                     </div>
                   </div>
                   <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                     <div class="form-group">
                       <input type="submit" name="userSearch" class="form-control btn-primary" value="Search Yacht Now">
                     </div>
                   </div>
                 </div>
               	</form>
               	<?php
            		if (isset($_GET['userSearch'])) {
						if($_GET['searchSelector'] != "!"){
							$userSearch = $_GET['searchSelector'];
   							$sql = "SELECT YachtID, name, portname, status, priceperday FROM yachts WHERE portname = '$userSearch'";

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
					    	GenerateSearch($totalrow, $yachtidArray, $yachtnameArray, $priceArray, $portnameArray, $statusArray);
					   	}
					}



               		function GenerateSearch($totalrow, $yachtidArray, $yachtnameArray, $priceArray, $portnameArray, $statusArray){
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
                  }
                ?>
             </div>
           </div>
         </div>
       </header>

  </head>
  <body>
      <section id="r-customizer" class="r-customizer">
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
      </section>
      <div class="r-wrapper">


        <section id="r-quote">
          <div class="r-quote r-quote-sub pt-0 r-quote-noafter">
            <div class="r-sec-head r-accent-color r-sec-head-t">
              <span>LATEST TESTIMONIAL</span>
              <h2>What <b>They Say</b> About Us.</h2>
            </div>
            <div class="container">
              <div class="row">
                  <div class="col-md-12" data-wow-delay="0.2s">
                      <div id="r-quote-carousel" class="carousel slide">
                        <div class="carousel-inner" role="listbox">
                          <div class="carousel-item">
                             <p>“This was our first time renting from Coral Yachts and we were very pleased with the whole experience. Your price was lower than other companies. Our rental experience was good from start to finish, so we’ll be back in the future lorem ipsum diamet.”</p>
                          </div>
                          <div class="carousel-item active">
                            <p>“This was our first time renting from Coral Yachts and we were very pleased with the whole experience. Your price was lower than other companies. Our rental experience was good from start to finish, so we’ll be back in the future lorem ipsum diamet.”</p>
                          </div>
                          <div class="carousel-item">
                             <p>“This was our first time renting from Coral Yachts and we were very pleased with the whole experience. Your price was lower than other companies. Our rental experience was good from start to finish, so we’ll be back in the future lorem ipsum diamet.”</p>
                          </div>
                        </div>
                        <ol class="carousel-indicators">
                          <li data-target="#r-quote-carousel" data-slide-to="0">
                            <img class="img-fluid d-block" src="assets/images/user-02.jpg" alt="">
                            <span>
                              <b>Robertho Garcia</b> <br>
                              Graphic Designer
                            </span>
                          </li>
                          <li data-target="#r-quote-carousel" data-slide-to="1" class="active text-center">
                            <img class="img-fluid d-block" src="assets/images/user-01.png" alt="">
                            <span>
                              <b>Robertho Garcia</b> <br>
                              Graphic Designer
                            </span>
                          </li>
                          <li data-target="#r-quote-carousel" data-slide-to="2">
                           <img class="img-fluid d-block" src="assets/images/user-03.jpg" alt="">
                           <span>
                              <b>Robertho Garcia</b> <br>
                              Graphic Designer
                           </span>
                          </li>
                        </ol>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </section>


        <div id="r-gallery-part">
          <div class="r-gallery-part r-gallery-part-home pt-0 pb-0">
            <ul class="clearfix">
              <li>
                  <a href="assets/images/gallery-img01.jpg" data-rel="lightcase:myCollection">
                      <img src="assets/images/gallery-img01.jpg" class="d-block img-fluid" alt="">
                      <div class="gallery-hover">
                        <div class="gallery-text">
                          <div class="icon-gallery"><i class="fa fa-search" aria-hidden="true"></i></div>
                        </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="assets/images/gallery-img02.jpg" data-rel="lightcase:myCollection">
                      <img src="assets/images/gallery-img02.jpg" class="d-block img-fluid" alt="">
                      <div class="gallery-hover">
                        <div class="gallery-text">
                          <div class="icon-gallery"><i class="fa fa-search" aria-hidden="true"></i></div>
                        </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="assets/images/gallery-img03.jpg" data-rel="lightcase:myCollection">
                      <img src="assets/images/gallery-img03.jpg" class="d-block img-fluid" alt="">
                      <div class="gallery-hover">
                        <div class="gallery-text">
                          <div class="icon-gallery"><i class="fa fa-search" aria-hidden="true"></i></div>
                        </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="assets/images/gallery-img04.jpg" data-rel="lightcase:myCollection">
                      <img src="assets/images/gallery-img04.jpg" class="d-block img-fluid" alt="">
                      <div class="gallery-hover">
                        <div class="gallery-text">
                          <div class="icon-gallery"><i class="fa fa-search" aria-hidden="true"></i></div>
                        </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="assets/images/gallery-img05.jpg" data-rel="lightcase:myCollection">
                      <img src="assets/images/gallery-img05.jpg" class="d-block img-fluid" alt="">
                      <div class="gallery-hover">
                        <div class="gallery-text">
                          <div class="icon-gallery"><i class="fa fa-search" aria-hidden="true"></i></div>
                        </div>
                      </div>
                  </a>
              </li>
            </ul>
          </div>
        </div>

      </div>
      <div id="r-to-top" class="r-to-top"><i class="fa fa-angle-up"></i></div>

      <!-- JQUERY:: JQUERY.JS -->
      <script src="assets/js/jquery.min.js"></script>

      <!-- JQUERY:: APPEAR.JS -->
      <script src="assets/js/plugins/appear/appear.js"></script>

      <!-- JQUERY:: COUNTER.JS -->
      <script src="assets/js/plugins/counter/jquery.easing.min.js"></script>
      <script src="assets/js/plugins/counter/counter.min.js"></script>

      <!-- JQUERY:: BOOTSTRAP.JS -->
      <script src="assets/js/tether.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>

      <!-- JQUERY:: PLUGINS -->
      <script src="assets/js/plugins/owl/owl.carousel.min.js"></script>
      <script src="assets/js/plugins/lightcase/lightcase.js"></script>


      <!-- JQUERY:: MAP -->
      <script src="assets/js/map.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAl-EDTJ5_uU3zBIX7-wNTu-qSZr1DO5Dw"></script>

      <!-- JQUERY:: CUSTOM.JS -->
      <script src="assets/js/custom.js"></script>

  </body>
</html>
