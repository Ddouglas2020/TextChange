<?php
require_once("users_DB.php");


function getInfo($uid, $pass) {
	
	$db = connect();
	$res = $db->query("SELECT * FROM users WHERE id='$uid' AND password='$pass'");
	$arr = $res->fetchArray(1);
	return $arr;
}

function authUser($uname,$pass) {

	$db = connect();
	$res = $db->query("SELECT id,password FROM users WHERE username='$uname' AND password='$pass'");
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
