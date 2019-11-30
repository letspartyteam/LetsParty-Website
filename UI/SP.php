

<!DOCTYPE html>
<html lang="en">
<title>Framboise and Olives</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include 'Head.php';?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--hi medoooooooo-->
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
.w3-black{
    background-color: #f67e7d !important;
}

.w3-button:hover{
    background-color: white !important;
    color: #f67e7d !important;
}
</style>

<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="#" class="w3-bar-item w3-padding-large" style="text-decoration: none;"><span><img src ="images/white-logo.png" width="30" height="30"> LetsParty</span></a>
    <a href="sp.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small"  >ORDERS</a>
    <a href="https://web.whatsapp.com" class="w3-bar-item w3-button w3-padding-large w3-hide-small">MESSAGES</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-right">Logout</a>
    <a href="#" class="w3-bar-item w3-padding-large w3-right" style="text-decoration: none;"><span><img src ="images/SP/framboiselogo.png" width="30" height="30"> Framboise & Olive</span></a>
  </div>
</div>

<!-- Page Content -->
<div class="w3-content" style="max-width:2000px; margin:70px 40px">
<h2>Orders</h2>
    
<?php 


session_start();
	include ("connection.php");
			if(@$_SESSION['userID']==""){
				header('location: login.php');
			}
			else{
				$user=$_SESSION['username'];
				$_SESSION['userID'];

				$user_id=$_SESSION['userID'];
            }


    $user_id=$_SESSION['userID'];
    //$user_products_query="select * from users inner join users_items orders on users.id=orders.user_id inner join items on items.item_id=orders.id inner join users on items.sp_id = users.id ";
    $user_products_query="select * from users u inner join users_items orders on 
    u.id=orders.user_id inner join items itm on itm.id=orders.item_id";

    $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
    $no_of_user_products= mysqli_num_rows($user_products_result);
    $sum=0;
    if($no_of_user_products==0){
        while($row=mysqli_fetch_array($user_products_result)){
            echo $row;
        }
        
    }
    ?>

<table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>Order Number</th><th>Customer</th><th>Order</th><th>Total Price</th>
                        </tr>
                       <?php 
                        $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
                        $no_of_user_products= mysqli_num_rows($user_products_result);
                        $counter=1;
                       while($row=mysqli_fetch_array($user_products_result)){
                           
                         ?>
                        <tr>
                            <th><?php echo $counter ?></th>
                            <th>
                            <?php echo $row['username']?></th>
                            <th><?php echo $row['name']?></th>
                            <th><?php echo $row['price']?></th>
                        </tr>
                       <?php $counter=$counter+1;}?>
                        
                    </tbody>
                </table>

</div>



</body>
</html>
