<?php
session_start();
//error_reporting(0);
include('db/connection.php');
if(strlen($_SESSION['email'])==0)
    {
header('location:login-user.php');
}
else {

  $titleQuery = mysqli_query($con, "SELECT title FROM title WHERE titleStatus = 'active' AND selected = 'Yes' ");
       $rw = mysqli_fetch_array($titleQuery);
       $name = $rw['title'];
 ?>

 <head>
 <!--TITLE SECTION-->
 <title><?php echo $name; ?> | Titan Shipping Information</title>
     <?php include 'header/head.inc.php'; ?>
</head>

<body>
  <!--PRODUCTS navbar.INC.PHP--->
    			<?php include 'navbar/productsnavbar.inc.php'; ?>
  <?php include 'navbar/titan_account_fixedsidebar.inc.php'; ?>

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
            <input type="text" class="billship_input" id="shippingPinCode" name="shippingPinCode" required="required" value="<?php echo $row['shippingPinCode'];?>" >
            </div>
            <button type="submit" name="shipupdate" class="billship_btn">Update</button>
        </form>
        <?php } ?>
          </div>
        </div>
        </div>
        <?php } ?>

        <!--ARROW_TO_TOP.INC.PHP SECTION-->
            <?php include 'includes/arrow_to_top.inc.php'; ?>
        <!--FOOTER.INC.PHP SECTION-->
            <?php include 'includes/footer.inc.php'; ?>
            <script src="js/navbars.js"></script>
  </body>
</html>
