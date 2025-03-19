<?php 
session_start();
if(isset($_POST['btn']))
{
include 'connects.php';
$userid=test_input($_POST['userid']);
$name=test_input($_POST['name']);
$email=test_input($_POST['email']);
$fdate=test_input($_POST['fdate']);
$subject=test_input($_POST['subject']);
$regdate=date('DD-MM-YYYY');

$mysqli = connectdb();
$query = "INSERT INTO apply(userid,name,email,fdate,subject,regdate) VALUES(?,?,?,?,?,?)";

$statement = $mysqli->prepare($query);
//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
$statement->bind_param('ssssss',$_SESSION['EMAIL'],$_SESSION['USERID'],$userid,$name,$email,$fdate,$subject,$regdate);



if($statement->execute())
{
	echo '<script type="text/javascript">alert("Your apply job is successfull!"); window.location="userdashboard.php"; </script>';
}
else
{
   echo '<script type="text/javascript">alert("job applied failed try again"); </script>';
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
