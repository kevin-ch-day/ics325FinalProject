<?php
require_once('includes\header.inc');
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);

   header('Refresh: 5; URL = index.php');
?>


<div id="content">
  <div id="main-menu">
    <h2>Logout</h2>
	<p>Going back to home page in 5 seconds</p>
  </div>
</div>

<?php
require_once('includes\footer.inc');
?>