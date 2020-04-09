<html><body>

<form action="" method="post">
Please input your textbook's information:<br>
<br>
Author: <input type="text" name="author"><br>
Title: <input type="text" name="title"><br>
ISBN: <input type="text" name="isbn"><br>
Price: <input type="text" name="price"><br>
<label>Condition: </label>
<select id = "condition">
<option value = "mint">Mint</option>
<option value = "good">Good</option>
<option value = "poor">Poor</option>
</select>
<br>
<br>
<input type="submit" name="sell-book" value="Submit">
</form>

</body>
</html>
<?php
require_once("../utils/Book.php");

session_start();

if(!empty($_POST["sell-book"])) {
	//get session vars

	$userid = $_SESSION["uid"];
	$password = $_SESSION["upass"];
	$isbn = $_POST["isbn"];
	$author = $_POST["author"];
	$title = $_POST["title"];
	$price = $_POST["price"];
	$condition = $_POST["sell-book"];

	$res = insertBook($isbn, $author, $title, $price, $condition, $userid, $password);
	echo $res;
	if ($res == 1){
		header("location:user.php");
	}
}
?>
