<?php

$db = new SQLite3(':memory:');

$db->exec("CREATE TABLE friends(id INTEGER PRIMARY KEY, name TEXT)");
$db->exec("INSERT INTO friends(name) VALUES ('Tom')");
$db->exec("INSERT INTO friends(name) VALUES ('Rebecca')");
$db->exec("INSERT INTO friends(name) VALUES ('Jim')");
$db->exec("INSERT INTO friends(name) VALUES ('Robert')");

$last_row_id = $db->lastInsertRowID();

echo "The last inserted row Id is $last_row_id";
