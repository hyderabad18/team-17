<?php
require_once("../DBConn.php");
$name = $_POST['name'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$mobile = $_POST['mobile'];
$subject = $_POST['subject'];
$qual = $_POST['qual'];
$dob = $_POST['dob'];

$sql = "INSERT INTO volunteer (name, email, pwd, phone, expertise, dob, qualification) VALUES('" . $name . "','" . $email . "', '" . $pwd . "', '" . $mobile . "', '".$subject."', '".$dob."', '".$qual."')";
if($conn->query($sql) === TRUE){
	header("location:volunteerhome.php");
}
else{
	echo "<script type='text/javascript'>alert('Sign Up Failed..Please Try again later');window.location='index.php'</script>";
}
?>