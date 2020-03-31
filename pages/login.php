<html>
<body>

<form action="" method="post">
UsernameTest: <input type="text" name="username"><br>
Password: <input type="password" name="password"><br>
<input type="submit" name="login-user" value="Login">
</form>

</body>
</html>
<?php
require_once("../utils/User.php");
session_start();

if(!empty($_POST["login-user"])) {

	$username = $_POST["username"]; //still need to validate
	$password = hash('sha256',$_POST["password"]);

	$authdata = authUser($username, $password);
	$_SESSION["uid"] = $authdata["id"];
	$_SESSION["upass"] = $authdata["password"];
	

}
	

?>
