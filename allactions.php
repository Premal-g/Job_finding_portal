<?php
session_start(); 
include 'connects.php';

//save values of of job applied
if(isset($_GET['jno']))
{

$jno=test_input($_GET['jno']);
$jdesc="Applied for job status is pending!!!!";
$fdate= date('d-m-y');


$mysqli = connectdb();
$sql="Select * from applied_jobs where userid= '".$_SESSION['USERID']."' and jno= '".$jno."'";
$result=$mysqli->query($sql);
if($result->num_rows>0)
{
	echo '<script type="text/javascript"> alert("You have already applied for this job. Check Status");window.history.back(); </script>';
		
}
else
{

$query = "INSERT INTO applied_jobs(userid,jno,jdesc,apdate) VALUES(?,?,?,?)";
$statement = $mysqli->prepare($query);
//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
$statement->bind_param('ssss',$_SESSION['USERID'],$jno,$jdesc,$fdate);



if($statement->execute())
{
	echo '<script type="text/javascript"> alert("Applied Succesfully!");window.history.back(); </script>';
}
else
{
   echo '<script type="text/javascript">alert("Some error occured try again!"); </script>';
}
$statement->close();
}
}

//deleting feedback 
if(isset($_GET['fno']))
{
	$mysqli=connectdb();
	$query = "delete from feedback where userid=?";
	$statement = $mysqli->prepare($query);
	//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
	$statement->bind_param('i',test_input($_GET['fno']));
	if(!$statement->execute()){
		die('Error : ('. $mysqli->errno .') '. $mysqli->error);
	}
	header("location:view_feedback.php");
}

//deleting notice
if(isset($_GET['slno']))
{
	$mysqli=connectdb();
	$query = "delete from give_notice where slno=?";
	$statement = $mysqli->prepare($query);
	//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
	$statement->bind_param('i',test_input($_GET['slno']));
	if(!$statement->execute()){
		die('Error : ('. $mysqli->errno .') '. $mysqli->error);
	}
	header("location:view_notice.php");
}

//deleting users from admin
if(isset($_GET['deleteuser']))
{
	$deleteuser=$_GET['deleteuser'];
	$mysqli=connectdb();
	$query = "delete from registration where slno=?";
	$statement = $mysqli->prepare($query);
	//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
	$statement->bind_param('i',$deleteuser);
	if(!$statement->execute())
	{
		die('Error : ('. $mysqli->errno .') '. $mysqli->error);
	}
	echo '<script type="text/javascript">window.history.back();</script>';
}

//deleting temple from admin
if(isset($_GET['deletetemple']))
{
	$deletetemple=$_GET['deletetemple'];
	$mysqli=connectdb();
	$query = "delete from registration_temple where slno=?";
	$statement = $mysqli->prepare($query);
	//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
	$statement->bind_param('i',$deletetemple);
	if(!$statement->execute())
	{
		die('Error : ('. $mysqli->errno .') '. $mysqli->error);
	}
	echo '<script type="text/javascript">window.history.back();</script>';
}

//deleting temple from admin
if(isset($_GET['deletemessage']))
{
	$deletemessage=$_GET['deletemessage'];
	$mysqli=connectdb();
	$query = "delete from feedback where slno=?";
	$statement = $mysqli->prepare($query);
	//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
	$statement->bind_param('i',$deletemessage);
	if(!$statement->execute())
	{
		die('Error : ('. $mysqli->errno .') '. $mysqli->error);
	}
	echo '<script type="text/javascript">window.history.back();</script>';
}


//deleting events by admin
if(isset($_GET['dlevents']))
{
	$dlevents=$_GET['dlevents'];
	$mysqli=connectdb();
	$query = "delete from addevents where slno=?";
	$statement = $mysqli->prepare($query);
	//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
	$statement->bind_param('i',$dlevents);
	if(!$statement->execute())
	{
		die('Error : ('. $mysqli->errno .') '. $mysqli->error);
		
	}
	echo '<script type="text/javascript">window.history.back();</script>';
}

function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>