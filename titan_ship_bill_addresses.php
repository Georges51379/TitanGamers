<?php
session_start();
//error_reporting(0);
include('db/connection.php');
if(strlen($_SESSION['email'])==0)
    {
header('location:login-user.php');
}
else {

?>
<head>
<!--TITLE SECTION-->
    <title>Titan Gamers | Billing / Shipping Addresses</title>
<!--ICON SECTION-->
    <link href="img/icons/logo.png" rel="shortcut icon">
<!--FONT AWESOME CDN SECTION-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!--jQUERY CDN SECTION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="css/billship.css" rel="stylesheet">

</head>

<body>
<!--PRODUCTS TOPBAR.INC.PHP SECTION-->
		<?php include 'includes/products_topbar.inc.php'; ?>
<!--PRODUCTS LOGOSEARCH.INC.PHP SECTION-->
		<?php include 'includes/products_search.inc.php'; ?>
<!--PRODUCTS MAINNAVBAR.INC.PHP--->
		<?php include 'includes/products_mainnavbar.inc.php'; ?>

    <div class="billship_wrapper">
      <h4 class="billship_subtitle">titan account</h4>
      <div class="billship_section">
        <h4 class="billship_section_title">billing information</h4>
        <div class="billship_div">
          <?php
          $query=mysqli_query($con,"select * from users where email='".$_SESSION['email']."'");
          while($row=mysqli_fetch_array($query))
          {
          ?>
          <form class="billship_form" action="titan_action.php" role="form" method="post">
            <div class="billship_div_form">
					    <label class="billship_label" for="Billing Address">Billing Address<span class="red_astrix">*</span></label><br>
					    <textarea class="billship_textarea"  name="billingaddress" required="required"><?php echo $row['billingAddress'];?></textarea>
					  </div>
						<div class="billship_div_form">
					    <label class="billship_label" for="Billing State ">Billing State  <span class="red_astrix">*</span></label><br>
			           <input type="text" class="billship_input" id="bilingstate" name="bilingstate" value="<?php echo $row['billingState'];?>" required>
					  </div>
					  <div class="billship_div_form">
					    <label class="billship_label" for="Billing City">Billing City <span class="red_astrix">*</span></label><br>
					    <input type="text" class="billship_input" id="billingcity" name="billingcity" required="required" value="<?php echo $row['billingCity'];?>" >
					  </div>
            <div class="billship_div_form">
					    <label class="billship_label" for="Billing Pincode">Billing Pincode <span class="red_astrix">*</span></label><br>
					    <input type="text" class="billship_input" id="billingpincode" name="billingpincode" required="required" value="<?php echo $row['billingPincode'];?>" >
					  </div>
					  <button type="submit" name="billupdate" class="billship_btn">Update</button>
					</form>
					<?php } ?>
				</div>
    </div>
</div>

        <div class="billship_wrapper">
          <h4 class="billship_subtitle">shipping information</h4>
          <div class="billship_section">
            <h4 class="billship_section_title">billing information</h4>
            <div class="billship_div">
        <?php
        $query=mysqli_query($con,"select * from users where email='".$_SESSION['email']."'");
        while($row=mysqli_fetch_array($query))
        {
        ?>
        <form class="billship_form" action="titan_action.php" role="form" method="post">
            <div class="billship_div_form">
            <label class="billship_form" for="Shipping Address">Shipping Address<span class="red_astrix">*</span></label><br>
            <textarea class="billship_textarea" name="shippingaddress" required="required"><?php echo $row['shippingAddress'];?></textarea>
            </div>
            <div class="billship_div_form">
            <label class="billship_form" for="Billing State ">Shipping State  <span class="red_astrix">*</span></label><br>
            <input type="text" class="billship_input" id="shippingstate" name="shippingstate" value="<?php echo $row['shippingState'];?>" required>
            </div>
            <div class="billship_div_form">
            <label class="billship_form" for="Billing City">Shipping City <span class="red_astrix">*</span></label><br>
            <input type="text" class="billship_input" id="shippingcity" name="shippingcity" required="required" value="<?php echo $row['shippingCity'];?>" >
            </div>
            <div class="billship_div_form">
            <label class="billship_form" for="Billing Pincode">Shipping Pincode <span class="red_astrix">*</span></label><br>
            <input type="text" class="billship_input" id="shippingpincode" name="shippingpincode" required="required" value="<?php echo $row['shippingPincode'];?>" >
            </div>
            <button type="submit" name="shipupdate" class="billship_btn">Update</button>
        </form>
        <?php } ?>
          </div>
        </div>
        </div>
        <?php } ?>

<!--TITAN ACCOUNT SIDEBAR SECTION-->
<?php include 'includes/titan_account_fixedsidebar.inc.php'; ?>

<!--ARROW_TO_TOP.INC.PHP SECTION-->
    <?php include 'includes/arrow_to_top.inc.php'; ?>
<!--FOOTER.INC.PHP SECTION-->
    <?php include 'includes/footer.inc.php'; ?>
