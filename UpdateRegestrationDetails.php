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
		<div class="col-md-12">
			<h3 class="page-header">Welcome <a href="welcomeadmin">Admin</a> </h3>
			<h4 class="page-header">Edit Registration Details</h4>
			
			<?php
			include( "database.php" );
			$new1 = $_GET[ 'regid' ];
			//below query will print existing record of regestration detalis
			$sql = "select * from  login where RegID=$new1 && Isactive=1";
			$result = mysql_query( $sql );
			
			while ( $row = mysql_fetch_array( $result ) ) {	
				?>
			<form action="" class="col-md-6" method="POST" name="update">
				<div class="form-group">
				<label for="fname">First Name :</label>
			    <input id="fname" class="form-control" type="text" name="fname" value="<?php echo $row['FirstName']; ?>">
				</div>
				<div class="form-group">
				<label for="lname">Last Name : </label>
				<input id="lname" class="form-control"type="text" name="lname" value="<?php echo $row['LastName']; ?>">
				</div>
				<div class="form-group">
				<label for="faname">Father's Name : </label>
				<input id="faname" class="form-control" type="text" name="faname" value="<?PHP echo $row['FaName'];?>">
				</div>
				<div class="form-group">
				<label for="dob">D.O.B. : </label>
				<input id="dob" class="form-control" type="text" name="DOB" value="<?PHP echo $row['DOB'];?>" placeholder="YYYY-MM-DD">
				</div>
				<div class="form-group">
				<label for="add">Address : </label>
				<input id="add" class="form-control" type="text" name="addrs" value="<?PHP echo $row['Address'];?>">
				</div>
				<div class="form-group">
				<label for="gender">Gender : </label>
				<input id="gender" class="form-control" type="text" name="g" value="<?PHP echo $row['Gender'];?>">
				</div>
				<div class="form-group">
				<label for="tel">Phone Number : </label>
				<input id="tel" class="form-control" type="tel" name="phno" value="<?PHP echo $row['PhNo'];?>" maxlength="10">
				</div>
				<div class="form-group">
				<label for='course'>Course : </label>
						<select class='form-control' id='course' name='course'">
							<option value='0' <?php if($row['CourseId'] == "0"){ print "selected='selected'"; } ?>>Select Course</option>
							<?php
							$sql = "select * from courses";
							$Crs = mysql_query( $sql );
							while($Crw = mysql_fetch_array($Crs)){
								echo "<option value='".$Crw['CourseId']."' ";
								if($row['CourseId'] == $Crw['CourseId']){ echo "selected='selected'"; }
								echo ">".$Crw['CourseName']."</option>";
							}
							?> 
							
						</select>
							<p class="help-block"></p>
							</div>
				<div class="form-group">
				<label for="sem">Semester : </label>
				<input id="sem" class="form-control" type="text" name="sem" value="<?PHP if($row['SemId']==0)echo "1";else echo $row['SemId'];?>" readonly>
				</div>
				<div class="form-group">
				<label for="email">Email : </label>
				<input id="email" class="form-control" type="text" name="email" value="<?PHP echo $row['Email_Id'];?>" readonly>
				</div>
				<div class="form-group">
				<label for="pass">Password : </label>
				<input id="pass" class="form-control" type="text" name="pass" value="<?PHP echo $row['password'];?>">
				</div><br>
				<div class="form-group">
					<input type="submit" value="Update!" name="update" class="btn btn-primary">

			</form>
			<?php
			}
			?>

			<?php
			if ( isset( $_POST[ 'update' ] ) ) {
				$tempfname = $_POST[ 'fname' ];
				$templname = $_POST[ 'lname' ];
				$tempfaname = $_POST[ 'faname' ];
				$tempaddrs = $_POST[ 'addrs' ];
				$tempgender = $_POST[ 'g' ];
				$tempphno = $_POST[ 'phno' ];
				$temppass = $_POST[ 'pass' ];
				$tempCourse = $_POST['course'];
				$tempSem = $_POST['sem'];
				//below query will update the regestration details 
				$sql = "UPDATE `login` SET Firstname='$tempfname', Lastname='$templname', FaName='$tempfaname',CourseId=".$tempCourse.",SemId = ".$tempSem.", Gender='$tempgender', Address='$tempaddrs', PhNo=$tempphno, password='$temppass' WHERE RegID=$new1";

				$ss = mysql_query( $sql );

				echo "<br><br>
<div class='alert alert-success fade in'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Success!</strong> Details has been updated.
</div>
";

			}
			?>
			</div>
		</div>
		<?php include('allfoot.php'); ?>