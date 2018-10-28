<?php session_start();
include("header.php");
?>

		<div class="container">
			
			<h1>Login Here</h1>
			
			<?php 
			if(isset($_POST['login']))
			{
				$email=$_POST['email'];
				$pwd=md5($_POST['pass']);
				//COnnect to DB
				include("connect.php");
				
				$result=mysqli_query($con,
				"select id,email,password,status,account_status 
				from register where email='$email'");
				if(mysqli_num_rows($result)==1)
				{
					$row=mysqli_fetch_assoc($result);
					if($row['account_status']=="Active")
					{
						if($row['password']==$pwd)
						{
							if($row['status']=="Active")
							{
								//redirect to Home Page
								$_SESSION['user_login']=$row['id'];
								header("Location:home.php");
							}
							else
							{
								echo "<p>PLease Activate your 
								account</p>";
							}
						}
						else
						{
							echo "<p class='text-center alert alert-danger'>Password not matched 
							for the Email</p>";
						}
					}
					else
					{
						echo "<p class='alert alert-warning'>Account is deactivated.please contact admin</p>";
					}
				}
				else
				{
					echo "<p class='text-center alert alert-danger'>Sorry! Email Does not
					Exists</p>";
				}
				
			}
			?>
			
			
			<form method="POST" action="" 
			onsubmit="return validate()">
				<table class="table">
				
				<tr>
					<td>Email*</td>
					<td>
						<input type="text" name="email"
						id="email" class="form-control" onblur="checkTextBox(this)">
						<span class="text-danger" id="email_error"></span>
					</td>
				</tr>
				<tr>
					<td>Password*</td>
					<td>
						<input type="password" name="pass"
						id="pass" class="form-control" onblur="checkTextBox(this)">
						<span class="text-danger" id="pass_error"></span>
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input  class="btn btn-primary" type="submit"  name="login" 
					value="Login">
					<a href="forgot.php">Forgot Password?</a> &nbsp;| &nbsp;
					<a href="register.php">Create an Account?</a>
					</td>
				</tr>
			</table>
			</form>
		</div>
		<script>
			function validate()
			{
				if(document.getElementById("email").value=="")
				{
					//alert("Enter Username");
					document.getElementById("email").focus();
					document.getElementById("email_error")
					.innerHTML="Email field is required";
					return false;
				}else
				{
					var email=document.getElementById("email").value;
					var filter=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,4})+$/ ;
					if(!filter.test(email))
					{
						document.getElementById("email").focus();
						document.getElementById("email_error")
						.innerHTML="Please Enter Valid Email";
						return false;
					}
				}
				if(document.getElementById("pass").value=="")
				{
					document.getElementById("pass").focus();
					document.getElementById("pass_error").innerHTML="Please Enter Password";
					return false;
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
	?>