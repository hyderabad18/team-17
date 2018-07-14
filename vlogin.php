<?
session_start();
require_once("DBConn.php");
$email = $_POST[''];
$pwd = $_POST[''];
$sql = mysqli_query($conn,"select vid,name,email,pwd,phoneno from volunteer where email='".$email."' and pwd='".$pwd."'") or die(mysql_error());
$res=mysqli_num_rows($sql);
$message="Wrong Email or Password";
if($res>0)
	{
        $row=mysqli_fetch_assoc($sql);
		$_SESSION['email']=$email;
		$_SESSION['vid']=$row['cid'];
        $_SESSION['name']=$row['name'];
		echo $_SESSION['email']."<br>";
		echo $_SESSION['vid']."<br>";
		echo $_SESSION['name']."<br>";
        //echo $_SESSION['phno'];
		//require_once("../os.php");
		if(isset($_SESSION['REQUEST']) && $_SESSION['REQUEST']===TRUE)
		{
			echo "HI";
			header("location:volunteerhome.php");
		}
		else{
			header("location:index.php");
		}
	}
	else{
		echo "<script type='text/javascript'>alert('$message');window.location='index.php'</script>";
	}
?>