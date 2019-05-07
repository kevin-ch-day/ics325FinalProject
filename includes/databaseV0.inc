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

$sql = "create database if not exists {$dbName}";
if(!$conn->query($sql)){
	die("Error creating database: ".$conn->error);
}

mysqli_select_db($conn, $dbName) or die(mysql_error());

$sql = "SHOW TABLES FROM {$dbName}";
if(!$conn->query($sql)) {
	setupDatabase();
}

setupDatabase();
?>