<?php
session_start();
?>

<?php
$x = $_POST[ "sid" ];
$y = $_POST[ "pass" ];

include( "database.php" );
//searching login id and password entered in $x & $y
$sql = "select * from login where Email_Id ='" . $x . "' and password='" . $y . "'";
if( !empty($x) and !empty($y))
	{
		mysql_select_db($dbName);
		$result = mysql_query($sql);
		while($row = mysql_fetch_assoc($result)){
			
			if($row['password'] == $y){
				$_SESSION["IsAuthenticated"] = "Yes";
				$_SESSION[ "fname" ] = $row['FirstName'];
				$_SESSION[ "lname" ] = $row['LastName'];
				$_SESSION[ "regid" ] = $row['RegID'];
				$_SESSION["sidx"] = $row['Email_Id'];
				$_SESSION["SemId"] = $row['SemId'];
				$_SESSION["courseid"]= $row['CourseId'];
				header("Location: ./welcomestudent.php"); /* Redirect browser */
				exit();
			}
		}
		echo "<h3><span style='color:red; '>Invalid Student ID & Password. Page Will redirect to Login Page after 2 seconds </span></h3>";
	header( "refresh:3;url=studentlogin.php" );
	}
 else {
	//error message if SQL query fails
	echo "<h3><span style='color:red; '>Invalid Student ID & Password. Page Will redirect to Login Page after 2 seconds </span></h3>";
	header( "refresh:3;url=studentlogin.php" );
}
//close the connection
mysql_close($conn);

?>