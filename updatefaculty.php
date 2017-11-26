<?php
session_start();

if($_SESSION["umail"]=="" || $_SESSION["umail"]==NULL)
{
header('Location:AdminLogin.php');
}

$userid = $_SESSION["umail"];
?><?php include('adminhead.php'); ?>
	<div class="container">
     <div class="row">
            <div class="col-md-12">
				<h3 class="page-header">Welcome <a href="welcomeadmin">Admin</a> </h3>
				<?php
				include("database.php");
				$new2=$_GET['fid'];
				
     			$sql="select * from  flogin where Faculty_Id=$new2";
				$result=mysql_query($sql);
				
				while($row=mysql_fetch_array($result))
				{ 
				?>
				<form action="" method="POST" name="update">
				<div class="form-group">
				Faculty ID : <?php echo $row['Faculty_Id']; ?></div>
				<div class="form-group">
				Faculty Name : <input type="text" name="fname" value="<?php echo $row['FName']; ?>"></div>
				<div class="form-group">
				Father Name : <input type="text" name="faname" value="<?PHP echo $row['FaName'];?>"><br></div>
				<div class="form-group">
				Address : <input type="text" name="addrs" rows="5" cols="40" value="<?PHP echo $row['Address'];?>"><br></div>
				<div class="form-group">
				Gender : <input type="text" name="gender" value="<?PHP echo $row['Gender'];?>"><br></div>
				<div class="form-group">
				Phone Number : <input type="tel" name="phno" value="<?PHP echo $row['PhNo'];?>" maxlength="10"><br></div>
				<div class="form-group">
				Joining Date : <input type="date" name="jdate" value="<?PHP echo $row['JDate'];?>" readonly> <br></div>
				<div class="form-group">
				City : <input type="text" name="city" value="<?PHP echo $row['City'];?>" ><br></div>
				<div class="form-group">
				Password : <input type="text" name="pass" value="<?PHP echo $row['password'];?>" maxlength="10"><br></div><br>
				<div class="form-group">
				<input type="submit" value="Update!" name="update" class="btn btn-primary"></div>
				
				</form>
				<?php
				}
				?>
           
          <?php
		if(isset($_POST['update']))		
			{
				$tempfname=$_POST['fname'];				
				$tempfaname=$_POST['faname'];
				$tempaddrs=$_POST['addrs'];					
				$tempgender=$_POST['gender'];
				$tempphno=$_POST['phno'];
				$tempcity=$_POST['city'];
				$temppass=$_POST['pass'];
				//below SQL query will update the existing faculty 
				$sql="UPDATE `flogin` SET FName='$tempfname',FaName='$tempfaname',Address='$tempaddrs', Gender='$tempgender', City='$tempcity',password='$temppass', PhNo=$tempphno WHERE Faculty_Id=$new2"; 
				
				if (mysql_query($sql)) {
					echo "<br>

					<br><br>
					<div class='alert alert-success fade in'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>Success!</strong> Faculty Details updated has been deleted.
					</div>";
					} else {
					// below statement will print error
					echo "<br><Strong>Faculty Details Updating Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysql_error($conn);
					}
				//for close connection
					mysql_close($conn);
						} 
				?>
            </div>
	</div>
<?php include('allfoot.php'); ?>