<?php 
session_start();
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
			<small><?php echo ucfirst($row['username'])?></small>
		</h1>
			<div class="row">
				<?php 
				include("sidebar.php");
				?>
				<div class="col-lg-9 mb-4">
					<?php 
					if(isset($_COOKIE['success']))
					{
						echo "<p class='alert alert-success'>".$_COOKIE['success']."</p>";
					}
					
					if(isset($_POST['add']))
					{
						$title=$_POST['ntitle'];
						$desc=$_POST['ndesc'];
						$cat=$_POST['ncat'];
						$ip=$_SERVER['REMOTE_ADDR'];
						if(is_uploaded_file($_FILES['image']['tmp_name']))
						{
							$filename=$_FILES['image']['name'];
							$type=$_FILES['image']['type'];
							$size=$_FILES['image']['size'];
							$path=$_FILES['image']['tmp_name'];
							
							$types=array(
								"image/jpg",
								"image/png",
								"image/gif",
								"image/jpeg",
								);
							if(in_array($type,$types))
							{
								$status=move_uploaded_file($path,
								"articles/$filename");
								if($status==1)
								{
									//echo "File Uploaded Successfully";
								}
								else
								{
									echo "sorry! Unale to Uplod. 
									Try Again";
								}
							}
							else
							{
								echo "Please Select a Valid Image";
							}
							
						}
						else
						{
							$filename="";
						}
						mysqli_query($con,"insert into 
						news(title,description,category,filename,
						ip,posted_by) values('$title','$desc',
						'$cat','$filename','$ip',$logid)");
						if(mysqli_affected_rows($con)==1)
						{
							setcookie("success","Article Added Successfully",time()+2);
							header("Location:article_add.php");
						}
						else
						{
							echo "<p class='alert alert-danger'>Sorry! Unable to Add Try Again</p>";
						}
					}
					?>
				
					<h2>Add Article</h2>
					<form onsubmit="return validation()" action="" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label>News Title</label>
							<input id="ntitle" type="text" name="ntitle" class="form-control">
							<span id="ntitle_error" class="text-danger"></span>
						</div>
						
						<div class="form-group">
							<label>Select News Category</label>
							<select id="ncat" name="ncat" class="form-control">
								<option value="">--Category--</option>
								<option value="Politics">Politics</option>
								<option value="Sports">Sports</option>
								<option value="Movies">Movies</option>
							</select>
							<span id="ncat_error" class="text-danger"></span>
						</div>
						
						<div class="form-group">
							<label>Description</label>
							<textarea name="ndesc" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label>Upload Image</label>
							<input type="file" name="image" class="form-control">
						</div>
						<div class="form-group">
							
							<input type="submit" name="add" class="btn btn-primary" value="Add Article">
						</div>
						
					</form>
				</div>
			</div>
		</div>
		<script>
			function validation()
			{
				if($("#ntitle").val()=="")
				{
					$("#ntitle").focus();
					$("#ntitle_error").html("This field is required");
					return false;
				}
				if($("#ncat").val()=="")
				{
					$("#ncat").focus();
					$("#ncat_error").html("This field is required");
					return false;
				}
				
			}
		</script>
	<?php
	include("footer.php");
	
}
else
{
	header("Location:login.php");
}

?>