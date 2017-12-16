<?php

include "db.php";

$f_name=$_POST["f_name"];
$l_name=$_POST["l_name"];
$email=$_POST['email'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
$mobile=$_POST['mobile'];
$address1=$_POST['address1'];
$address2=$_POST['address2'];
$name="/^[a-zA-Z ]*$/";
$emailValidation="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$number="/^[0-9]+$/";

if(empty($f_name)||empty($l_name)||empty($email)||empty($password)||empty($repassword)||empty($mobile)||empty($address1)||empty($address2))
	{
		echo "
			<div class='alert alert-warning'>
				<a herf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Please fill the all feilds...!</b>
			</div>
		";
		exit();
	}else{
	if(!preg_match($name,$f_name))
	{
		echo "
		<div class='alert alert-warning'>
				<a herf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>$f_name is not a valid name</b>
		</div>
		";
		exit();
	}
	if(!preg_match($name,$l_name))
	{
		echo "
		<div class='alert alert-warning'>
				<a herf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>$l_name is not valid name</b>
		</div>
		";
		exit();
	}
	if(!preg_match($emailValidation,$email))
	{
		echo "
		<div class='alert alert-warning'>
				<a herf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>$email is not a valid email address</b>
		</div>
		";
		exit();
	}
	if(strlen($password)<9)
	{
		echo "
		<div class='alert alert-warning'>
				<a herf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Password is not valid</b>
		</div>
		";
		exit();
	}
	if($password!=$repassword)
	{
		echo "
		<div class='alert alert-warning'>
				<a herf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Password is not same</b>
		</div>
		";
		exit();
	}
	if(!preg_match($number,$mobile))
	{
		echo "
		<div class='alert alert-warning'>
				<a herf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>$mobile is not a valid mobile number</b>
		</div>
		";
		exit();
	}
	if(!(strlen($mobile)==10))
	{
		echo "
		<div class='alert alert-warning'>
				<a herf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number should be 10 digits</b>
		</div>
		";
		exit();
	}
	
	$sql="select userid from userinfo where email='$email' limit 1";
	$check_query=mysqli_query($conn,$sql);
	$count_email=mysqli_num_rows($check_query);
	if($count_email>0)
	{
		echo "
		<div class='alert alert-danger'>
				<a herf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>This email address is already registered, Please try another email address</b>
		</div>
		";
		exit();
	}else{
		$password=md5($password);
		$sql="INSERT INTO `userinfo` (`userid`, `firstname`, `lastname`, `email`, `password`, `mobilenumber`, `address1`, `address2`) 
		VALUES (NULL, '$f_name', '$l_name', '$email', '$password', '$mobile', '$address1', '$address2');";
		$run_query=mysqli_query($conn,$sql);
		if($run_query){
			echo "
				<div class='alert alert-success'>
						<a herf='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>You are Resgistered successfully.........!</b>
				</div>
				";
		}
	}
	}
?>