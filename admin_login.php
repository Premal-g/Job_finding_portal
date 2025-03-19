<?php
session_start();
include 'connects.php';
if(isset($_POST['btnsubmit']))
{
$aid=test_input($_POST['aid']);
$apassword=test_input($_POST['apassword']);
//$userpassword=hash('sha256', (get_magic_quotes_gpc() ? stripslashes($upassword) : $upassword));

	$conn=connectdb();

	$sql="Select * from admin_login where aid= '".$aid."' and apassword= '".$apassword."'";
	$result=$conn->query($sql);
	if($result->num_rows>0)
	{
				

				$_SESSION['AID']=$aid;
				$_SESSION['APASSWORD']=$apassword;
				
	echo '<script type="text/javascript"> window.location="admindashboard.php" </script>';
	}
	
	
	else
	{
		//header("Location:adminlogin.html");
		echo'<script type="text/javascript">alert("Incorrect Username or Password");window.history.back(); </script>';
	
	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
