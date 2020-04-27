<?php
require_once("../utils/User.php");

session_start();

if(!empty($_POST["register-user"])) {
	ob_start();

	$email = $_POST["email"]; //still need to validate
	$password = hash('sha256',$_POST["password"]);
	$fullname = $_POST["fullname"];
	$hofstraid = $_POST["hofstraid"];
	if (regCheck($email, $hofstraid) == TRUE){
		echo "This login already exists";
}
	else {
		$insertId = insertUser($email, $password, $fullname, $hofstraid);

		header("location:login.php"); 
		exit;
	}

}
?>
<html>
<body>
<meta name="viewport" content="width=device-width, initial-scaled=1">
<link rel="stylesheet" type="text/css" href="registration.css">
<h1> Registration </h1>
<div class="regform">
	<form action="" method="post">
	<label for="email">Email:</label> 
	<input type="email" id="email" name="email" placeholder="Hofstra Email" required><br>
	Password: <input type="password" id="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required><br>
	Confirm Password: <input type="password" id="confirm_pass" name="confirm_pass" placeholder="Confirm Password" 	required><br>
	<label for="fullname">Fullname:</label> 
	<input type="text" id="fullname" name="fullname" placeholder="Last, First" required><br>
	Hofstra ID:<input type="text" id="hofstraid" maxlength="9" name="hofstraid" placeholder="Hofstra ID Number" pattern="[0-9]+" required><br>
	<input type="submit" name="register-user" value="Submit">
	</form>
</div>

<div id="message">
	<h3>Password must contain the following</h3>
	<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
	<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
	<p id="number" class="invalid">A <b>number</b></p>
	<p id="length" class="invalid">Minimum <b>8 characters</b></p> 
</div>
<div id="message2">
	
	<p id="lengthofID" class="invalid">Please Input Your 9 Digit ID Number</p>
	<p id="idNum" class="invalid"></p>
</div>
<script type="text/javascript">
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
var confirmpass = document.getElementById("confirm_pass");

// Variables to Validate Hofstra IDs
var myIDinput = document.getElementById("hofstraid");
var lengthofID = document.getElementById("lengthofID");
var idNum = document.getElementById("idNum");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user clicks on the ID field, show the message box
myIDinput.onfocus = function() {
  document.getElementById("message2").style.display = "block";
}

// When the user clicks outside of the ID field, hide the message box
myIDinput.onblur = function() {
  document.getElementById("message2").style.display = "none";
}



// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}

// When the user starts typing into the ID box
myIDinput.onkeyup = function() {
	//Check for numbers
	var idNumbers = /[0-9]/g;
  	if(myIDinput.value.match(idNumbers)) {
    		idNum.classList.remove("invalid");
    		idNum.classList.add("valid");
  	} else {
    		idNum.classList.remove("valid");
    		idNum.classList.add("invalid");
  	}

	//Check the length
	if(myIDinput.value.length == 9){
		lengthofID.classList.remove("invalid");
		lengthofID.classList.add("valid");
	} else {
		lengthofID.classList.remove("valid");
		lengthofID.classList.add("invalid");
	  }
}

//Confirm Password script
function validatePassword(){
  if(myInput.value != confirmpass.value) {
    confirmpass.setCustomValidity("Passwords Don't Match");
  } else {
    confirmpass.setCustomValidity('');
  }
}

myInput.onchange = validatePassword;
confirmpass.onkeyup = validatePassword;

</script>

</body>
</html>


