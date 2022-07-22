<?php
session_start();
error_reporting(0);
include('db/connection.php');

if(strlen($_SESSION['email'])==0)
    {
header('location:login-user.php');
}
else {
date_default_timezone_set('Asia/Beirut');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
?>

<head>
<!--TITLE SECTION-->
    <title>Titan Gamers | Titan Account</title>
<!--ICON SECTION-->
    <link href="img/icons/logo.png" rel="shortcut icon">
<!--FONT AWESOME CDN SECTION-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!--jQUERY CDN SECTION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="css/titan_account.css" rel="stylesheet">

  <script>

  //FULLNAME CHECKING
  			function fullnameCheck() {
  			$("#loaderIcon").show();
  			jQuery.ajax({
  			url: "check/titan_check_fname_availability.php",
  			data:'name='+$("#name").val(),
  			type: "POST",
  			success:function(data){
  			$("#fullname_availability").html(data);
  			$("#loaderIcon").hide();
  			},
  			error:function (){}
  			});
  			}

//CONTACT NUMBER CHECK
		function phone(){
			$("#loaderIcon").show();
				jQuery.ajax({
				  url: "check/titan_check_contactnumb_availability.php",
          data:'phone='+$("#phone").val(),
        	type: "POST",
        	 success:function(data){
        		$("#phone_availability").html(data);
        			$("#loaderIcon").hide();
        				},
        				error:function (){}
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

<br><br><br>
    <div class="titanaccount_wrapper">
      <h4 class="titanaccount_subtitle">titan account</h4>
      <div class="titanaccount_section">
        <h4 class="titanaccount_section_title">personal info</h4>
        <div class="titanaccount_div_form">
          <?php
          $query=mysqli_query($con,"SELECT * FROM users WHERE email='".$_SESSION['email']."'");
          while($row=mysqli_fetch_array($query))
          {
          ?>
          <form class="titanaccount_form" role="form" action="titan_action.php" method="post">
            <div class="titanaccount_div">
              <label class="titanaccount_label" for="name">Name<span class="red_astrix">*</span></label><br>
              <input type="text" class="titanaccount_input name_capitalize" onBlur="fullnameCheck()" value="<?php echo $row['name'];?>" id="name" name="name" required="required">
<br>
              <span id="fullname_availability" style="font-size:12px;"></span>
            </div>

            <div class="titanaccount_div">
              <label class="titanaccount_label" for="exampleInputEmail1">Email Address <span class="red_astrix">*</span></label><br>
              <input type="email" class="titanaccount_input email_enable" required="required" id="exampleInputEmail1" value="<?php echo $row['email'];?>" readonly>
            </div>

            <div class="titanaccount_div">
              <label class="titanaccount_label" for="Contact No.">Contact Number <span class="red_astrix">*</span></label><br>
              <input type="text" class="titanaccount_input" id="phone" onBlur="phone()" name="phone" required="required" value="<?php echo $row['phone'];?>"  maxlength="10">
<br>
              <span id="phone_availability" style="font-size:12px;"></span>
            </div>
            <button type="submit" name="updateaccount" class="signup_btn">Update</button>
          </form>
          <?php } ?>
        </div><!--END FIRST SECTION FORM-->
      </div>
    </div>
<?php } ?>

<?php include 'includes/titan_account_fixedsidebar.inc.php'; ?>


<!--ARROW_TO_TOP.INC.PHP SECTION-->
    <?php include 'includes/arrow_to_top.inc.php'; ?>
<!--FOOTER.INC.PHP SECTION-->
    <?php include 'includes/footer.inc.php'; ?>
</body>
