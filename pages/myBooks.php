<?php
require_once("../utils/Book.php");
session_start();
$id = $_SESSION["uid"];
$arr = getBooks($id);

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
	} else if ($key=='bookid') {
		$out .= "<td><a href=\"deleteBook.php?bookid=$value\"><div style=\"height:100%;width:100%\">Remove</div></a></td>";
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
<body>
	<?php echo array2Html($arr);?>

	<a href="user.php" title="return">Return to Homepage</a><br>
</body>
<html>



