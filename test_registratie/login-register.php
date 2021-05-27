
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<?php include ('server.php') ?>
  <head>


      <!-- PAGE TITLE -->
      <title>Login-Register - Coral Yachts</title>

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
        <?php
        include "header.php";
         ?>
        <section id="r-login-register">
          <div class="r-login-register">
            <div class="r-login-register-in">
              <div class="r-auth-or">
                <span>OR</span>
              </div>
              <div class="clearfix">
                <div class="r-auth-outer r-login">
                  <div class="r-auth-head">
                    <h2><b>Login</b> Now</h2>
                    <span>Login to our website</span>
                  </div>
                  <div class="r-auth-form">
                    <div class="r-login-fb">
                      <a href="#"><img src="assets/images/fb.jpg" class="img-fluid d-block m-auto" alt=""></a>
                    </div>
                    <div class="r-or-line"><span>OR SIGN IN</span></div>
                    <form action="" method="post">
                                            <?php
                                            if (isset($_POST['login_user'])){
                                                include('errors.php');
                                            }?>
                      <div class="form-group">
                        <input type="email" required class="form-control" placeholder="Email Address" value="<?php echo $email; ?>" name="email">
                      </div>
                      <div class="form-group">
                        <input type="password" required class="form-control" placeholder="Password" name="password">
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-full" name="login_user">LOGIN NOW</button>
                      </div>
                    </form>
                    <div class="r-from-inof">
                      <p class="text-center">

                      </p>
                    </div>
                  </div>
                </div>
                <div class="r-auth-outer r-register">
                  <div class="r-auth-head">
                    <h2><b>Register</b> Now</h2>
                    <span>Required information for account creation</span>
                  </div>
                  <div class="r-auth-form">
                    <form method="post" action="#">
                      <?php
                      if (isset($_POST["reg_user"])){
                              include('errors.php');
                            } ?>
                      <div class="form-group">
                        <input type="email" required class="form-control" placeholder="Email Address" value="<?php echo $email; ?>" name="email">
                      </div>
                      <div class="form-group">
                        <input type="password" required class="form-control" placeholder="Password" name="password_1">
                      </div>
                      <div class="form-group">
                        <input type="password" required class="form-control" placeholder="Confirm Password" name="password_2">
                      </div>
                      <div class="form-group">
                        <img src="assets/images/recaptcha.jpg" class="img-fluid d-block m-auto" alt="">
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-full" name="reg_user">SIGN UP NOW</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
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

      </div>
      <div id="r-to-top" class="r-to-top"><i class="fa fa-angle-up"></i></div>
      <!-- JQUERY:: JQUERY.JS -->
      <script src="assets/js/jquery.min.js"></script>

      <!-- JQUERY:: BOOTSTRAP.JS -->
      <script src="assets/js/tether.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>

      <!-- JQUERY:: PLUGINS -->
      <script src="assets/js/plugins/owl/owl.carousel.min.js"></script>

    <!-- JQUERY:: CUSTOM -->
      <script src="assets/js/custom.js"></script>

  </body>
</html>
