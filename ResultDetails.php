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
			$deleteid = $_GET[ 'deleteid' ];
			//below query will delete result details form result table
			$sql = "DELETE FROM `result` WHERE RsID = $deleteid";
			if ( mysql_query($sql ) ) {
				echo "
<br><br>
<div class='alert alert-success fade in'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Success!</strong> Result details deleted.
</div>
";
			} else {
				//error message if SQL query fails
				echo "<br><Strong>Result Details Deletion Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysql_error();
			}
		}

		mysql_close();
		?>
	</div>
	<div class="row">
		<div class="col-md-8">
			<h3> Welcome Faculty : <a href="welcomefaculty.php" ><span style="color:#FF0004"> <?php echo $fname; ?></span></a> </h3>

			<?php 

include('database.php');

echo "<h2 class='page-header'>Result Details</h2>";

$sql="SELECT * FROM result";
$rs=mysql_query($sql);

if ( isset( $_GET[ 'submit' ] ) ) {
	$selected_sem = $_GET['Semester'];
	$selected_course = $_GET['Course'];
	if($selected_sem != 0 && $selected_course != 0){
		$sql="SELECT * FROM result where RegID in (Select RegID from login where CourseId = ".$selected_course.") and SemId = ".$selected_sem."";
	}
	else if($selected_sem != 0 && $selected_course == 0){
		$sql="SELECT * FROM result where SemId = ".$selected_sem."";
	}
	else if($selected_sem == 0 && $selected_course != 0){
		$sql="SELECT * FROM result where RegID in (Select RegID from login where CourseId = ".$selected_course.")";
	}
	else{
	$sql="SELECT * FROM result";
	}
	$rs=mysql_query($sql);
	?>
<form class='form-inline'>
<div class='form-group'>
  <label for='sem'>Select Semester:</label>
  <select class='form-control' name='Semester' id='sem'>
    <option value='0' <?php if($selected_sem == "0"){ print "selected='selected'"; } ?>>All Semesters</option>
    <option value='1' <?php if($selected_sem == "1"){ print "selected='selected'"; } ?>>1</option>
    <option value='2' <?php if($selected_sem == "2"){ print "selected='selected'"; } ?>>2</option>
    <option value='3' <?php if($selected_sem == "3"){ print "selected='selected'"; } ?>>3</option>
    <option value='4' <?php if($selected_sem == "4"){ print "selected='selected'"; } ?>>4</option>
	<option value='5' <?php if($selected_sem == "5"){ print "selected='selected'"; } ?>>5</option>
    <option value='6' <?php if($selected_sem == "6"){ print "selected='selected'"; } ?>>6</option>
    <option value='7' <?php if($selected_sem == "7"){ print "selected='selected'"; } ?>>7</option>
    <option value='8' <?php if($selected_sem == "8"){ print "selected='selected'"; } ?>>8</option>
  </select>
  </div>
  <div class='form-group'>
<label for='dept'>Select Branch:</label>
  <select class='form-control' id='dept' name='Course'>
    <option value='0' <?php if($selected_course == "0"){ print "selected='selected'"; } ?>>All Branches </option>
    <option value='1' <?php if($selected_course == "1"){ print "selected='selected'"; } ?>>CSE</option>
	<option value='2' <?php if($selected_course == "2"){ print "selected='selected'"; } ?>>ECE</option>
    <option value='3' <?php if($selected_course == "3"){ print "selected='selected'"; } ?>>EEE</option>
  </select>
</div>
<div class='form-group' style='padding-left:5px;'>
<button type='submit' name='submit' class='btn btn-primary'  >Filter Students</button>
</div>
</form></br>
<table class='table table-striped' style='width:100%'>
<tr>
<th>Registration ID</th>
<th>Semester No</th>
<th>Subjects</th>
<th>Marks</th>
<th>Edit</th>
<th>Delete</th>		
</tr>
<?php
while($row=mysql_fetch_array($rs))
{
?>
			<tr>
				<td>
					<?PHP echo $row['RegID'];?>
				</td>
				<td>
					<?PHP echo $row['SemId'];?>
				</td>
				<td>
					<?PHP echo $row['SubCode'];?>
				</td>
				<td>
					<?PHP echo $row['Marks'];?>
				</td>
				<td><a href="UpdateResultDetails.php?editid=<?php echo $row['RsID']; ?>"><input type="button" Value="Edit" class="btn btn-info btn-sm"></a>
				</td>
				<td><a href="ResultDetails.php?deleteid=<?php echo $row['RsID']; ?>"><input type="button" Value="Delete" class="btn btn-info btn-sm"></a>
				</td>
			</tr>

			<?php
			}
			?>
			</table>
			<?php
}
else {
?>
<form class='form-inline'>
<div class='form-group'>
  <label for='sem'>Select Semester:</label>
  <select class='form-control' name='Semester' id='sem'>
    <option value='0'>All Semesters</option>
    <option value='1'>1</option>
    <option value='2'>2</option>
    <option value='3'>3</option>
    <option value='4'>4</option>
	<option value='5'>5</option>
    <option value='6'>6</option>
    <option value='7'>7</option>
    <option value='8'>8</option>
  </select>
  </div>
  <div class='form-group'>
<label for='dept'>Select Branch:</label>
  <select class='form-control' id='dept' name='Course'>
    <option value='0'>All Branches </option>
	<option value='2'>ECE</option>
    <option value='1'>CSE</option>
    <option value='3'>EEE</option>
  </select>
</div>
<div class='form-group' style='padding-left:5px;'>
<button type='submit' name='submit' class='btn btn-primary'  >Filter Students</button>
</div>
</form></br>
<table class='table table-striped' style='width:100%'>
<tr>
<th>Registration ID</th>
<th>Semester No</th>
<th>Subjects</th>
<th>Marks</th>
<th>Edit</th>
<th>Delete</th>		
</tr>
<?php
while($row=mysql_fetch_array($rs))
{
?>
			<tr>
				<td>
					<?PHP echo $row['RegID'];?>
				</td>
				<td>
					<?PHP echo $row['SemId'];?>
				</td>
				<td>
					<?PHP echo $row['SubCode'];?>
				</td>
				<td>
					<?PHP echo $row['Marks'];?>
				</td>
				<td><a href="UpdateResultDetails.php?editid=<?php echo $row['RsID']; ?>"><input type="button" Value="Edit" class="btn btn-info btn-sm"></a>
				</td>
				<td><a href="ResultDetails.php?deleteid=<?php echo $row['RsID']; ?>"><input type="button" Value="Delete" class="btn btn-info btn-sm"></a>
				</td>
			</tr>

			<?php
			}
			?>
			</table>
<?php
			}
			?>
		</div>
	</div>

	<?php include('allfoot.php');  ?>