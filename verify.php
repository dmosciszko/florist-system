<?php
  session_start();
  require_once("connection.php");

  $firstname = $_POST['fname'];
  $lastname = $_POST['lname'];
  $password = $_POST['pword'];
  $id = $_POST['idnum'];
  $phonenum = $_POST['phonenum'];
  $transaction = $_POST['transactions'];

    
  $query = "SELECT * FROM florists WHERE firstname = '$firstname' AND lastname = '$lastname' AND password = '$password' AND idnum = '$id' AND phonenum = '$phonenum';";
  $result = mysqli_query($con,$query);
  $rows= mysqli_num_rows($result);
  if ($rows==1) {
    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;
    $_SESSION['password'] = $password;
    $_SESSION['id'] = $id;
    $_SESSION['phonenum'] = $phonenum;
  switch($transaction)  {
    case "search records":
      header("location:florist_search_records.php");
      break;
    case "place order":
      header("location:florist_place_order.php");
      break;
    case "update order":
      header("location:florist_update_order.php");
      break;
    case "cancel order":
      header("location:florist_cancel_order.php"); 
      break;
    case "Create an Account":
      header("location:creat_cust_acc.php");  
      break;
    }
  }
  else  {
    header("location:florist_home.php");
    }
      
/*      
  if (strcmp($transaction, "search records"))  {  
      header("location:florist_search_records.php");
    }
  else if (strcmp($transaction, "place order"))  {
      header("location:florist_place_order.php");
      }
  else if (strcmp($transaction, "update order"))  {
      header("location:florist_update_order.php");
      }
  else if (strcmp($transaction, "cancel order"))  {
      header("location:florist_cancel_order.php");
      }
  else if (strcmp($transaction, "Create an Account"))  {
      header("location:creat_cust_acc.php");
      }
  else  {
    header("location:florist_home.php");
    }
    */
    
?>  