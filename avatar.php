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
          <h2>Edit Profie</h2>
		  <?php 
		  if(isset($_POST['submit']))
		  {
			 if(is_uploaded_file($_FILES['image']['tmp_name']))
			 {
				 $filename=$_FILES['image']['name'];
				 $tmp=$_FILES['image']['tmp_name'];
				 $type=$_FILES['image']['type'];
				 
				 $types=array("image/jpg","image/jpeg",
				 "image/png","image/gif");
				 if(in_array($type,$types))
				 {
					 if(move_uploaded_file($tmp,"avatars/$filename"))
					 {
						 mysqli_query($con,"update register set avatar='$filename' where id=$logid");
						 if(mysqli_affected_rows($con))
						 {
							 setcookie("success","Avatar Uploaded Successfully",time()+2);
							 header("location:avatar.php");
						 }
					 }
				 }
				 else
				 {
					 echo "<p class='alert alert-danger'>Please Select valid Image</p>";
				 }
			 }
			 else{
				 echo "<p class='alert alert-warning'>Please select a file to Upload</p>";
			 }
		  }
		  
		  if(isset($_COOKIE['success']))
		  {
			  echo "<p class='alert alert-success'>".$_COOKIE['success']."<p>";
		  }
		  ?>
		  
		  <form action="" method="POST" enctype="multipart/form-data">
			<div class='form-group'>
				<label>Upload Avatar</label>
				<input type="file" name="image" class='form-control'>
			</div>
			<div class="form-group">
				<input type="submit" name="submit" value="Upload" class="btn btn-primary">
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