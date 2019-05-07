<?php
require_once('includes\header.inc');

header('Refresh: 3; URL = index.php');

setupDatabase();

echo "<h1>Data base enviroment is now set up</h1>";

require_once('includes\footer.inc');
?>