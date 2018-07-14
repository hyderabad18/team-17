<?php
include 'dbconfig/config.php';
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet"  href="style.css">

</head>

<body style="background-color:#00FFFF">
<div id="main-wrapper">
<center><h2>Register Form</h2></center>
<form class="myform" action="register.php" method="post" enctype="multipart/form-data">
<center><img  id="uploadpreview" class="contact" src="contact.png"/></center><br>


<br><br>
<label><b>full name</b></label><br>
<input type="text" name="fullname" class="inputvalues" placeholder="type your full name"><br><br>
<label><b>Email</b></label>
<input type="text" name="email" class="inputvalues" placeholder="enter your email">
<br><br>

<label><b>Password</b></label><br>
<input name="password" type="password" class="inputvalues" placeholder="Type your password"><br><br>
<label><b>Password</b></label><br>
<input name="cpassword" type="password" class="inputvalues" placeholder="confirm your password"><br><br>
<label><b>expertise</b></label>
<input type="radio" class="radio_btn" name="expert" value="physics" checked>Physics
<input type="radio" class="radio_btn" name="expert" value="chemistry">Chemistry
<br><br>
<label><b>qualification</b></label>
<select name="qualification">
<option value="mtech">M.Tech</option>
<option value="btech">B.Tech</option>
<option value="bsc">B.Sc</option>
</select>
<br><br>
<label><b>date</b></label>
<input type="date" name="date">
<input name="submit_btn" type="submit" id="signup_btn" value="sign up"/><br>
<a href="LR.php"><input type="button" id="back_btn" value="Back"/></a>


</form>
<?php
if(isset($_POST['submit_btn']))
{
	//echo '<script type="text/javascript">alert("signup button clicked")</script>';
	
	$fullname=$_POST['fullname'];
	$expert=$_POST['expert'];
	$email=$_POST['email'];
	$qualification=$POST['qualification'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	
		
	if($password==$cpassword)
	{

		$query="select * from userinfotable where username='$username'";
		$query_run=mysqli_query($con,$query);
		if(mysqli_num_rows($query_run)>0)
		{
			echo '<script type="text/javascript">alert("try another username")</script>';
		}
		else if(file_exists($target_file))
		{
			echo '<script type="text/javascript">alert("try another image")</script>';
		}
		else if($img_size>2097152)
		{
			echo '<script type="text/javascript">alert("image file greater than 2mb")</script>';
		}
			
		else
		{
			move_uploaded_file($img_tmp,$target_file);
			$query=" insert into userinfotable values('','$username','$fullname','$email','$expert','$qualification','$password','$')";
			$query_run=mysqli_query($con,$query);
			if($query_run)
			{
				echo '<script type="text/javascript">alert("user registerd ")</script>';
			}
			else{
				echo '<script type="text/javascript">alert("error ")</script>';
			}
			
		}
	}
	else{
		echo '<script type="text/javascript">alert("password and confirm password not match ")</script>';
		
	}
}
?>
</div>
</body>
</html>