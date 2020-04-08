<?php
require_once("../utils/User.php");
session_start();
$id = $_SESSION["uid"];
$pass = $_SESSION["upass"];
$info = getInfo($id,$pass);
?>

<html>
<body>
Email: <?php echo $info["email"]?>
</body>
<html>



