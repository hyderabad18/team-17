<?php
session_start();
include 'dbconfig/config.php';
?>
<html>
<head>
<link rel="stylesheet"  href="style.css">
</head>
<body style="background-color:#7f8c8d">
<div id="main-wrapper">
<center><h2>Login Form</h2></center>
<center><img class="contact" src="avatar.png"/></center>
<form class="myform" action="" method="post">
<label><b>username</b></label><br>
<input name="username" type="text" class="inputvalues" placeholder="Type your user name"><br>
<label><b>Password</b></label><br>
<input name="password" type="password" class="inputvalues" placeholder="Type your password"><br>
<input name="submit_btn" type="submit" id="login_btn" value="login"/><br>
<a href="register.php"><input type="button" id="register_btn" value="Register"/></a>
</form>
</div>
<?php
if(isset($_POST['submit_btn']))
{
$username=$_POST['username'];
$password=$_POST['password'];
$abc=md5($password);
$query="select * from userinfotable WHERE username='$username' AND password='$abc'";
$query_run=mysqli_query($con,$query);
if(mysqli_num_rows($query_run)>0)
{   $row=mysqli_fetch_assoc($query_run);
	$_SESSION['username']=$row['username'];
	$_SESSION['imglnk']=$row['imglink'];
	if($row['type']=="admin")
	header('location:adminpage.php');
else
	header('location:userpage.php');
}
else
{
	echo '<script type="text/javascript">alert("invalid credintals ")</script>';
}

}
?>


</body>