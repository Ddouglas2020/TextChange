<?php
require_once("DB.php");

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

function insertUser($uname, $pass) {
	$db = connect();
	$db->exec("CREATE TABLE users(id INTEGER PRIMARY KEY, username TEXT, password TEXT)");
	$db->exec("INSERT INTO users(username,password) VALUES ('$uname','$pass')");
	return $db->lastInsertRowID();
}
