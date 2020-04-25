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
	$results = $db->query("SELECT * FROM books WHERE userid='$uid'");
	
	//Create array to keep all results
	$arr= array();

	// Fetch Associated Array (1 for SQLITE3_ASSOC)
	while ($res= $results->fetchArray(1))
	{
		//insert row into array
		array_push($arr, $res);

	}

	return $arr;
}

function searchBooks($query) {
	$db = connect_books();

	$results = $db->query("SELECT * FROM books WHERE author='$query' OR title='$query' OR isbn='$query'");
	
	//Create array to keep all results
	$arr= array();

	// Fetch Associated Array (1 for SQLITE3_ASSOC)
	while ($res= $results->fetchArray(1))
	{
		//insert row into array
		array_push($arr, $res);

	}

	//you can return a JSON array
	//echo json_encode($arr); 
	//$arr = $res;//->fetchArray(1);
	return $arr;
}

function getBookInfo($bookid) {
	$db = connect_books();

	$res = $db->query("SELECT * FROM books WHERE bookid='$bookid'");
	return $res->fetchArray(1);

}

function buyBook($bookid, $buyerid) {
	$bookinfo = getBookInfo($bookid);
	$buyerinfo = getUserInfo($buyerid);
	
	$sellerid = $bookinfo['userid'];
	$sellerinfo = getUserInfo($sellerid);
	$sellername = $sellerinfo['fullname'];
	$selleremail = $sellerinfo['email'];

	$buyername = $buyerinfo['fullname'];
	$buyeremail = $buyerinfo['email'];

	$booktitle = $bookinfo['title'];
	$bookauthor = $bookinfo['author'];

	$msg= "Hello $sellername!\n $buyername would like to buy $booktitle by $bookauthor.\n Please use this email to get in contact with $buyername: $buyeremail.\n Thanks!";
	mail($selleremail,"TextChange purchase",$msg);
	
}
