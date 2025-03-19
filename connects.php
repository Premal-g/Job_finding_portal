<?php
function connectdb()
{
$dbhost="sql212.epizy.com";
$dbuser="epiz_32457986";
$dbpass="dnTGs0Hk41Jbj";
$db="epiz_32457986_hireit";
$conn=new mysqli($dbhost,$dbuser,$dbpass,$db);
if($conn->connect_error){die("Connection Failed ".$mysqli->connect_error);}
return $conn;
}
?>
 