<?php
require_once("DBConn.php");
$name = $_POST['name'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$mobile = $_POST['mobile'];
$subject = $_POST['subject'];

$sql = "INSERT INTO volunteer (name, email, pwd, phoneno, expertise) VALUES('" . $name . "','" . $email . "', '" . $pwd . "', '" . $mobile . "', '".$subject."')";
if($conn->query($sql) === TRUE){
	header("location:volunteerhome.php");
}
else{
	echo "failed";
	//echo "<script type='text/javascript'>alert('Sign Up Failed..Please Try again later');window.location='index.php'</script>";
}
?>