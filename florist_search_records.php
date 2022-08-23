
<!DOCTYPE html>
<html lang = "en">
	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="thefloweringpot.css">
    <title> Home </title>
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
  <table style= "background-color: black;">
    <caption>Florist</caption>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>ID Number</th>
        <th>Email</th>
        <th>Phone Number</th>
      </tr>
  
 <?php
   $query = "SELECT * FROM florists WHERE firstname = '{$_SESSION['firstname']}';";
   $result = mysqli_query($con, $query);
   $result_check = mysqli_num_rows($result);
   if ($result_check > 0)  {
     while ($row = mysqli_fetch_assoc($result))  {
       echo "<tr><td>" . $row['firstname'] . "</td><td>" . $row['lastname'] . "</td><td>" . $row['idnum'] . "</td><td>" . $row['email'] . "</td><td>" . $row['phonenum'] . "</td></tr>";
       }
     }
 ?>
 </table>
 <table style= "background-color: black;">
   <caption>Customers</caption>
     <tr>
       <th>First Name</th>
       <th>Last Name</th>
       <th>Items Ordered</th>
       <th>Delivery Date<th>
       <th>Delivery Address</th>
     </tr>
 <?php
   $query = "SELECT customers.firstname, customers.lastname, orders.type, orders.date, orders.address FROM customers INNER JOIN orders ON customers.custid = orders.customerid WHERE orders.floristid = '{$_SESSION['id']}';";
   $result = mysqli_query($con, $query);
   $result_check = mysqli_num_rows($result);
   if ($result_check > 0)  {
     while ($row = mysqli_fetch_assoc($result))  {
       echo "<tr><td>" . $row['firstname'] . "</td><td>" . $row['lastname'] . "</td><td>" . $row['type'] . "</td><td>" . $row['date'] . "</td><td>" . $row['address'] . "</td></tr>";
       }
     }
 ?>
 </table>
 </body>
 </html>