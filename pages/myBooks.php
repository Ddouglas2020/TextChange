<?php
require_once("../utils/Book.php");
session_start();
$id = $_SESSION["uid"];
$arr = getBooks($id);
if($id == NULL) { header("location:login.php"); }

function array2Html($array, $table = true)
{
    $out = '';
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            if (!isset($tableHeader)) {
                $tableHeader =
                    '<th>' .
                    implode('</th><th>', array_keys($value)) .
                    '</th>';
            }
            array_keys($value);
	    $out .= '<tr>';
            $out .= array2Html($value, false);
            $out .= '</tr>';
	} else {
            $out .= "<td>$value</td>";
        }
    }

    if ($table) {
        return '<table>' . $tableHeader . $out . '</table>';
    } else {
        return $out;
    }
}
?>

<html>
<link rel="stylesheet" type="text/css" href="myBooks.css"> 
<h1>Your Registered Books</h1>
<body>
	<div id="table"> <?php echo array2Html($arr);?> </div>

	<div id="link"> <a href="user.php" title="return">Return to Homepage</a> </div>
</body>
<html>



