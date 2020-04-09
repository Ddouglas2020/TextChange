<?php
require_once("../utils/User.php");
session_start();
$id = $_SESSION["uid"];
$pass = $_SESSION["upass"];
$info = getInfo($id,$pass);
?>

<html>
<body>
Email: <?php echo $info["email"]?><br> <!-- // Displays user email -->
Name: <?php echo $info["fullname"]?><br> <!-- // Displays user name -->
Hofstra ID: <?php echo $info["hofstraid"]?><br><br> <!-- // Displays user's hofstra ID -->

<a href="sell.php" title="sellBook">Sell Book</a><br>
<a href="myBooks.php" title="userBooks">My Books</a><br>
<a href="search.php" title="search">Search</a><br>
<a href="logout.php" title="logout">Sign Out</a>
</body>
<html>



