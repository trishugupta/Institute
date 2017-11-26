<?php

$dbHost = 'localhost:3306';
$dbUser = 'root';
$dbPass = '';
$dbName = "login";
$sql = '';


//$EmailId = $_POST["aid"];
//password = $_POST["apass"];

$conn = mysql_connect($dbHost,$dbUser,$dbPass);

If(!$conn){
	die('Connection failure');
}
?>