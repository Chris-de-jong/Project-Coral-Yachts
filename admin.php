<?php
include "server.php";
if (isset($_SESSION['user_type'])){
  if ($_SESSION['user_type'] == "admin"){
    include "adminer.php";
  }
  else { echo "you need to be logged in as admin"; }
} else { echo "you need to be logged in as admin"; }
