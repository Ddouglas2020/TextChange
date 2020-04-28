<?php
require_once("users_DB.php");

function regCheck($email, $hofstraid) {
	$db = connect();
	$res = $db->query("SELECT * FROM users WHERE email='$email' OR hofstraid='$hofstraid'");
	$arr = $res->fetchArray(1);
	if (sizeof($arr) == 1) {
		return NULL;
	}
	else {
		return TRUE;
	}
}


function getUserInfo($uid) {
	
	$db = connect();
	$res = $db->query("SELECT * FROM users WHERE userid='$uid'");
	$arr = $res->fetchArray(1);
	return $arr;
}

function authUser($uname,$pass) {

	$db = connect();
	$res = $db->query("SELECT userid,password FROM users WHERE hofstraid='$uname' AND password='$pass'");
	
	$authdata = $res->fetchArray(1);
	
	return $authdata;
}

function insertUser($email, $pass, $fullname, $hofstraid) {

	$db = connect();
	$res = $db->exec("INSERT INTO users(email,password,fullname,hofstraid) VALUES ('$email','$pass','$fullname','$hofstraid')");
	return $res;
}

function authenticated($uid, $upass) {
	
	$db = connect();
	$res = $db->query("SELECT * FROM users WHERE userid='$uid' AND password='$upass'");
	return $res!=null;
}
