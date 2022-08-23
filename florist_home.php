
<!DOCTYPE html>
<html lang = "en">
	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="thefloweringpot.css">
    <title> The Flowering Pot </title>
	</head>
 
 <body>
   <h1> The Flowering Pot </h1>
    <p>
      <div>    
        <form action = "verify.php" method = "POST">
           <label> First Name: </label>
            <input type="text" id="fname" name="fname" > <br>
          <label> Last Name: </label>
            <input type="text" id="lname" name="lname"> <br>
          <label> Password: </label>
            <input type="password" id="pword" name="pword"> <br>
          <label> ID Number: </label>
            <input type="number" id="idnum" name="idnum"> <br>
          <label> Phone Number: </label>
            <input type="text" id="phonenum" name="phonenum"> <br>
          <label> Select a transaction: </label>                     
            <select name="transactions" id="transactions"> 
              <option value="search records"> Search Records</option>
              <option value="place order"> Place Order</option>
              <option value="update order"> Update Order</option>
              <option value="cancel order"> Cancel Order</option>
              <option value="Create an Account"> Create an Account</option> </select> 
          <input type = "submit" id="submit" name="submit">
          <button type="button" id="reset" name = "reset">Reset</button>
        </form>
      </div>
    </p>
        <script type="text/javascript" src="floweringpot.js"> </script>
   </body>
 </html>

