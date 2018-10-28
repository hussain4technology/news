<?php session_start();
if(isset($_SESSION['user_login']))
{
	include("connect.php");
	$logid=$_SESSION['user_login'];
	if(isset($_REQUEST['did']))
	{
		$aid=$_REQUEST['did'];
		mysqli_query($con,"DELETE FROM news WHERE id=$aid and posted_by=$logid");
		if(mysqli_affected_rows($con))
		{
			setcookie("success","Article Deleted Successfully",time()+2);
			header("Location:articles_view.php");
		}
	}
	else
	{
		header("Location:articles_view.php");
	}
}
else
{
	header("Location:login.php");
}
?>