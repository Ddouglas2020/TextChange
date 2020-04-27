<?php

require_once('User.php');
require_once('Book.php');

function hashp($pass) {
	return hash('sha256',$pass);
}

if (1==0) {

	if( authenticated('4',hashp('arki'))) {
		print "authenticated";
	} else {
		print "not auth";
	}
}

if(1==0) {
	$res = insertUser('test2@test', hashp('test'), 'Test Test', '2342348');
	print $res;
}

if(1==0) {
	$res = insertBook('12345','Selinger','Catcher in the Rye','$15.50','Mint','4',hashp('ark'));
	print $res;
}

if(1==0) {
	$res = authUser('aayvazyan1@pride.hofstra.edu',hashp('Goodyear123'));
	$res = authUser('ark@mail.com',hashp('ark'));
	print_r($res);
}

if(1==0) {
	$res = searchBooks('ark');
	print_r($res);
}

if(1==0) {
	$res = getBooks('1');
	print_r($res);
}

if(1==0) {
	buyBook('1','1');
}

if(1==0) {
	print_r(getBookInfo(14));
}

if(1==0) {
	print buyBook(1,1);
}

if(1==1) {
	print deleteBook(2,12);
}
//print_r($res);
//print count($res);
//print $res!=null;
