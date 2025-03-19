<?php
$error =NULL;

if(isset($_POST['submit']))
{
	// get form data 
	$u =$_POST['userid'];
	$u =$_POST['userid'];
	$u =$_POST['userid'];
	$u =$_POST['userid'];
	$u =$_POST['userid'];
	
	// generate v key
	$vkey =md5(time().$userid);

//Inserrt account into the database
if(	
	$to=$email;
	$subject ="Email Verification";
	$message ="";
	
	