<?php

/* When the session started, the program then checks whether the session
 * variable user is currently assigned a value. If so, a user has logged
 * in and the variable $loggedin is set to TRUE.
 */
session_start();

require_once 'includes\database.inc';
require_once 'includes\functions.inc';

global $image;
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Image Framework</title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="css/stylesheet.css" />

    <!-- for jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>

  <body>
    <header>
      <h1>Image Framework</h1>
    </header>

    <navigation>
      <ul>
        <li><a href="index.php">Home</a></li>
		<li><a href="login.php">Login</a></li>
		<li><a href="about.php">About</a></li>
      </ul>
    </navigation>


<?php	
$userstr = ' (Guest)';
	
if (isset($_SESSION['user'])){
	$user = $_SESSION['user'];
	$loggedin = TRUE;
	$userstr = " ($user)";
}else{
	$loggedin = FALSE;
}
?>