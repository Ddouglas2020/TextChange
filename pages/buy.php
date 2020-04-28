<?php
session_start();
require_once("../utils/Book.php");

$bookid =  $_GET['bookid'];
$buyerid = $_SESSION['uid'];
if($buyerid == NULL) { header("location:login.php"); }

buyBook($bookid, $buyerid);
print "Email successfully sent";
header("refresh:2;url=user.php");
?>
