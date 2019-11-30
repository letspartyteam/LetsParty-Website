
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include 'Head.php';?>
	</head>
  <body>

	<div id="colorlib-page">
    <?php include 'SideNav.php';?>	

		<div id="colorlib-main">

    <?php include 'auth.php';?>	
    <?php
    // session_start();
    require 'connection.php';
    if(@$_SESSION['userID']==""){
        header('location: login.php');
    }
    $user_id=$_SESSION['userID'];
    $user_products_query="select it.id,it.name,it.price from users_items ut inner join items it on it.id=ut.item_id where ut.user_id='$user_id' and status='Added to cart'";
    $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
    $no_of_user_products= mysqli_num_rows($user_products_result);
    $sum=0;
    if($no_of_user_products==0){
        //echo "Add items to cart first.";
    ?>
        <script>
        window.alert("No items in the cart!!");
        </script>
    <?php
    }else{
        while($row=mysqli_fetch_array($user_products_result)){
            $sum=$sum+$row['price']; 
       }
    }
?>
            <section class="ftco-section bg-light ftco-bread">
                <div class="container">
                    <div class="row no-gutters slider-text align-items-center">
                        <div class="col-md-9 ftco-animate">
                            </span>
                            </p>
                            <h1 class="mb-3 bread">Cart</h1>
                            <p></p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="ftco-section-2">
                <div class="photograhy">



                    <!-- ------------------------------------------------------------------ -->
					<div class="container">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>Item Number</th><th>Item Name</th><th>Price</th><th></th>
                        </tr>
                       <?php 
                        $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
                        $no_of_user_products= mysqli_num_rows($user_products_result);
                        $counter=1;
                       while($row=mysqli_fetch_array($user_products_result)){
                           
                         ?>
                        <tr>
                            <th><?php echo $counter ?></th><th><?php echo $row['name']?></th><th><?php echo $row['price']?></th>
                            <th><a href='cart_remove.php?id=<?php echo $row['id'] ?>'>Remove</a></th>
                        </tr>
                       <?php $counter=$counter+1;}?>
                        <tr>
                            <th></th><th>Total</th><th>SAR <?php echo $sum;?></th><th><a href="success.php?id=<?php echo $user_id?>" class="btn btn-primary">Confirm Order</a></th>
                        </tr>
                    </tbody>
                </table>
            </div>

						



                    <!-- ------------------------------------------------------------------ -->



                </div>
            </section>
			<?php include 'Footer.php';?>
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->


    <?php include 'Scripts.php';?>
  </body>
</html>