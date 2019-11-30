
<?php
	session_start();
	include ("connection.php");
			if(@$_SESSION['userID']==""){
				echo"&nbsp<a href='login.php'>Log In</a>";
			}
			else{
				$user=$_SESSION['username'];
				$_SESSION['userID'];

				$user_id=$_SESSION['userID'];

		
		$user_products_query="select id from users_items where user_id='$user_id' and status='Added to cart'";
		$user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
        $no_of_products= mysqli_num_rows($user_products_result);
		// echo "<script type='text/javascript'>alert('$resultItems');</script>";
		// $_SESSION['cart'];


				echo "<div>&nbsp&nbsp&nbsp<i class='fas fa-user'></i> $user &nbsp&nbsp&nbsp<a href='cart.php'><i class='fas fa-shopping-cart'></i> cart ($no_of_products)</a> &nbsp&nbsp|&nbsp&nbsp <a href='logout.php'>Logout</a><div>";
				// echo"<div style='text-align:right;'><a href='logout.php'>"+$_SESSION['userID']+"Logout</a><div>";
	}
?>
		