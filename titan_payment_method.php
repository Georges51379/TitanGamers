<?php
session_start();
error_reporting(0);
include('db/connection.php');
if(strlen($_SESSION['email'])==0)
    {
header('location:login-user.php');
}
else{
	if (isset($_POST['submit'])) {

    $paymentMethod = $_POST['paymethod'];

		mysqli_query($con,"UPDATE orders SET paymentMethod='COD', totalPrice= '".$_SESSION['finalTotal']."' WHERE userEmail='".$_SESSION['email']."' AND orderToken = '".$_SESSION['orderToken']."' ");
		//unset($_SESSION['cart']);
    mysqli_query($con,"UPDATE cart SET status = 'Inactive' WHERE cartToken = '".$_SESSION['carToken']."' ");
		header('location:titan_order_history.php');

	}
?>


<head>
<!--TITLE SECTION-->
    <title>Titan Gamers | Payment Method</title>
<!--ICON SECTION-->
    <link href="img/icons/logo.png" rel="shortcut icon">
<!--FONT AWESOME CDN SECTION-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!--jQUERY CDN SECTION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--PAYMENT.CSS SECTION-->
      <link href="css/payment.css" rel="stylesheet">


      <script>
      function checkCoupon(){
        jQuery.ajax({
          url: "check/checkCouponAvailability.php",
          data: "name="+$("#name").val(),
          type: "POST",
           success:function(data){
             $("#couponAvailability").html(data);
             $("#finalPrice").html(data1);
           },
           error:function(){}
        });
      }
      </script>


</head>

<body>
<!--PRODUCTS TOPBAR.INC.PHP SECTION-->
		<?php include 'includes/products_topbar.inc.php'; ?>
<!--PRODUCTS LOGOSEARCH.INC.PHP SECTION-->
		<?php include 'includes/products_search.inc.php'; ?>
<!--PRODUCTS MAINNAVBAR.INC.PHP--->
		<?php include 'includes/products_mainnavbar.inc.php'; ?>

<center>
    <div class="payment_method_wrapper">
      <h2 class="payment_method_bigtitle"> Payment Method</h2>

      <div class="payment_method_smalltitle_wrapper">
        <h3 class="payment_method_smalltitle">choose your payment method below</h3>
      </div>

      <h4 class="payment_method_info">
        we have only cash on delivery (COD) payment method.<br>
        in our point of vue, cash on delivery is much more secure than any other payment methods.
      </h4>

      <div class="div_for_form">
	    <form name="payment" class="form" method="post">
        <input type="text" class="txtinput" name="name" onblur="checkCoupon()" id="name" placeholder="Default code: TG13" required>
        <span id="couponAvailability"></span>
<br><br><br>

  <span class="totalprice" style="color: red; text-decoration: line-through"><?php echo $_SESSION['totalPrice']; ?></span>
  <span id="finalPrice"></span>

      <input type="radio" class="radio_cod" name="paymethod" value="COD" checked="checked">Cash On Delivery (COD)
	     <input type="submit" value="done" name="submit" class="done_btn">
	    </form>
		</div>
  </div>
<?php } ?>
</center>

<!--ARROW_TO_TOP.INC.PHP SECTION-->
    <?php include 'includes/arrow_to_top.inc.php'; ?>
<!--FOOTER.INC.PHP SECTION-->
    <?php include 'includes/footer.inc.php'; ?>
</body>
