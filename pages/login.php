<?php
require_once("../utils/User.php");
session_start();

if(!empty($_POST["login-user"])) {
	
	$username = $_POST["username"]; //still need to validate
	$password = hash('sha256',$_POST["password"]);
	
	$authdata = authUser($username, $password);
	if($authdata==null) {
		echo 'Login or password is invalid';			
	} else {
		$_SESSION["uid"] = $authdata["userid"];
		header("location:user.php");
	}

}
	

?>

<html>
<body>

<form action="" method="post">
Email:    <input type="text" name="username"><br>
Password: <input type="password" name="password"><br>
<input type="submit" name="login-user" value="Login">
</form>
<a href=register.php>Signup</a>
</body>
</html>

