<?
session_start();
require_once("DBConn.php");
$email = $_POST[''];
$pwd = $_POST[''];
$sql = mysqli_query($conn,"select sid,name,email,pwd,class from student where email='".$email."' and pwd='".$pwd."'") or die(mysql_error());
$res=mysqli_num_rows($sql);
$message="Wrong Email or Password";
if($res>0)
	{
        $row=mysqli_fetch_assoc($sql);
		$_SESSION['sid']=$row['sid'];
        $_SESSION['name']=$row['name'];
		echo $_SESSION['sid']."<br>";
		echo $_SESSION['name']."<br>";
		if(isset($_SESSION['REQUEST']) && $_SESSION['REQUEST']===TRUE)
		{
			echo "HI";
			header("location:studenthome.php");
		}
		else{
			header("location:index.php");
		}
	}
	else{
		echo "<script type='text/javascript'>alert('$message');window.location='index.php'</script>";
	}
?>