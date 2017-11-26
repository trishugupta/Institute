<?php
session_start();
?>
<?php

$x = $_POST[ "aid" ];
$y = $_POST[ "apass" ];

include( "database.php" );
//searching login id and password entered in $x & $y
$sql = "select * from alogin where Admin_Id='" . $x . "' and password='" . $y . "'";

if( !empty($x) and !empty($y))
	{
		mysql_select_db($dbName);
		$result = mysql_query($sql);
		while($row = mysql_fetch_assoc($result)){
			
			if($row['password'] == $y){
				$_SESSION["IsAuthenticated"] = "Yes";
		$_SESSION[ "umail" ] = $row[ "Admin_Id" ];
				
				header("Location: ./welcomeadmin.php"); /* Redirect browser */
				exit();
			}
		}
	}
 else {
	//error message if SQL query fails
	echo "<h3><span style='color:red; '>Invalid Admin ID & Password. Page Will redirect to Login Page after 3 seconds </span></h3>";
	header( "refresh:3;url=Adminlogin.php" );

}
mysql_close($conn);
?>