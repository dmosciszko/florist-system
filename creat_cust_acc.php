<!DOCTYPE html>
<html lang = "en">
	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="thefloweringpot.css">
    <title> Create Customer Account </title>
	</head>
 
 <body>
 
 <?php
   include "connection.php";
   session_start();
   $floristname =  $_SESSION['firstname'];
  ?>
  
   <ul>
    <li><a href="florist_home.php">Home</a></li>
    <li><a href="florist_search_records.php">Search Records</a></li>
    <li><a href="florist_place_order.php">Place Order</a></li>
    <li><a href="florist_update_order.php">Update Order</a></li>
    <li><a href="florist_cancel_order.php">Cancel Order</a></li>
    <li><a href="creat_cust_acc.php">Create Customer Account</a></li>
  </ul>
  
  <form method= "POST">
    <label>Customer First Name</label>
      <input type="text" id="fname" name="fname"> <br>
    <label>Customer Last Name</label>
      <input type="text" id="lname" name="lname"> <br>
    <label>Customer ID Number</label>
      <input type="number" id="idnum" name="idnum"> <br>
    <input type = "submit" id="submit" name="submit">
  </form>
  
  <?php 
    $customer_fname = $_POST['fname'];
    $customer_lname = $_POST['lname'];
    $id = $_POST['idnum'];
    
    if (isset($customer_fname) && isset($customer_lname) && isset($id))  {
      $query = "INSERT INTO customers (firstname, lastname, custid) VALUES ('$customer_fname', '$customer_lname', '$id');";
      $result = mysqli_query($con, $query);
      $result_check = mysqli_affected_rows($con);
      if ($result_check < 1)  {
        echo "Error on Query.";
        }
      else  {
        echo "Account created!";
        }
    }
    ?>
  </body>
 </html>