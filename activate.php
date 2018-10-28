<?php 
if(isset($_REQUEST['aid']))
{
	$id=$_REQUEST['aid'];
	$con=mysqli_connect("localhost","root","","7am");
	mysqli_query($con,"update register set 
	status='Active' where id=$id");
	if(mysqli_affected_rows($con)==1)
	{
		echo "<p>Account activated 
		Successfully</p>";
	}
	else
	{
		echo "<p>Your Account is Already 
		Activated</p>";
	}
}
else
{
	exit("Sorry! Wrong Window");
}
?>