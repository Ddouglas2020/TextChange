<html>
<body>

<form action="" method="post">
Username: <input type="text" name="username"><br>
Password: <input type="password" name="password"><br>
<input type="submit" name="register-user" value="Submit">
</form>

</body>
</html>
<?php
session_start();

if(!empty($_POST["register-user"])) {

	$username = $_POST["username"]; //still need to validate
	$password = hash('sha256',$_POST["password"]);
	require_once("../utils/User.php");
	//check if doesn't exist
	
	$insertId = insertUser($username, $password);
	echo $insertId;
}
?>
