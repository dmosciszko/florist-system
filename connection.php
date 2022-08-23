<?php 
  $con = mysqli_connect ("sql1.njit.edu", "dm634", "Warwick2018!", "dm634");
  if (mysqli_connect_errno())  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>