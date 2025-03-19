<?php 
include 'connects.php';
session_start();
if(isset($_POST['bsignup']))
{
$upassword=test_input($_POST['upassword']);


/* if($upassword==$cpassword)
{ */
	if (isset($_POST['userid']) && $_POST['userid']) 
	{
		$userid = filter_var($_POST['userid'], FILTER_SANITIZE_STRING);
	} 
	else
	{
		echo '<script type="text/javascript">alert("User ID is not specified!!!"); </script>';
		exit;
	}	
	 

    $userid=test_input($_POST['userid']);
	
	$email=test_input($_POST['email']);
	$uepassword= hash('sha256', (get_magic_quotes_gpc() ? stripslashes($upassword) : $upassword));
	$mobile=test_input($_POST['mobile']);
	
	
	$address=test_input($_POST['address']);
	$rdate=date('d-m-y');


	$mysqli=connectdb();
	$sql="select * from registration where userid='".$userid."'";
	$result=$mysqli->query($sql);
	if($result->num_rows>0)
	{
		echo '<script type="text/javascript">alert("UserID  already exists. Please choose another ID.!"); window.history.back();</script>';
	}
	else
	{
				$sql="select * from registration where email='".$email."'";
				$result=$mysqli->query($sql);
				if($result->num_rows>0)
				{
					echo '<script type="text/javascript">alert("Email ID  already exists. Please choose another ID.!"); window.history.back();</script>';
				}
				else
				{	
					$query = "INSERT INTO registration(userid,email,upassword,mobile,address,rdate) VALUES(?,?,?,?,?,?)";
					$statement = $mysqli->prepare($query);

					//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
					$statement->bind_param('ssssss',$userid,$email,$uepassword,$mobile,$address,$rdate);

					

					if($statement->execute())
					{
						//sending mail
						/* $to = $email;
						$subject = "hireit - Registration successfully done!!!";
						$txt = "Hi! Your registration is done in hireit website. you can find good job in our website. Thank You";
						$headers = "From: reshmanaik@gmail.com" . "\r\n" .
						"CC: reshmanaik@gmail.com";
						mail($to,$subject,$txt,$headers); */
						$_SESSION['USERID']=$userid;
						
						//mail ended
						echo '<script type="text/javascript">alert("Registration done successfully!");window.history.back();</script>';
						//header("Location:registration.html");
					}
					else
					{
					 ///  echo '<script type="text/javascript">alert("Some error occured in registration try again!");</script>';
					}
					
					
					$statement->close();
					
				}	
	}
} 
else
{
	echo  '<script type="text/javascript">alert("Confirm Password Doesnot Match"); window.history.back();</script>';
}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>
