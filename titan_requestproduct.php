<?php
session_start();
error_reporting(0);
include('db/connection.php');

if(strlen($_SESSION['email'])==0)
    {
header('location:login-user.php');
}
?>

<head>
<!--TITLE SECTION-->
    <title>Titan Gamers | Titan Request Product</title>
<!--ICON SECTION-->
    <link href="img/icons/logo.png" rel="shortcut icon">
<!--FONT AWESOME CDN SECTION-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!--jQUERY CDN SECTION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="css/requestproduct.css" rel="stylesheet">

</head>
<body>
<!--PRODUCTS TOPBAR.INC.PHP SECTION-->
		<?php include 'includes/products_topbar.inc.php'; ?>
<!--PRODUCTS LOGOSEARCH.INC.PHP SECTION-->
		<?php include 'includes/products_search.inc.php'; ?>
<!--PRODUCTS MAINNAVBAR.INC.PHP--->
		<?php include 'includes/products_mainnavbar.inc.php'; ?>

    <!--SHOPPING AND REQUEST PRODUCT SECTION-->
    <div class="requestproduct_wrapper">
      <h3 class="review_title">request product <i class="fa fa-plus"></i></h3>

      <h5 class="request_text">this page will allow you to enter the brand and series name of any laptop you want plus its
         specific description. <br>after submitting the details, we will check it and get back to you as soon as possible either we found the laptop and when
         it is gonna be available or we have not found the requested one.
       </h5>

      <form role="form" class="request_form" name="request" action="titan_action.php" method="post">

            <div class="requestproduct_divform">
              <label class="label_name" for="exampleInputName">brand name <span class="astk">*</span></label>
              <input type="text" class="text_summary" id="exampleInputName" placeholder="dell, hp, asus, msi, razer, lenovo,  macbook, acer, aorus..." name="brand" required="required">
            </div>
    <br>
            <div class="requestproduct_divform">
              <label class="label_name" for="exampleInputSummary">series name <span class="astk">*</span></label>
              <input type="text" class="text_summary" id="exampleInputSummary" placeholder="alienware, omen, titan, predator, leopard, legion, y, g_series, stealth... " name="series" required="required">
            </div>
    <br>
            <div class="requestproduct_divform">
              <label class="label_name" for="exampleInputReview">description<span class="astk">*</span></label>
              <textarea class="text_summary" id="exampleInputReview" rows="4" placeholder="" name="description" required="required"></textarea>
            </div>
    <br>
            <div class="action_btn">
              <button name="requestProduct" class="btn request_btn">submit</button>
            </div><!--ACTION BTN-->

        </form><!--request FORM-->
      </div><!--END request FORM CNTAINER -->
    <!--END SHOPPING AND REQEST PRODUCT PART-->

<!--START NOTIFICATION BELL-->
<?php
  $query = mysqli_query($con, "SELECT * FROM requestproduct WHERE requestStatus='successful' AND userEmail='".$_SESSION['email']."' ");
  $statement = mysqli_fetch_array($query);

  if($statement > 1){
 ?>
  <div class="notificationbell">
    <button class="bell_icon">
      <i class="fa fa-bell"></i>
    </button>
  </div>

<?php } else { ?>

  <div class="notificationbell">
    <button class="bellnot">
      <i class="fa fa-bell"></i>
    </button>
  </div>

  <?php

} ?>

<!--END NOTIFICATION BELL-->

<!--ARROW_TO_TOP.INC.PHP SECTION-->
    <?php include 'includes/arrow_to_top.inc.php'; ?>
<!--FOOTER.INC.PHP SECTION-->
    <?php include 'includes/footer.inc.php'; ?>
</body>
