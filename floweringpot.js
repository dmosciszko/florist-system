class florist  {
  florist(fname, lname, pword, idnum)  {
    this.fname = fname;
    this.lname = lname;
    this.pword = pword;
    this.idnum = idnum;
  }
}

var submit = document.getElementById("submit");
var reset = document.getElementById("reset");

submit.addEventListener('click', ()=>  {
      console.log("hello");
      if (validateFlorist())  {
        console.log("Info is validated. Now you need to verify with PHP and SQL");
      }
});

reset.addEventListener('click', ()=>  {
    document.getElementById('fname').value='';
    document.getElementById('lname').value='';
    document.getElementById('pword').value='';
    document.getElementById('idnum').value='';
    document.getElementById('phonenum').value='';
    document.getElementById('email').value='';
});

function validateFlorist() {

  if (!document.getElementById("fname").value)  {
    alert("Please Enter Your First Name");
    return false;
  }
  if (!document.getElementById("lname").value)  {
    alert("Please Enter Your Last Name");
    return false;
  }
  if (!document.getElementById("pword").value)  {
    alert("Please Enter Your Password");
    return false;
  }
  if (!document.getElementById("idnum").value)  {
    alert("Please Enter Your ID Number");
    return false;
  }
  
  //PASSWORD HANDLING
  var password = document.getElementById("pword").value;
  
  var nums = 0;
  var caps = 0;
  for (var i = 0; i < password.length; i++)  {
    if (!isNaN(password.charAt(i)))  {
      nums++;
    }
    if (password.charAt(i) == password.charAt(i).toUpperCase())  {
      caps++;
    }
  }
  if (caps == 0)  {
    alert("Password must contain at least one capital letter");
    return false;
  }
  if (nums == 0)  {
    alert("Password must contain at least one number");
    return false;
  }
  
  //ID HANDLING
  var id = document.getElementById("idnum").value;
  if (isNaN(id))  {
    alert("ID must be contain only numbers");
    return false;
  }  
  if (id.length != 8)  {
    alert("ID Number must be 8 numbers long");
    return false;
  }
  
  //PHONE NUMBER HANDLING
  var phonenum = document.getElementById("phonenum").value;
  var numFormat = /^\(?([0-9]{3})\)?[- ]?([0-9]{3})[- ]?([0-9]{4})$/;
  
  if (phonenum)  {
    if (!phonenum.match(numFormat))  {
      alert("Phone number must be in the format 000-000-0000 or 000 000 0000 or 0000000000");
      return false;
    }
  }

  return true;  
}
