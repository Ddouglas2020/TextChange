<html><body>

<form action="" method="post">
Search:<input type="text" name="search-text"><br>
<input type="submit" name="search-book" value="Search">
</form>

</body>
</html>
<?php
require_once("../utils/Book.php");

session_start();

if(!empty($_POST["search-book"])) {
	
	$search = $_POST['search-text'];

	$res = searchBooks($search);

	if ($res == 0){
		echo "no book found";
	} else {
		echo $res['title'];
	}

}
?>
