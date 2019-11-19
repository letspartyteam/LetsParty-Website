<?php
 
//MySQLi Procedural
$conn = mysqli_connect("localhost","root","","chat_system2");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>