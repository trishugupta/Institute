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
		<div class="col-md-8">
			<h3> Welcome <a href="welcomestudent.php" <?php echo "<span style='color:red'>".$userfname." ".$userlname."</span>";?> </a></h3>
			<?php 

include('database.php');
$regid=$_SESSION[ "regid" ];
?>
<h2 class='page-header'>Result View</h2>

<?php 
//below query will print the existing record of result
$Sem = 1;
while($Sem <= 8){
	$sql="SELECT * FROM result WHERE RegId='$regid' and SemId='$Sem'";
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)){
	echo "<h3 class='page-header'>Semester - ".$Sem."</h3>
		<table class='table table-striped' style='width:100%'>
		<tr>
		<th>Subject</th>
		<th>Marks</th>
		<th>Grade</th>
		</tr>";
	while($row=mysql_fetch_array($rs))
	{
		echo "<tr><th>".$row['SubCode']."</th><td>".$row['Marks']."</td><td></td></tr>";
	}
	echo "<tr><th>Aggregate marks</th><td>Avg function</td><td>grade calc</td></tr>
		</table>
		</div>
			</div>";
	}
	$Sem = $Sem + 1;
}
?>

	
	<?php include('allfoot.php'); ?>