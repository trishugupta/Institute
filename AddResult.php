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
		<div class="col-md-8">

			<h3> Welcome Faculty : <a href="welcomefaculty.php" ><span style="color:#FF0004"> <?php echo $fname; ?></span></a> </h3>
<br/>

			<?php
			include( 'database.php' );
			$add = $_GET[ 'Addid' ];
			//selecting data form result table form database
			$sql="SELECT RegID,FirstName,LastName,SemId,u.CourseId,CourseName FROM login u join Courses c on u.CourseId = c.CourseId where RegID = ".$add;
			$rs = mysql_query( $sql );
			while ( $row = mysql_fetch_array( $rs ) ) {
				?>
			<fieldset>
			<legend>Student Details</legend>
				<form>
					<table class="table table-hover">

						<tr>
							<td><strong>Registration ID </strong>
							</td>
							<td>
								<?php $eno=$row['RegID']; echo $eno; ?>
							</td>

						</tr>
						<tr>
							<td><strong>Name :</strong> </td>
							<td>
								<?PHP echo $row['FirstName']." ".$row['LastName'];?>
							</td>
						</tr>
						<tr>
							<td><strong>Semester :</strong> </td>
							<td>
								<?php $SemId= $row['SemId']; echo $SemId; ?>
							</td>
						</tr>
						<tr>
							<td><strong>Course :</strong> </td>
							<td>
								<?php $CourseId= $row['CourseId'];
								$CourseName= $row['CourseName']; echo $CourseName; ?>
							</td>
						</tr>
						</table>
				</form>
			</fieldset>
			<?php } ?>
			<br/>
			<fieldset>
				<legend>Add Result for Subjects <span style="font-size:12px">(Subjects without <span style='color: #ff0000'>*</span> sign are electives)</span></legend>
				<form action="" method="POST" name="Addresult">
					<table class="table table-hover">
						<?php
						$sql="SELECT * FROM subjects where SemId = ".$SemId." and CourseId = ".$CourseId;
						$rs = mysql_query( $sql );
						while ( $row = mysql_fetch_array( $rs ) ) {
					?><tr>
							<td><strong><?php $ename= $row['SubjectName']; echo $ename;
							if(!$row['IsElective'])
								echo "<span style='color: #ff0000'> *</span>"; 
							?>
							</strong> </td>
							<td>
								<input type="text" class="form-control" name="<?php echo $row['SubCode']?>" value="">
							</td>
						</tr>
						<?php
						}
						?>
						<tr>
							<td><strong>Result</strong> </td>
							<td>
								<select class="form-control" name="marks" required>
									<option value="">---Select---</option>
									<option value="Pass">Pass</option>
									<option value="Fail">Fail</option>
									
								</select>

							</td>
						</tr>
						<td><button type="submit" name="make" class="btn btn-primary">Add</button>
						</td>
						<?php 

if(isset($_POST['make']))
{
	$sql = "INSERT INTO `result`(`RegID`,`SemId`, `SubCode`, `Marks`) VALUES ";
	foreach ($_POST as $key => $value){
		if($key != 'make' && $key != 'marks'){
			if($sql == "INSERT INTO `result`(`RegID`,`SemId`, `SubCode`, `Marks`) VALUES ")
			$sql .= "(".$eno.",".$SemId.",'".$key."',".$value.")";
		else
			$sql .= ",(".$eno.",".$SemId.",'".$key."',".$value.")";
		}
		// else{
			// $mark= $_POST['marks'];
		// }
}
$sql .= ";";

if (mysql_query( $sql) && $_POST['marks']=='Pass') {
	$sql = "UPDATE `login` set SemId =".($SemId + 1)." where RegID = ".$eno;
	echo $sql;
	mysql_query($sql);
echo "
<br><br>
<div class='alert alert-success fade in'>
<a href='ResultDetails.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Success!</strong> Result Updated.
</div>
";
echo "<meta http-equiv='refresh' content='2'>";
} else {
//error message if SQL query fails
echo "<br><Strong>Result Updation Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysql_error();

//close the connection
mysql_close();
}
}
?>
					</table>
				</form>
			</fieldset>
		</div>
	</div>
	<?php include('allfoot.php');  ?>