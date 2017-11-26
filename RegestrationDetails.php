<?php
session_start();

if ( $_SESSION[ "umail" ] == "" || $_SESSION[ "umail" ] == NULL ) {
	header( 'Location:AdminLogin.php' );
}
$userid = $_SESSION[ "umail" ];
?>
<?php include('adminhead.php'); ?>
<div class="container">
	<div class="row">
		<?php
		include( "database.php" );
		if ( isset( $_REQUEST[ 'deleteid' ] ) ) {

			$deleteid = $_GET[ 'deleteid' ];

			$sql = "UPDATE `login` SET Isactive=0 WHERE RegID = $deleteid";

			if ( mysql_query( $sql ) ) {
				echo "
				<br><br>
				<div class='alert alert-success fade in'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<strong>Success!</strong> Regestration Details Deleted.
				</div>
				";
			} else {
				//error message if SQL query fails
				echo "<br><Strong>Regestration Details Updation Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysql_error( $conn );
			}
			//close the connection
			mysql_close( $conn );
		}
		?>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Welcome <a href="welcomeadmin">Admin</a> </h3>
			<?php
			include( "database.php" );
			$sql = "select * from  login where Isactive=1";
			$result = mysql_query( $sql );
			echo "<h2 class='page-header'>Registration Details</h2>";
			echo "<table class='table table-striped' style='width:100%'>
			<tr>
			<th>Reg ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Father Name</th>
			<th>CourseId</th>
			<th>DOB</th>
			<th>Address</th>
			<th>Gender</th>
			<th>Phone Number</th>
			<th>Email</th>
			<th>Password</th>
			<th>Edit</th>
			<th>Delete</th>
			<th>Admission Confirm</th>

			<tr>";
			while ( $row = mysql_fetch_array( $result ) ) {
				?>

			<tr>
				<td>
					<?PHP echo $row['RegID'];?>
				</td>
				<td>
					<?PHP echo $row['FirstName'];?>
				</td>
				<td>
					<?PHP echo $row['LastName'];?>
				</td>
				<td>
					<?PHP echo $row['FaName'];?>
				</td>
				<td>
					<?PHP echo $row['CourseId'];?>
				</td>
				<td>
					<?PHP echo $row['DOB'];?>
				</td>
				<td>
					<?PHP echo $row['Address'];?>
				</td>
				<td>
					<?PHP echo $row['Gender'];?>
				</td>
				<td>
					<?PHP echo $row['PhNo'];?>
				</td>
				<td>
					<?PHP echo $row['Email_Id'];?>
				</td>
				<td>
					<?PHP echo $row['password'];?>
				</td>
				<td><a href="UpdateRegestrationDetails.php?regid=<?PHP echo $row['RegID'];?>"><input type="button" Value="Edit" class="btn btn-info btn-sm"></a>
				</td>
				<td><a href="RegestrationDetails.php?deleteid=<?PHP echo $row['RegID'];?>"><input type="button" Value="Delete" class="btn btn-info btn-sm"></a>
				</td>
				<td><a href="addConfirm.php?addnewRegId=<?php echo $row['RegID']; ?>"><input type="button" Value="Yes" class="btn btn-info btn-sm"></a>
				</td>
			</tr>
			<?php } ?>
			</table>
		</div>
	</div>

	<?php include('allfoot.php'); ?>