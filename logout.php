<?php 
session_start();
if(isset($_SESSION['user_login']))
{
	session_destroy();
	header("Location:login.php");
}
else
{
	header("Location:login.php");
}
	

?>