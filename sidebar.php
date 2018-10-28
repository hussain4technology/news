<div class="col-lg-3 mb-4">
  <div class="list-group">
  <?php 
  if($row['avatar']!="")
  {
  ?>
	<a href="" class="text-center list-group-item"><img src="avatars/<?php echo $row['avatar']?>"  style="height:80px; width:80px; border-radius:50px; border:2px solid green; padding:3px;"></a>
	<?php 
  }
	?>
	<a href="home.php" class="list-group-item">Profile</a>
	<a href="edit.php" class="list-group-item">Edit</a>
	<a href="avatar.php" class="list-group-item">Upload Avatar</a>
	<a href="change_pwd.php" class="list-group-item">Change Password</a>
	
	<a href="article_add.php" class="text-danger list-group-item">Add Article</a>
	<a href="articles_view.php" class="text-danger list-group-item">View Articles</a>
	
	<a href="" class="list-group-item"></a>
	<a href="logout.php" class="list-group-item">Logout</a>
	<a href="delete_acc.php" class="list-group-item">Delete Account</a>
	
  </div>
</div>