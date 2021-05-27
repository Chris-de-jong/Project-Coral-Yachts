<header>
  <?php if (!isset($_SESSION)) session_start(); ?>
   <div class="r-header r-header-inner">
     <div class="r-header-strip">
       <div class="container">
         <div class="row clearfix">
           <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
             <div class="r-logo">
               <a href="index.php" class="d-inline-block"><img src="assets/images/logo_white.png" class="img-fluid d-block" alt=""></a>
             </div>
             <a href="javaScript:void(0)" class="menu-icon"> <i class="fa fa-bars"></i> </a>
           </div>
           <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-xs-12">
             <div class="r-header-action float-right">
               <?php  if (isset($_SESSION['email'])) : ?>
                      <a href="index.php?logout='1'"><img src="assets/images/icon-lock.png" alt='' /><span>Logout</span></a>
                <?php endif ?>
                <?php  if (!isset($_SESSION['email'])) : ?>
               <a href="login-register.php"> <img src="assets/images/icon-lock.png" alt='' /> <span>Login</span></a>
               <?php endif ?>
               <a href="#" class="r-search"> <img src="assets/images/icon-search.png" alt='' /> <span>Search</span></a>

              <?php if (isset($_SESSION['user_type'])) : ?>

                 <?php if ($_SESSION['user_type'] == 'admin') : ?>
                        <a href="admin.php"><img src="assets/images/icon-lock.png" alt='' /><span>Admin Panel</span></a>
                  <?php endif; ?>
                  <?php if ($_SESSION['user_type'] == 'regular_user'): ?>
                    <a href="admin.php"><img src="assets/images/icon-lock.png" alt='' /><span>User Panel</span></a>
                  <?php endif ?>

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
                   <li class="r-has-child">
                     <a href="index.php">HOME</a>
                   </li>
                   <li class="r-has-child">
                     <a href="yachts-listing.php">VEHICLES</a>
                     <ul class="pl-0 ml-0">
                       <li><a href="yachts-list-map.php">Yacht List Map</a></li>
                       <li><a href="yachts-booking.php">Yacht Booking</a></li>
                     </ul>
                   </li>
                   <li><a href="gallery.php">GALLERY</a></li>
                   <li><a href="shippers.php">SHIPPERS</a></li>
                   <li><a href="contact.php">CONTACT US</a></li>
                   <li><?php  if (isset($_SESSION['email'])) : ?>

                                       <p>HELLO, <strong><?php echo $_SESSION['email'];?></strong></p>


                       <?php endif; ?>
                 </ul>
               </nav>
             </div>
           </div>
         </div>
       </div>
     </div>
     <div class="r-header-inner-banner">
       <div class="r-header-in-over">

       </div>
     </div>
   </div>
 </header>
