<?php
include "db.php";

session_start();

if(isset($_POST["userLogin"]))
	{
	$email=mysqli_real_escape_string($conn,$_POST["userEmail"]);
	$password=md5($_POST["userPassword"]);
	$sql="select * from userinfo where email='$email' and password='$password'";
	$run_query=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($run_query);
		if($count==1)
		{
			$row=mysqli_fetch_array($run_query);
			$_SESSION["uid"]=$row["userid"];
			$_SESSION["name"]=$row["firstname"];
			echo "Hello";
		}	
	}	

?>