<?php
require_once('includes\header.inc');

echo "<div id=\"content\"><div id=\"main-menu\"><h1>Delete Link</h1>";

mysqli_select_db($conn, "imageframework");
$query = "DELETE FROM imagelinks where id=".$_GET['id'];
$result = aQuery($query);
if(!$result){
    echo "Error deleting links.<br/>";
}else{
    echo "The link was deleted.<br/>";
}

header('Refresh: 3; URL = admin.php');
echo "</div></div>";

require_once('includes\footer.inc');
?>
