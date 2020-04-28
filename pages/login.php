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
		$_SESSION["upass"] = $authdata["password"];
		header("location:user.php");
	}

}
	
?>
<html>
<link rel="stylesheet" href="login.css" type="text/css"> 
<h1> Welcome to TextChange! </h1>
<div>
<form action="" method="post">
Hofstra ID:    <input type="text" name="username"><br>
Password: <input type="password" name="password"><br>
<input type="submit" name="login-user" value="Login">
<!-- <a label="ps" href="">Forgot Password?</a><br><br> -->
<a label="rg" href="register.php">Not Registered? Click Here to Get Started</a>
</div>
</form>

