<?php
session_start();

if ( $_SESSION[ "sidx" ] == "" || $_SESSION[ "sidx" ] == NULL ) {
	header( 'Location:studentlogin' );
}

$userid = $_SESSION[ "sidx" ];
$userfname = $_SESSION[ "fname" ];
$userlname = $_SESSION[ "lname" ];
?>
<?php include('studenthead.php'); ?>



<div class="container">
	<div class="row">
		<div class="col-md-5">

			<h3> Welcome <a href="welcomestudent"><?php echo "<span style='color:red'>".$userfname." ".$userlname."</span>";?></a></h3>
			<?php
			include( 'database.php' );
			$varid = $_REQUEST[ 'myds' ];
			//selecting data from student table
			$sql = "select * from  login where Email_Id='$varid'";
			$result = mysql_query( $sql );
			//loop below will print details of a particular student
			while ( $row = mysql_fetch_array( $result ) ) {
				?>
			<fieldset>
				<legend>My Details</legend>
				<form action="" method="POST" name="update">
					<table class="table table-hover">

						<tr>
							<td><strong>Enrolment number : </strong>
							</td>

						</tr>
						<tr>
							<td><strong>First Name :</strong> </td>
							<td>
								<?php echo $row['FirstName']; ?>
							</td>
						</tr>
						<tr>
							<td><strong>Last Name :</strong> </td>
							<td>
								<?php echo $row['LastName']; ?>
							</td>
						</tr>
						<tr>
							<td><strong>Father Name :</strong> </td>
							<td>
								<?PHP echo $row['FaName'];?>
							</td>
						</tr>
						<tr>
							<td><strong>Address : </strong>
							</td>
							<td>
								<?PHP echo $row['Address'];?> </td>
						</tr>
						<tr>
							<td><strong>Gender :</strong>
							</td>
							<td>
								<?PHP echo $row['Gender'];?>
							</td>
						</tr>
						<tr>
							<td><strong>Course : </strong>
							</td>
							<td>
								<?PHP echo $row['CourseId'];?>
							</td>
						</tr>
						<tr>
							<td><strong>D.O.B. : </strong> </td>
							<td>
								<?PHP echo $row['DOB'];?>
							</td>
						</tr>
						<tr>
							<td><strong>Phone Number :</strong>
							</td>
							<td>
								<?PHP echo $row['PhNo'];?> </td>
						</tr>
						<tr>
							<td><strong>Email : </strong>
							</td>
							<td>
								<?PHP echo $row['Email_Id'];?>
							</td>
						</tr>
						<tr>
							<td><strong>Password :</strong> </td>
							<td>
								<?PHP echo $row['password'];?>
							</td>
						</tr>

					</table>
				</form>
			</fieldset>
			<?php
			}
			?>
		</div>
	</div>
	<?php include('allfoot.php'); ?>