

    <?php include 'auth.php';?>	
    <?php
    // session_start();
    // require 'connection.php';
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }else{
        $user_id=$_SESSION['userID'];
        $confirm_query="update users_items set status='Confirmed' where user_id=$user_id";
        $confirm_query_result=mysqli_query($con,$confirm_query) or die(mysqli_error($con));
        header('location:success2.php');
        
    }
?>