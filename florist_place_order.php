<!DOCTYPE html>
<html lang = "en">
	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="thefloweringpot.css">
    <title> Place Order </title>
	</head>
 
 <body>
 <?php
   include "connection.php";
   session_start();
   $floristname =  $_SESSION['firstname'];
   $floristid = $_SESSION['id'];
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
    <label>First Name</label>
      <input type="text" id="fname" name="fname"> <br>
    <label>Last Name</label>
      <input type="text" id="lname" name="lname"> <br>
    <label>ID Number</label>
      <input type="number" id="idnum" name="idnum"> <br>
    <label>Arrangement</label>
      <select name="arrangement" id="arrangement"> 
        <option value="bouquet">Bouquet</option>
        <option value="boutonniere">Boutonnierer</option>
        <option value="centerpiece">Centerpiece</option>
        <option value="floral arrangement">Floral Arrangement</option>
        <option value="table wreath">Table Wreath</option>
        <option value="potted plant">Potted Plant</option>
      </select> <br>
    <label>Delivery Date</label>
    <input type="date" id="date" name="date"> <br>
    <label>Delivery Address</label>
    <input type="text" id="address" name="address"> <br>
    <input type = "submit" id="submit" name="submit">
  </form>
  
  <?php
      $firstname = $_POST['fname'];
      $lastname = $_POST['lname'];
      $id = $_POST['idnum'];
      $arrangement = $_POST['arrangement'];
      $date = $_POST['date'];
      $address = $_POST['address'];
      
      if (isset($firstname) && isset($lastname) && isset($id) && isset($arrangement) && isset($date) && isset($address))   {    
        $check_for_acc_query = "SELECT * FROM customers WHERE firstname = '$firstname' AND lastname = '$lastname' AND custid = '$id';";
        $acc_result = mysqli_query($con, $check_for_acc_query);
        $acc_result_check = mysqli_num_rows($acc_result);
        if ($acc_result_check < 1)  {
          echo '<script>alert("CUSTOMER ACCOUNT DOES NOT EXIST")</script>';
          }
        else  {
            $random_order_num = rand(1,999);
            $insert_query = "INSERT INTO orders (type, date, address, ordernum, customerid, floristid) VALUES ('$arrangement', '$date', '$address', '$random_order_num', '$id', '$floristid');";
            $insert_result = mysqli_query($con, $insert_query);
            echo "<script>alert('Order Placed! Your order number is: $random_order_num')</script>";
          } 
        }      
  ?>
 </body>  
</html>
