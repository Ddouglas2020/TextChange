<?php
session_start();
require_once("../utils/Book.php");

$bookid =  $_GET['bookid'];
$buyerid = $_SESSION['uid'];

buyBook($bookid, $buyerid);
print "Email successfully sent";
?>
