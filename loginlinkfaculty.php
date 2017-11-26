<?php
session_start();
?>

<?php
$x = $_POST[ "fid" ];
$y = $_POST[ "pass" ];

include( "database.php" );
//searching login id and password entered in $x & $y
$sql = "select * from flogin where FEmail_Id ='".$x."' and password='".$y."'";
if( !empty($x) and !empty($y))
	{
		mysql_select_db($dbName);
		$result = mysql_query($sql);
		while($row = mysql_fetch_assoc($result)){
			
			if($row['password'] == $y){
				$_SESSION["IsAuthenticated"] = "Yes";
				$_SESSION[ "fidx" ] = $row[ "FEmail_Id" ];
				$_SESSION[ "fname" ] = $row[ "FName" ];
				
				header("Location: ./welcomefaculty.php"); /* Redirect browser */
				exit();
			}
		}
		echo "<h3><span style='color:red; '>Invalid Faculty ID & Password. Page Will redirect to Login Page after 3 seconds </span></h3>";
	header( "refresh:3;url=facultylogin.php" );
	}

else {
	//error message if SQL query fails
	echo "<h3><span style='color:red; '>Invalid Faculty ID & Password. Page Will redirect to Login Page after 3 seconds </span></h3>";
	header( "refresh:3;url=facultylogin.php" );
}
mysql_close($conn);

?>