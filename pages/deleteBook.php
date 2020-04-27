<?php
session_start();
require_once("../utils/Book.php");

$bookid =  $_GET['bookid'];
$uid = $_SESSION['uid'];

deleteBook($uid, $bookid);
header("location:myBooks.php");
?>
