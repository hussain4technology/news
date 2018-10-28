<?php 
include("header.php");
include("connect.php");
?>

    

    <!-- Page Content -->
    <div class="container">
	 <h1 class="my-4 text-center text-primary">Latest News</h1>
	 
	 <div class="row">
		<?php 
		$result=mysqli_query($con,"select *from news order by id DESC");
		if(mysqli_num_rows($result)>0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				?>
					<div class="col-lg-4 mb-4">
					  <div class="card h-100">
						<h4 class="card-header"><?php echo substr($row['title'],0,40)?>...</h4>
						<div class="card-body">
						  <p class="card-text"><?php echo substr($row['description'],0,150)?>...</p>
						  <img class="" height="150" width="310" src="articles/<?php echo $row['filename']?>">
						</div>
						<div class="card-footer">
						  <a href="news.php?nid=<?php echo $row['id'] ?>" class="btn btn-primary">Learn More</a>
						  <span><b>Category: </b><?php echo $row['category']?></span>
						</div>
					  </div>
					</div>
				<?php
			}
		}
		else
		{
			echo "<div class='well alert alert-warning'><h1>Sorry! NO Articles Found</h1></div>";
		}
		?>
     </div>

     

     
      
      <!-- /.row -->

      <!-- Features Section -->
     
      <hr>

      <!-- Call to Action Section -->
      <div class="row mb-4">
        <div class="col-md-8">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
        </div>
        <div class="col-md-4">
          <a class="btn btn-lg btn-secondary btn-block" href="#">Call to Action</a>
        </div>
      </div>

    </div>
    <!-- /.container -->

   <?php 
include("footer.php");
?>
