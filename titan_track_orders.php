<?php
session_start();
error_reporting(0);
include('db/connection.php');

if(strlen($_SESSION['email'])==0){
  header('location:login-user.php');
}
?>

<head>
<!--TITLE SECTION-->
    <title>Titan Gamers | Track Orders</title>
<!--ICON SECTION-->
    <link href="img/icons/logo.png" rel="shortcut icon">
<!--FONT AWESOME CDN SECTION-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!--jQUERY CDN SECTION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="css/titantrackorders.css" rel="stylesheet">

</head>

<body>
<!--PRODUCTS TOPBAR.INC.PHP SECTION-->
		<?php include 'includes/products_topbar.inc.php'; ?>
<!--PRODUCTS LOGOSEARCH.INC.PHP SECTION-->
		<?php include 'includes/products_search.inc.php'; ?>
<!--PRODUCTS MAINNAVBAR.INC.PHP--->
		<?php include 'includes/products_mainnavbar.inc.php'; ?>

<?php
$query= mysqli_query($con, "SELECT * FROM users WHERE email='".$_SESSION['email']."'");
$rw= mysqli_fetch_array($query);
 ?>
 <center>
    <div class="trackorders_div">
      <h4 class="trackorders_title">track your order(s) here!</h4>
      <span class="trackorders_info">enter your order ID along with your email to track your order
      </span>
<br><br>
      <form class="trackorders_form" role="form" method="post" action="titan_order_details.php">
    		<div class="trackorders_div_form">
    		    <label class="trackorders_label" for="exampleOrderId1">Order ID<span class="astrix">*</span></label><br>
    		    <input type="text" class="trackorders_input" name="orderToken" id="exampleOrderId1" >
    		</div>
    	  	<div class="trackorders_div_form">
    		    <label class="trackorders_label" for="exampleBillingEmail1">email</label><br>
    		    <input type="email" class="disabledinput trackorders_input" name="email" value="<?php echo $_SESSION['email'];?>" readonly id="exampleBillingEmail1" >
    		</div>
    	  	<button type="submit" name="submit" class="trackorders_btn">Track</button>
    	</form>
    </div>

    <div class="trackorder_help">
      <h2 class="help_title">where to find the order iD</h2>
      <h5 class="help_txt">
        the order iD can be found by going: <br><br><br>
        <ol class="help_list">
          <li class="help_li">go to titan <i class="fa fa-user"></i></li>
          <li class="help_li">check the sidebar for titan order history</li>
          <li class="help_li">under the tab action there is a button "track"</li>
          <li class="help_li">a window should open, look for order iD</li>
          <li class="help_li">memorize the iD and type it or paste it here</li>
          <li class="help_li">finally click track</li>
        </ol>
      </h5>

      <h4 class="help_note">
        always track your oder(s) to see where is your product(s) and when will they be delivered to your doorstep.
      </h4>

    </div>


</center>

<!--ARROW_TO_TOP.INC.PHP SECTION-->
    <?php include 'includes/arrow_to_top.inc.php'; ?>
<!--FOOTER.INC.PHP SECTION-->
    <?php include 'includes/footer.inc.php'; ?>
</body>
