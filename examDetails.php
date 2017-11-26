<?php
session_start();

if ( $_SESSION[ "fidx" ] == "" || $_SESSION[ "fidx" ] == NULL ) {
	header( 'Location:facultylogin' );
}

$userid = $_SESSION[ "fidx" ];
$fname = $_SESSION[ "fname" ];
?>
<?php include('fhead.php');  ?>

<div class="container">
	<div class="row">


		<?php
		include( "database.php" );
		if ( isset( $_REQUEST[ 'deleteid' ] ) ) {

			//getting data from another page
			$deleteid = $_GET[ 'deleteid' ];
			$sql = "DELETE FROM `exam` WHERE ExId = $deleteid";
			if ( mysql_query( $sql ) ) {
				echo "
						<br><br>
						<div class='alert alert-success fade in'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Success!</strong> Exam details deleted.
						</div>
						";
			} else {
				//error message if SQL query fails
				echo "<br><Strong>Exam Details Updation Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
			}
		}
		//close the connection
		mysql_close( );
		?>
	</div>
	<div class="row">
		<div class="col-md-8">
			<h3> Welcome Faculty : <a href="welcomefaculty.php" ><span style="color:#FF0004"> <?php echo $fname; ?></span></a> </h3>

			<?php 
				
				include('database.php');
				$sql="SELECT RegID,FirstName,LastName,SemId,CourseName FROM login u join Courses c on u.CourseId = c.CourseId";
				$rs=mysql_query($sql);
				echo "<h2 class='page-header'>Exam Details</h2>";
				echo "<table class='table table-striped' style='width:100%'>
				<tr>
					<th>Reg ID</th>
					<th>Name</th>
					<th>Semester No</th>
					<th>Course</th>		
				</tr>";
				while($row=mysql_fetch_array($rs))
				{
				?>
			<tr>
				<td>
					<?PHP echo $row['RegID'];?>
				</td>
				<td>
					<?PHP echo $row['FirstName']." ".$row['LastName'];?>
				</td>
				<td>
					<?PHP echo $row['SemId'];?>
				</td>
				<td>
					<?PHP echo $row['CourseName'];?>
				</td>
				<td><a href="AddResult.php?Addid=<?php echo $row['RegID']; ?>"> <input type="button" Value="Add Result"  class="btn btn-info btn-sm"  data-toggle="modal" data-target="#myModal"></a>
				</td>
				<!--<td><a href="makeresult.php?makeid=<?php echo $row['ExId']; ?>"> <input type="button" Value="Make"  class="btn btn-info btn-sm"  data-toggle="modal" data-target="#myModal"></a>
				</td>-->
			</tr>
			<?php
			}
			?>
			</table>
		</div>
	</div>
	<?php include('allfoot.php');  ?>