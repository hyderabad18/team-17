<?php
  session_start();
?>
<!DOCTYPE html>

<html>
<head>
<title>Home page</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color:#1abc9c">
<div id="main-wrapper">
<center><h2>Home page</h2>
<h3>Welcome User</h3>
<img src="avatar.png" class="avatar"/>
</center>

<form class="myform" action="home.php" method="post">

<input name="logout" type="submit" id="logout_btn" value="Log out"/><br>
</form>

<?php
if(isset($_POST['logout']))
{
  session_destroy();
  header('location:indexx.php');
}
  ?>
</div>
</body>
</html>

