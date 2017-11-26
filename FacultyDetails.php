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
			//delete faculty Query
			$sql = "DELETE FROM `flogin` WHERE Faculty_Id = $deleteid";

			if ( mysql_query( $sql ) ) {
				echo "

					<br><br>
					<div class='alert alert-success fade in'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>Success!</strong> Faculty Details has been deleted.
					</div>";
			} else {
				//error message if SQL query fails
				echo "<br><Strong>Faculty Details Updation Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysql_error( $conn );
			}
			//close the connection
		}
		else if ( isset( $_REQUEST[ 'activateid' ] ) ) {
			$activateid = $_GET[ 'activateid' ];
			//delete faculty Query
			$sql = "update `flogin` set IsActive = 1 WHERE Faculty_Id = ".$activateid;

			if ( mysql_query( $sql ) ) {
				echo "

					<br><br>
					<div class='alert alert-success fade in'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>Success!</strong> Faculty has been activated.
					</div>";
			} else {
				//error message if SQL query fails
				echo "<br><Strong>Faculty activation failed. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysql_error( $conn );
			}
			//close the connection
		}
		mysql_close( $conn );
		?>
	</div>


	<div class="row">
		<div class="col-md-8">
			<h3 class="page-header">Welcome <a href="welcomeadmin">Admin</a> </h3>
			<?php
			include( "database.php" );
			$sql = "select * from  flogin";
			$result = mysql_query( $sql );
			echo "<h3 class='page-header' >Facutly Details</h3>";
			echo "<table class='table table-striped' style='width:100%'>
				<tr>
					<th>ID</th>
					<th>First Name</th>
					<th>Father Name</th>
					<th>Addrs</th>
					<th>Gender</th>
					<th>Joining Date</th>
					<th>City</th>
					<th>Phone Number</th>
					<th>email</th>
					<th>Password</th>
					<th>Edit</th>
					<th>Delete</th>
				<tr>";
			while ( $row = mysql_fetch_array( $result ) ) {
				?>

			<tr>
				<td>
					<?PHP echo $row['Faculty_Id'];?>
				</td>
				<td>
					<?PHP echo $row['FName'];?>
				</td>
				<td>
					<?PHP echo $row['FaName'];?>
				</td>
				<td>
					<?PHP echo $row['Address'];?>
				</td>
				<td>
					<?PHP echo $row['Gender'];?>
				</td>
				<td>
					<?PHP echo $row['JDate'];?>
				</td>
				<td>
					<?PHP echo $row['City'];?>
				</td>
				<td>
					<?PHP echo $row['PhNo'];?>
				</td>
				<td>
				     <?PHP echo $row['FEmail_Id'];?>
				</td>
				
				<td>
					<?PHP echo $row['password'];?>
				</td>
				<td><a href="updatefaculty.php?fid=<?php echo $row['Faculty_Id']; ?>"><input type="button" Value="Edit" class="btn btn-info btn-sm"></a>
				</td>
				<td><a href="FacultyDetails.php?deleteid=<?php echo $row['Faculty_Id']; ?>"><input type="button" Value="Delete" class="btn btn-info btn-sm"></a>
				</td>
				<td><a href="FacultyDetails.php?activateid=<?php echo $row['Faculty_Id']; ?>"><input type="button" Value="Activate" class="btn btn-info btn-sm"></a>
				</td>
			</tr>
			<?php } ?>
			</table>
			<a href="addnewfaculty"><button type="button" value="Add New Faculty" class="btn btn-info btn-sm">Add New Faculty</button></a>

		</div>
	</div>

	<?php include('allfoot.php'); ?>