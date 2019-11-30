<?php
$con=mysqli_connect("localhost","root","","letsParty") or die(mysqli_error($con));
if (!$con){
	die ("FAILED to connect to ".$database." databse:".  mysqli_connect_error());
	}
//$con=mysqli_connect("localhost","root","","store") or die(mysqli_error($con));
?>
