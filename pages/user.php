<?php
require_once("../utils/User.php");
session_start();
$id = $_SESSION["uid"];
$pass = $_SESSION["upass"];
$info = getInfo($id,$pass);
?>

<html>
<body>
Username: <?php echo $info["username"]?>
</body>
<html>


