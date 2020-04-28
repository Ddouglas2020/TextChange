<html>
<link rel="stylesheet" type="text/css" href="sell.css">
<body>

<form action="" label="sellform" method="post">
<div label="custom">Please input your textbook's information:<br></div>
<br>
Author: <input type="text" name="author"><br>
Title: <input type="text" name="title"><br>
ISBN: <input type="text" name="isbn"><br>
Price: <input type="text" name="price"><br>
<label>Condition: </label>
<select name = "condition">
<option value = "Mint">Mint</option>
<option value = "Good">Good</option>
<option value = "Poor">Poor</option>
</select>
<br>
<br>
<input type="submit" name="sell-book" value="Submit">
<a href="user.php" label="return">Return to Home Page</a>
</form>

</body>
</html>
<?php
require_once("../utils/Book.php");

session_start();
$id = $_SESSION["uid"];
if($id == NULL) { header("location:login.php"); }

if(!empty($_POST["sell-book"])) {
	//get session vars

	$userid = $_SESSION["uid"];
	$password = $_SESSION["upass"];
	$isbn = $_POST["isbn"];
	$author = $_POST["author"];
	$title = $_POST["title"];
	$price = $_POST["price"];
	$condition = $_POST["condition"];

	$res = insertBook($isbn, $author, $title, $price, $condition, $userid, $password);
	echo $res;
	if ($res == 1){
		header("location:user.php");
	}
}
?>
