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
	</div>
	<div class="row">
		<div class="col-md-8">
			<h3> Welcome Faculty : <a href="welcomefaculty.php" ><span style="color:#FF0004"> <?php echo $fname; ?></span></a> </h3>
			<?php 
			
include('database.php');

echo "<h2 class='page-header'>Take Attendance</h2>";

	?>
<form class='form-inline'>
<div class='form-group'>
  <label for='SubCode'>Subject Code:</label>
	<input type="text" class="form-control" id="SubCode" placeholder="Enter Subject Code" name="scode" />
  </div>
<div class='form-group' style='padding-left:5px;'>
<button type='submit' name='filter' class='btn btn-primary' >Fetch Students</button>
</div>
</form></br>
<form method="POST" action="" name="attend">
<table class='table table-striped' style='width:100%'>
<tr>
<th>Registration ID</th>
<th>Name</th>
<th>Present/Absent</th>
<th>Subject</th>
<th>Semester</th>
<th>Attended Lectures</th>		
</tr>
<?php
if ( isset( $_GET[ 'filter' ]) || isset($_GET['scode']) ) {
	$SubCode = $_GET['scode'];
	$sql="SELECT * FROM `subjects` s join `login` u on s.CourseId = u.CourseId and s.SemId = u.SemId where SubCode = '".$SubCode."'";
	$rs=mysql_query($sql);

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
					<label><input type="checkbox" name="present[]" value="<?PHP echo $row['RegID'];?>"> Present</label>
				</td>
				<td>
					<?PHP echo $row['SubjectName'];?>
				</td>
				<td>
				<?PHP echo $row['SemId'];?>
				</td>
				<td>
				<?PHP 
				$asql = "select * from attendance where SemId = ".$row['SemId']." and SubCode = '".$SubCode."' and RegID = ".$row['RegID'];
				$result = mysql_query($asql);
				if($rw = mysql_fetch_assoc($result)){
					echo $rw['Attendance'];
				}
				else
					echo 0;
				?>
				</td>
			</tr>

			<?php
}}	
			?>
			</table>
		<div class='form-group' style='padding-left:5px;'>
			<button type='submit' name='submit' class='btn btn-primary' >Submit Attendance</button>
		</div>
		</form>
		<?php 
		if(isset($_POST['submit']))
		{
			$sql = "SELECT * FROM `subjects` s join `login` u on s.CourseId = u.CourseId and s.SemId = u.SemId where SubCode = '".$SubCode."'";
			$rs = mysql_query($sql);
			$isql = "INSERT INTO `attendance`(SemId, SubCode, RegID, Attendance) VALUES ";
			if (isset($_POST['present'])) {
				$present = $_POST['present'];
				$count = 0;
				while ($row = mysql_fetch_array($rs)) {
					if (count($present) > $count && $row['RegID'] == $present[$count]) {
						$asql = "select * from attendance where SemId = ".$row['SemId']." and SubCode = '".$SubCode."' and RegID = ".$row['RegID'];
						$result = mysql_query($asql);
						$rw = mysql_fetch_assoc($result);
						if ($rw['Attendance'] == '') {
							if ($isql == "INSERT INTO `attendance`(SemId, SubCode, RegID, Attendance) VALUES ")
								$isql .= "(".$row['SemId'].",'".$SubCode."',".$row['RegID'].",1)";
							else
								$isql .= ",(".$row['SemId'].",'".$SubCode."',".$row['RegID'].",1)";
						} else {
							$usql = "UPDATE `attendance` set Attendance = ".($rw['Attendance'] + 1)." where SemId = ".$row['SemId']." and SubCode = '".$SubCode."' and RegID = ".$row['RegID'];
							mysql_query($usql);
						}
						$count += 1;
					}
				}
				$isql .= ";";
				mysql_query($isql);
				echo "<br><br>
					<div class='alert alert-success fade in'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>Success!</strong> Attendance updated.
					</div>
					";
			}
			echo "<meta http-equiv='refresh' content='2'>";
		}
		?>
		</div>
	</div>

	<?php include('allfoot.php');  ?>