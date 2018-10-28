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
			<small><?php echo ucfirst($row['username'])?></small>
		</h1>
			<div class="row">
				<?php 
				include("sidebar.php");
				?>
				<div class="col-lg-9 mb-4">
					<h2>View Articles</h2>
					<?php 
					if(isset($_COOKIE['success']))
					{
						echo "<p class='alert alert-danger'>".$_COOKIE['success']."</p>";
					}
					?>
					
					<?php 
					$result=mysqli_query($con,"select *from news where posted_by=$logid");
					if(mysqli_num_rows($result)>0)
					{
					?>
					<table class="table">
						<tr>
							<th>Id</th>
							<th>Title</th>
							<th>Category</th>
							<th>Desciption</th>
							<th>Filename</th>
							<th>Posted Date</th>
							<th>Action</th>
						</tr>
						<?php 
						while($rec=mysqli_fetch_assoc($result))
						{
							?>
								<tr>
									<td><?php echo $rec['id'];?></td>
									<td><?php echo $rec['title']; ?></td>
									<td><?php echo $rec['category']; ?></td>
									<td><?php echo substr($rec['description'],0,50); ?>...</td>
									<td><img src="articles/<?php echo $rec['filename']; ?>" height="80" width="80"></td>
									<td><?php echo $rec['date']; ?></td>
									<td>
										<a href="article_edit.php?key=<?php echo $rec['id'];?>">Edit</a> 
										&nbsp;<a href="article_delete.php?did=<?php echo $rec['id'];?>">Delete</a>
									</td>
								</tr>
							<?php
						}
						?>
						
					</table>
					<?php }
					else
					{
						echo "<div class='alert alert-info well'>Sorry! No Articles Found. Please <a href='article_add.php'>Add Article</a></div>";
					}
					?>
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