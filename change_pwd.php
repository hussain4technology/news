<?php session_start();
if(isset($_SESSION['user_login']))
{
	include("connect.php");
	$logid=$_SESSION['user_login'];
	$result=mysqli_query($con,"select *from register where id=$logid");
	$row=mysqli_fetch_assoc($result);
	include("header.php");
	?>
	<div class="container">
		<h1 class="mt-4 mb-3">Welcome to
			<small>Ram</small>
		</h1>
	<div class="row">
		<?php 
			include("sidebar.php");
		?>
        <!-- Content Column -->
        <div class="col-lg-9 mb-4">
          <h2>Change Password</h2>
		  
		  <?php 
		  if(isset($_POST['update']))
		  {
			  $opwd=md5($_POST['opwd']);
			  $npwd=md5($_POST['npwd']);
			  $cnpwd=md5($_POST['cnpwd']);
			  if($npwd==$cnpwd)
			  {
				  if($opwd==$row['password'])
				  {
					  mysqli_query($con,"update register set password='$npwd' where id=$logid");
					  if(mysqli_affected_rows($con))
					  {
						  echo "<p class='alert alert-success'>Password updated successfully</p>";
					  }
						  
				  }
				  else
				  {
					  echo "<p class='alert alert-danger'>Old Password is Wrong</p>";
				  }
			  }
			  else
			  {
				  echo "<p class='alert alert-danger'>Passwords does not matched</p>";
			  }
			  
		  }
		  ?>
		  
		  <form method="POST" action="">
			
			<div class="form-group">
				<label>Enter Old Password</label>
				<input type="password" name="opwd" class="form-control">
			</div>
			
			<div class="form-group">
				<label>Enter New Password</label>
				<input type="password" name="npwd" class="form-control">
			</div>
			
			<div class="form-group">
				<label>Confirm New Password</label>
				<input type="password" name="cnpwd" class="form-control">
			</div>
			
			<div class="form-group">
				<input type="submit" name="update" class="btn btn-primary" value="Update">
			</div>
			
		  </form>
		</div>
	 </div>
	</div>
		
	<?php
	include("footer.php");
}
else
{
	header("Location:login.php");
}
?>