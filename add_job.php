<?php 
include 'connects.php';
session_start();
if(isset($_POST['bsignup']))
{


/* if($upassword==$cpassword)
{ */
	if (isset($_POST['Jtitle']) && $_POST['Jtitle']) 
	{
		$Jtitle = filter_var($_POST['Jtitle'], FILTER_SANITIZE_STRING);
	} 
	else
	{
		echo '<script type="text/javascript">alert("Job Title is not specified!!!"); </script>';
		exit;
	}	

    $Jtitle=test_input($_POST['Jtitle']);
	$Jtype=test_input($_POST['Jtype']);
	$cname=test_input($_POST['cname']);
	$Jqul=test_input($_POST['Jqul']);
	
	
	
	
	$Jexp=test_input($_POST['Jexp']);
	$Jlocation=test_input($_POST['Jlocation']);
	$Jsalary=test_input($_POST['Jsalary']);
	$des=test_input($_POST['des']);
	$jadded_date= date('d-m-y');


	$mysqli=connectdb();
	$sql="select * from add_job where Jtitle='".$Jtitle."'";
	$result=$mysqli->query($sql);
	if($result->num_rows>0)
	{
		echo '<script type="text/javascript">alert("Job Title already exists.!"); window.history.back();</script>';
	}
	/*
	else
	{
				$sql="select * from add_job where ='".$email."'";
				$result=$mysqli->query($sql);
				if($result->num_rows>0)
				{
					echo '<script type="text/javascript">alert("Email ID  already exists. Please choose another ID.!"); window.history.back();</script>';
				} */
				else
				{	
					$query = "INSERT INTO add_job(Jtitle,Jtype,cname,Jqul,Jexp,Jlocation,Jsalary,des,jadded_date) VALUES(?,?,?,?,?,?,?,?,?)";
					$statement = $mysqli->prepare($query);

					//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
					$statement->bind_param('sssssssss', $Jtitle,$Jtype,$cname,$Jqul,$Jexp,$Jlocation,$Jsalary,$des,$jadded_date);

					

					if($statement->execute())
					{
						//sending mail
						/* $to = $email;
						$subject = "hireit - Registration successfully done!!!";
						$txt = "Hi! Your registration is done in hireit website. you can find good job in our website. Thank You";
						$headers = "From: reshmanaik@gmail.com" . "\r\n" .
						"CC: reshmanaik@gmail.com";
						mail($to,$subject,$txt,$headers); */
						$_SESSION['JTITLE']=$Jtitle;
						
						//mail ended
						echo '<script type="text/javascript">alert("Job is Successfully added!");window.history.back();</script>';
						//header("Location:add_job.html");
					}
					else
					{
					 ///  echo '<script type="text/javascript">alert("Some error occured in adding jobs. Please try again!");</script>';
					}
					
					
					$statement->close();
					
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
