<?php
session_start();

if ( $_SESSION[ "sidx" ] == "" || $_SESSION[ "sidx" ] == NULL ) {
	header( 'Location:studentlogin' );
}

$userid = $_SESSION[ "regid" ];
$userfname = $_SESSION[ "fname" ];
$userlname = $_SESSION[ "lname" ];
?>
<?php include('studenthead.php'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h3> Welcome <a href="welcomestudent.php" <?php echo "<span style='color:red'>".$userfname." ".$userlname."</span>";?> </a></h3>
			<?php 

include('database.php');
//below query will print the existing record of query
$sql="SELECT * FROM attendance a join subjects s on a.SubCode = s.SubCode WHERE RegID='".$userid."' and s.SemId = '".$_SESSION['SemId']."' and s.CourseId = '".$_SESSION['courseid']."'";
$rs=mysql_query($sql);
echo "<h2 class='page-header'>Attendance report</h2>";
echo "<h4>Semester - ".$_SESSION['SemId']."</h4>";
echo "<table class='table table-striped' style='width:100%'>
<tr>
<th>SubCode</th>
<th>Subject Name</th>
<th>Attended Lectures</th>						
</tr>";
while($row=mysql_fetch_assoc($rs))
{
?>
			<tr>
				<td>
					<?PHP echo $row['SubCode'];?>
				</td>
				<td>
					<?PHP echo $row['SubjectName'];?>
				</td>
				<td>
					<?PHP echo $row['Attendance'];?>
				</td>
			</tr>
			<?php
			}
			?>
			</table>
		</div>
		</div>
	</div>
	<?php include('allfoot.php'); ?>