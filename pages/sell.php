<html>
<body>

<form action="" method="post">
Sell book form<br>
Author:<input type="text" name="author"><br>
Title: <input type="text" name="title"><br>
ISBN: <input type="text" name="isbn"><br>
Price: <input type="text" name="price"><br>
Condition: <input type="text" name="condition"><br>
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

	
	$res = insertBook($isbn, $author, $title, $price, $condition, $userid, $password);
	echo $res;
}
?>