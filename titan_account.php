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


 $titleQuery = mysqli_query($con, "SELECT title FROM title WHERE titleStatus = 'active' AND selected = 'Yes' ");
      $rw = mysqli_fetch_array($titleQuery);
      $name = $rw['title'];
?>

<head>
<!--TITLE SECTION-->
<title><?php echo $name; ?> | Titan Account</title>
    <?php include 'header/head.inc.php'; ?>
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
<!--PRODUCTS navbar.INC.PHP--->
  			<?php include 'navbar/productsnavbar.inc.php'; ?>
<?php include 'navbar/titan_account_fixedsidebar.inc.php'; ?>


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




<!--ARROW_TO_TOP.INC.PHP SECTION-->
    <?php include 'includes/arrow_to_top.inc.php'; ?>
<!--FOOTER.INC.PHP SECTION-->
    <?php include 'includes/footer.inc.php'; ?>
    <script src="js/navbars.js"></script>
</body>
