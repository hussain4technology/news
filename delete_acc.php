<?php session_start();
if(isset($_SESSION['user_login']))
{
	$logid=$_SESSION['user_login'];
	include("connect.php");
	include("header.php");
		if(isset($_REQUEST['did']))
		{
			mysqli_query($con,"update register set account_status='Delete' where id=$logid");
			if(mysqli_affected_rows($con))
			{
				header("Location:logout.php");
			}
		}
		
		?>
		
		
		
			<div class="container"> 
				<h4>Do you want to delete your account ?</h4>
				<a href="delete_acc.php?did=<?php echo $logid ?>" class='btn btn-primary'>Yes</a>
				<a href="home.php" class='btn btn-danger'>No</a>
			</div>
			<h1></h1>
		<?php
	include("footer.php");
}
else
{
	header("Location:login.php");
}
?>