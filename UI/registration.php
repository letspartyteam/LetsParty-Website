<?php

include_once('User.php');

$user = new User(); 

 if (isset($_POST['signup'])){
	 	$username = $user->escape_string($_POST['username']);
		$password = $user->escape_string($_POST['password']);
		$name = $user->escape_string($_POST['name']);
		$email = $user->escape_string($_POST['email']);
		
		$register = $user->reg_user( $email,$username,$password,$name);
	 if ($register) {
	 // Registration Success
	 	session_start();
		 $_SESSION['message'] = 'Sign up successful!You can login now.';
		 header('location:login.php');
		 //echo 'Registration successful <a href="Login_SignUpUI/index.php">Click here</a> to login';

	 } else {
	 // Registration Failed
		$_SESSION['message'] = 'Email or Username Exists';
		header('location:SignUpPage.php');
		 }
		 
}else echo 'error';
 ?>
