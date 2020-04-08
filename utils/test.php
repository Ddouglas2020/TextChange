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
	$res = insertUser('arkad@mail.com', hashp('arkad'), 'Ark Ayvaz', 'h703168658');
	print $res;
}

if(1==0) {
	$res = insertBook('12345','Selinger','Catcher in the Rye','$15.50','Mint','4',hashp('ark'));
	print $res;
}

if(1==1) {
	$res = authUser('ark',hashp('ark'));
	print $res==null;
}
//print_r($res);
//print count($res);
//print $res!=null;
