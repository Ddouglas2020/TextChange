<html>
<body>

<form action="" method="post">
Email:<input type="text" name="email"><br>
Password: <input type="password" name="password"><br>
Full name:<input type="text" name="fullname"><br>
Hofstra ID:<input type="text" name="hofstraid"><br>
<input type="submit" name="register-user" value="Submit">
</form>

</body>
</html>
<?php
require_once("../utils/User.php");

session_start();

if(!empty($_POST["register-user"])) {

	$email = $_POST["email"]; //still need to validate
	$password = hash('sha256',$_POST["password"]);
	$fullname = $_POST["fullname"];
	$hofstraid = $_POST["hofstraid"];
	//check if doesn't exist
	
	$insertId = insertUser($email, $password, $fullname, $hofstraid);
	echo $insertId;
	header("location:login.php");

}
?>
