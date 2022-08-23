<!DOCTYPE html>
<html lang = "en">
	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="thefloweringpot.css">
    <title> Cancel Order </title>
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
    <label>Customer ID Number</label>
      <input type="number" id="idnum" name="idnum"> <br>
    <label>Order Number</label>
      <input type="number" id="ordernum" name="ordernum"> <br>
    <input type = "submit" id="submit" name="submit">
  </form>
  
  <?php 
    $customer_id = $_POST['idnum'];
    $order_num = $_POST['ordernum'];
    
    if (isset($customer_id) && isset($order_num))  { 
      $query = "DELETE FROM orders WHERE customerid = '$customer_id' && ordernum = '$order_num';";
      $result = mysqli_query($con, $query);
      $result_check = mysqli_affected_rows($con);
      if ($result_check < 1)  {
         echo "<script>alert('THE ORDER ASSOCIATED WITH THE ORDER NUMBER YOU ENTERED DOES NOT EXIST')</script>";
         }
      else  {
         echo "<script>alert('Order Canceled!')</script>";
         }     
      }
  ?>
 </body>
  
 </html>
