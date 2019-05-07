<?php
$dbHost = 'localhost';
$dbName = 'ImageFramework';
$dbUser = 'root';
//$dbPasswd = 'password01';
$dbPasswd = '';

require_once 'includes\Functions.inc';

// create connection
$conn = new mysqli($dbHost, $dbUser, $dbPasswd);

// check connection
if($conn->connect_error){
	die("Connection Failed: ".$conn->connect_error);
}

mysqli_select_db($conn, "imageframework");

?>