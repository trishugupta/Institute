<?php
session_start();

if ( $_SESSION[ "umail" ] == "" || $_SESSION[ "umail" ] == NULL ) {
	header( 'Location:AdminLogin.php' );
}

$userid = $_SESSION[ "umail" ];
?> <
<?php include('adminhead.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Welcome <a href="welcomeadmin">Admin</a> </h3>
			<h4 class="page-header">Edit any details if require</h4>
			<?php
			include( "database.php" );
			$new4 = $_GET[ 'addnewRegId' ];

			$sql = "select * from  login where RegID=$new4";
			$result = mysql_query( $sql );

			while ( $row = mysql_fetch_array( $result ) ) {
				?>
			<form action="" method="POST" name="updateform">
				<div class="form-group">
					Reg ID : <input type="text" name="regid" value="<?php echo $row['RegID']; ?>" readonly>
				</div>
				<div class="form-group">
					First Name : <input type="text" name="fname" value="<?php echo $row['FirstName']; ?>">
				</div>
				<div class="form-group">
					Last Name : <input type="text" name="lname" value="<?php echo $row['LastName']; ?>"><br>
				</div>
				<div class="form-group">
					Father Name : <input type="text" name="faname" value="<?PHP echo $row['FaName'];?>"><br>
				</div>
				<div class="form-group">
					Course : <input type="text" name="course" value="<?PHP echo $row['Course'];?>"><br>
				</div>
				<div class="form-group">
					D.O.B. : <input type="text" name="DOB" value="<?PHP echo $row['DOB'];?>"><br>
				</div>
				<div class="form-group">
					Addres : <input type="text" name="addrs" value="<?PHP echo $row['Address'];?>"><br>
				</div>
				<div class="form-group">
					Gender : <input type="text" name="gender" value="<?PHP echo $row['Gender'];?>"><br>
				</div>

				<div class="form-group">
					Phone Number : <input type="tel" name="phno" value="<?PHP echo $row['PhNo'];?>" maxlength="10"><br>
				</div>
				<div class="form-group">
					Email : <input type="text" name="email" value="<?PHP echo $row['Email_Id'];?>"><br>
				</div>
				<div class="form-group">
					Password : <input type="text" name="pass" value="<?PHP echo $row['password'];?>"><br>
				</div><br>
				<div class="form-group">
					<input type="submit" value="Admission Confirm!" name="addnew" class="btn btn-primary">

			</form>
			<?php
			}
			?>

			<?php
			if ( isset( $_POST[ 'addnew' ] ) ) {
				$tempregid = $_POST[ 'regid' ];
				$tempfname = $_POST[ 'fname' ];
				$templname = $_POST[ 'lname' ];
				$tempfaname = $_POST[ 'faname' ];
				$tempdob = $_POST[ 'DOB' ];
				$tempaddrs = $_POST[ 'addrs' ];
				$tempgender = $_POST[ 'gender' ];
				$tempcourse = $_POST[ 'course' ];
				$tempphno = $_POST[ 'phno' ];
				$tempeid = $_POST[ 'email' ];
				$temppass = $_POST[ 'pass' ];
				//insert data to student table in database
				$sql = "UPDATE `login` SET Isconfirm=1 WHERE RegID=$new4";
				if ( mysql_query( $sql ) ) {
					echo "
					<br><br>
					<div class='alert alert-success fade in'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>Success!</strong> Admission Confirm.
					</div>
					";
				} else {
					// print error mmessege if SQL query fail.
					echo "Error: " . $sql . "<br>" . mysql_error( $conn );
				}
				//use for close the conection
				mysql_close( $conn );

			}

			?>
			</div>
		</div>

		<?php include('allfoot.php'); ?>