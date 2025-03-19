<?php
session_start();
include 'connects.php';
if(isset($_POST['btnsubmit']))
{
$userid=test_input($_POST['userid']);
$upassword=test_input($_POST['upassword']);
$userpassword=hash('sha256', (get_magic_quotes_gpc() ? stripslashes($upassword) : $upassword));

	$conn=connectdb();

	$sql="Select * from registration where userid= '".$userid."' and upassword= '".$userpassword."'";
	$result=$conn->query($sql);
	if($result->num_rows>0)
	{
				$_SESSION['USERID']=$userid;
				$_SESSION['USERPASS']=$upassword;

				while($row=$result->fetch_assoc())
				{
				$_SESSION['UMOBILE']=$row['cmobile'];	
				}
			  
					header("location: userdashboard.php");
	}
	else
	{
		//header("Location:user_login.html");
		echo'<script type="text/javascript">alert("Incorrect Username or Password! Please check ID or Password!!!");window.history.back(); </script>';
	
	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
