<?php 
include("header.php");
include("connect.php");
if(isset($_REQUEST['nid']))
{
$nid=$_REQUEST['nid'];	
$result=mysqli_query($con,"select *from news where id=$nid");
if(mysqli_num_rows($result)>0)
{
	$row=mysqli_fetch_assoc($result);
?>
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<h1><?php echo $row['title']?></h1>
				<img width="750" height="300" src="articles/<?php echo $row['filename']?>">
				<p><?php echo $row['description']?></p>
				<p>Category: <?php echo $row['category']?></p>
			</div>
			<div class="col-md-3">
				<h3>Related Articles</h3>
				<?php 
				$res=mysqli_query($con,"select id,title from news where id!=$nid")
				?>
				<ul class="nav">
					<?php 
					while($rec=mysqli_fetch_assoc($res))
					{
						?>
							<li><a href="news.php?nid=<?php echo $rec['id']?>"><?php echo $rec['title']?></a></li>
						<?php
					}
					?>
				</ul>
			</div>
		</div>
	</div>
<?php 
}
else
{
	echo "<h1>No Article Found</h1>";
}
}
else
{
	header("Location:index.php");
}
include("footer.php");
?>