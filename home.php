<?php 
session_start();
if(isset($_SESSION['user_login']))
{
	include("header.php");
?>
	
	<!-- Page Content -->
    <div class="container">
	<?php 
	include("connect.php");
	$logid=$_SESSION['user_login'];
	$result=mysqli_query($con,"select *from register where id=$logid");
	$row=mysqli_fetch_assoc($result);
	//print_r($row);
	?>
      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Welcome to
        <small><?php echo ucwords($row['username']);?></small>
      </h1>

      <ol class="breadcrumb"></ol>

      <!-- Content Row -->
      <div class="row">
        <!-- Sidebar Column -->
        <?php 
		include("sidebar.php");
		?>
        <!-- Content Column -->
        <div class="col-lg-9 mb-4">
          <h2>Profile Information</h2>
          <table class="table">
			<tr>
				<td>Name</td>
				<td><?php echo ucwords($row['username']);?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?php echo $row['email'];?></td>
			</tr>
			<tr>
				<td>Mobile</td>
				<td><?php echo $row['mobile'];?></td>
			</tr>
			<tr>
				<td>DOB</td>
				<td><?php echo $row['dob'];?></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><?php echo $row['address'];?></td>
			</tr>
			<tr>
				<td>City</td>
				<td><?php echo $row['city'];?></td>
			</tr>
			<tr>
				<td>State</td>
				<td><?php echo $row['state'];?></td>
			</tr>
			<tr>
				<td>Date of Reg</td>
				<td><?php echo $row['date_of_reg'];?></td>
			</tr>
		  </table>
        </div>
      </div>
      <!-- /.row -->

    </div>
	
<?php	
include("footer.php");
}
else
{
	header("Location:Login.php");
}

?>

