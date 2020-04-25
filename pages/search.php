<html><body>

<form action="" method="post">
Search:<input type="text" name="search-text"><br>
<input type="submit" name="search-book" value="Search">
</form>

</body>
</html>
<?php
require_once("../utils/Book.php");

session_start();

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
                $out .= "<td><a href=\"buy.php?bookid=$value\"><div style=\"height:100%;width:100%\">Buy</div></a></td>";
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

if(!empty($_POST["search-book"])) {
	
	$search = $_POST['search-text'];

	$res = searchBooks($search);

	if ($res == 0){
		echo "no book found";
	} else {
		//echo $res['title'];
		echo array2html($res);
	}

}
?>
