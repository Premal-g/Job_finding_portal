<?php 
session_start();
include 'connects.php';
if(isset($_POST['btnsubmit']))
{
	
$message=test_input($_POST['message']);
$name=test_input($_POST['name']);
$email=test_input($_POST['email']);
$subject=test_input($_POST['subject']);


$fdate= date('d-m-y');


//mysql_connect("localhost", "root","");
$mysqli = connectdb();
$query = "INSERT INTO feedback(message,email,subject,name,fdate) VALUES(?,?,?,?,?)";
$statement = $mysqli->prepare($query);
//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
$statement->bind_param('sssss',$message,$name,$email,$subject,$fdate);



if($statement->execute())
{
	echo '<script type="text/javascript"> window.location="contact.html"; alert("Your Message to Admin is Sent!");</script>';
}
else
{
   echo '<script type="text/javascript">alert("Sorry try again, some error occured!"); </script>';
}
$statement->close();
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
