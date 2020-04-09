<?php
require_once("../utils/Book.php");
session_start();
$id = $_SESSION["uid"];
$info = getBooks($id);
?>

<html>
<h1>Books for Sale</h1><br>
<h2>Book 1</h2>
<body>
<!-- ArrInfo: <?php print_r($info);?><br> -->
Title: <?php echo $info['title']?><br>
Author: <?php echo $info['author']?><br>
ISBN: <?php echo $info['isbn']?><br>
Price: <?php echo $info['condition']?><br>
Condition: <?php echo $info['userid']?><br><br>

<a href="user.php" title="return">Return to Homepage</a><br>
</body>
<html>



