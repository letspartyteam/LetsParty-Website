
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
    // require 'connection.php';
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }else{
        $user_id=$_SESSION['userID'];
        $confirm_query="update users_items set status='Confirmed' where user_id=$user_id";
        $confirm_query_result=mysqli_query($con,$confirm_query) or die(mysqli_error($con));
        // header('location:success.php');
        
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
                <div class="row">
                    <div class="col-xs-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading"></div>
                            <div class="panel-body">
                                <p>Your order is confirmed. Thank you for shopping with us. <a href="categories.php">Click here</a> to purchase any other item.</p>
                            </div>
                        </div>
                    </div>
                </div>
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