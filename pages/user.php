<?php
require_once("../utils/User.php");
session_start();
$id = $_SESSION["uid"];
$info = getUserInfo($id);
if($id == NULL) { header("location:login.php"); }
?>

<html>
<link rel="stylesheet" type="text/css" href="user.css">
<h1> Welcome <?php echo $info["fullname"]?></h1> 
<h2>Account Info</h2>
<div id="info">
	<body>
	 <?php echo $info["email"]?><br><br> <!-- // Displays user email -->
	 <?php echo $info["hofstraid"]?><br><br> <!-- // Displays user's hofstra ID -->
</div>
<div id="links">
	<a href="sell.php" title="sellBook">Sell Book</a>
	<a href="myBooks.php" title="userBooks">My Books</a>
	<a href="search.php" title="search">Search</a>
	<a href="logout.php" title="logout">Sign Out</a>
</div>
</body>
<html>



