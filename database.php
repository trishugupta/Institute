<?php

$dbHost = 'localhost:3306';
$dbUser = 'root';
$dbPass = '';
$dbName = "login";
$sql = '';


//$EmailId = $_POST["sid"];
//$password = $_POST["pass"];

$conn = mysql_connect($dbHost,$dbUser,$dbPass);

If(!$conn){
	die('Connection failure');
}
mysql_select_db($dbName);
?>