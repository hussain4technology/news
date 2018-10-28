<?php session_start();
if(isset($_SESSION['user_login']))
{	include("connect.php");
	$logid=$_SESSION['user_login'];
	$result=mysqli_query($con,"select *from register where id=$logid");
	$row=mysqli_fetch_assoc($result);
	//get the data form URL
	if(isset($_REQUEST['key']))
	{
		$aid=$_REQUEST['key'];
		$res=mysqli_query($con,"select *from news where id=$aid and posted_by=$logid");
	}
	else
	{
		header("Location:articles_view.php");
	}
	
	
	include("header.php");
	?>
		<div class="container">
			<h1 class="mt-4 mb-3">Welcome to
			<small><?php echo ucfirst($row['username'])?></small></h1>
			<div class="row">
				<?php 
				include("sidebar.php");
				?>
				<div class="col-lg-9 mb-4">
					<h2>Edit Article</h2>
					<?php 
					if(isset($_COOKIE['success']))
					{
						echo "<div class='alert alert-success'>".$_COOKIE['success']."</div>";
					}
					
					if(mysqli_num_rows($res)>0)
					{
						$data=mysqli_fetch_assoc($res);
						
						
						if(isset($_POST['update']))
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
								$filename=$data['filename'];
							}
							mysqli_query($con,"update news set 
							title='$title',
							description='$desc',category='$cat',ip='$ip',
							filename='$filename' where 
							id=$aid and posted_by=$logid");
							echo mysqli_error($con);
							if(mysqli_affected_rows($con)>0)
							{
								setcookie("success","Article Edited Successfully",time()+2);
								?>
									<script>
									window.location="article_edit.php?key=<?php echo $aid;?>"
									</script>
								<?php
							}
						}
						
					?>
					<form onsubmit="return validation()" action="" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label>News Title</label>
							<input value="<?php echo $data['title']?>" id="ntitle" type="text" name="ntitle" class="form-control">
							<span id="ntitle_error" class="text-danger"></span>
						</div>
						
						<div class="form-group">
							<label>Select News Category</label>
							<select id="ncat" name="ncat" class="form-control">
								<option value="">--Category--</option>
								<option <?php if($data['category']=="Politics") echo "selected"?> value="Politics">Politics</option>
								<option <?php if($data['category']=="Sports") echo "selected"?> value="Sports">Sports</option>
								<option <?php if($data['category']=="Movies") echo "selected"?> value="Movies">Movies</option>
							</select>
							<span id="ncat_error" class="text-danger"></span>
						</div>
						
						<div class="form-group">
							<label>Description</label>
							<textarea name="ndesc" class="form-control"><?php echo $data['description']?></textarea>
						</div>
						<div class="form-group">
							<label>Upload Image</label>
							<input type="file" name="image" class="form-control">
							<?php if($data['filename']!=""){
								?>
									<img src="articles/<?php echo $data['filename']?>" height=50 width=50>
								<?php
							}?>
						</div>
						<div class="form-group">
							
							<input type="submit" name="update" class="btn btn-primary" value="Update Article">
						</div>
						
					</form>
					<?php }
					else
					{
						echo "<div class='alert alert-info'>Sorry! This article is Not Found</div>";
					}?>
				</div>
			</div>
		</div>
	<?php
	include("footer.php");
}
else
{
	
}
?>