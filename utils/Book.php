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

function getBooks($uid){ //create a multidimensional array or create multiple arrays

	//$resultArr = [];
	$db = connect_books();
	$res = $db->query("SELECT * FROM books WHERE userid='$uid'");
	$arr = $res->fetchArray(1);
	//$i=0;
	/*while($arr = $res->fetchArray(1)){
		$resultArr[$i] = $arr;
		$i++;
		print_r($resultArr);
	}
	return $resultArr;*/
	return $arr;
	
}
