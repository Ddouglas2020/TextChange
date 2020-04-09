<?php
require_once("books_DB.php");
require_once("User.php");


function insertBook($isbn, $author, $title, $price, $condition, $userid, $password) {
	
	$db = connect_books();
	if (authenticated($userid, $password)) {
		$res = $db->exec("INSERT INTO books(isbn,author,title,price,condition,userid) VALUES ('$isbn', '$author', '$title', '$price', '$condition', '$userid')");
	} else {
		print "not authed";
	}
	return $res;//success or not
}

