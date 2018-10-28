<?php 
session_start();
if(isset($_SESSION['user_login']))
{
	include("header.php");
	include("connect.php");
	$logid=$_SESSION['user_login'];
	$result=mysqli_query($con,"select *from register where id=$logid");
	$row=mysqli_fetch_assoc($result);
	
	?>
		<div class="container">
			<h1 class="mt-4 mb-3">Welcome to
				<small>Ram</small>
			</h1>
			<div class="row">
        <!-- Sidebar Column -->
        <?php 
		include("sidebar.php");
		?>
        <!-- Content Column -->
        <div class="col-lg-9 mb-4">
          <h2>Edit Profie</h2>
		  
		  <?php 
		  if(isset($_COOKIE['success']))
		  {
			  echo "<p class='alert alert-success'>".$_COOKIE['success']."</p>";
		  }
		  
		  ?>
		  
		  
		  <?php 
		  if(isset($_POST['edit']))
		  {
			  $name=$_POST['uname'];
			  $mobile=$_POST['mobile'];
			  $city=$_POST['city'];
			  $address=$_POST['address'];
			  $state=$_POST['state'];
			  
			  //update the Data
			  mysqli_query($con,"update register set
			  username='$name',
			  mobile='$mobile',
			  city='$city',
			  address='$address',
			  state='$state' where id=$logid");
			  echo mysqli_error($con);
			if(mysqli_affected_rows($con))
			{
				setcookie("success","Profile Updated Successfully",time()+2);
				header("Location:edit.php");
			}
			else
			{
				echo "<P class='alert alert-warning'>Sorry! NO chnages MadeM</p>";
			}
			  
		  }
		  ?>
		  
		  
		  
		  <form method="POST" action="" onsubmit="return validate()">
				<div class="form-group">
					<label>Username</label>
					<input value="<?php echo $row['username']?>" class="form-control" type="text" name="uname" id="uname" onblur="checkTextBox(this)">
					<span class="text-danger" id="uname_error"></span>
				</div>
				<div class="form-group">
					<label>Mobile</label>
					<input value="<?php echo $row['mobile']?>" class="form-control" type="text" name="mobile" id="mobile" onblur="checkTextBox(this)">
					<span class="text-danger" id="mobile_error"></span>
				</div>
				<div class="form-group">
					<label>Address</label>
					<textarea class="form-control"  name="address" id="address"><?php echo $row['address']?></textarea>
				</div>
				<div class="form-group">
					<label>City</label>
					<input value="<?php echo $row['city']?>" class="form-control" type="text" name="city" id="city">
				</div>
				<div class="form-group">
					<label>State</label>
					<select id="state" name="state" class="form-control">
						<option value="">--Select State--</option>
						<option <?php if($row['state']=="Andhrapradesh") echo "selected" ?> value="Andhrapradesh">Andhrapradesh</option>
						<option <?php if($row['state']=="Telangana") echo "selected" ?> value="Telangana">Telangana</option>
						<option <?php if($row['state']=="Maharastra") echo "selected" ?>  value="Maharastra">Maharastra</option>
						<option <?php if($row['state']=="Uttarapradesh") echo "selected" ?> value="Uttarapradesh">Uttarapradesh</option>
						<option <?php if($row['state']=="Madhyapradesh") echo "selected" ?> value="Madhyapradesh">Madhyapradesh</option>
						<option <?php if($row['state']=="Goa") echo "selected" ?> value="Goa">Goa</option>
						<option <?php if($row['state']=="Tamilnadu") echo "selected" ?> value="Tamilnadu">Tamilnadu</option>
					</select>
				</div>
				<div class="form-group">
					<input class="btn btn-primary" type="submit" name="edit" value="Update">
				</div>
		
		</form>
        </div>
      </div>
		</div>
		<script>
			function validate()
			{
				if(document.getElementById("uname").value=="")
				{
					//alert("Enter Username");
					document.getElementById("uname").focus();
					document.getElementById("uname_error")
					.innerHTML="Username field is required";
					return false;
				}
				if(document.getElementById("mobile").value=="")
				{
					//alert("Enter Username");
					document.getElementById("mobile").focus();
					document.getElementById("mobile_error")
					.innerHTML="Mobile is required";
					return false;
				}
				else
				{
					var mobile=document.getElementById("mobile").value;
					if(mobile.length!=10)
					{
						document.getElementById("mobile").focus();
						document.getElementById("mobile_error")
						.innerHTML="Please enter 10 digit mobile";
						return false;
					}
					else if(isNaN(mobile))
					{
						document.getElementById("mobile").focus();
						document.getElementById("mobile_error")
						.innerHTML="Valid Mobile required";
						return false;
					}
				}
			}
			function checkTextBox(x)
			{
				if(x.value!="")
				{
					document.getElementById(x.id+"_error").innerHTML="";
				}
			}
		</script>
	<?php
	include("footer.php");
}
else
{
	header("Location:login.php");
}


?>