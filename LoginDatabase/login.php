<?php
//start session
session_start();
 
include_once('User.php');
 
$user = new User();
 
if(isset($_POST['login'])){
	$username = $user->escape_string($_POST['username']);
	$password = $user->escape_string($_POST['password']);
 
	$auth = $user->check_login($username, $password);
	$row = $user->details("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
 
	if(!$auth){
		$_SESSION['message'] = 'Invalid username or password';
    	header('location:Login_SignUpUI/index.php');
	}
	else{
		$_SESSION['user'] = $auth;
		if ($row['type']==1){
			header('location:../explore.html');
		}else{
			header('location:../sp.html');
			echo mysqli_num_rows($query);
		}
	
}
}else{
$_SESSION['message'] = 'You need to login first';
header('location:Login_SignUpUI/index.php');
}
?>