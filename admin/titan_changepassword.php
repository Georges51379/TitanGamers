<?php
session_start();
include('db/connection.php');
if(strlen($_SESSION['email'])==0)
	{
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Beirut');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
$sql=mysqli_query($con,"SELECT password FROM  admin where password='".md5($_POST['password'])."' && username='".$_SESSION['alogin']."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($con,"update admin set password='".md5($_POST['newpassword'])."', updationDate='$currentTime' where username='".$_SESSION['alogin']."'");
$_SESSION['msg']="Password Changed Successfully !!";
}
else
{
$_SESSION['msg']="Old Password does not match !!";
}
}
?>
<html lang="en">
<head>
	<title>Admin | Change Password</title>
	<link href="images/icons/logo.png" rel="shortcut icon">

	<link href="css/changepwd.css" rel="stylesheet">
<!--FONT AWESOME CDN SECTION-->
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--jQUERY CDN SECTION-->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script type="text/javascript">
function valid()
{
if(document.chngpwd.password.value=="")
{
alert("Current Password Field is Empty !!");
document.chngpwd.password.focus();
return false;
}
else if(document.chngpwd.newpassword.value=="")
{
alert("New Password Field is Empty !!");
document.chngpwd.newpassword.focus();
return false;
}
else if(document.chngpwd.confirmpassword.value=="")
{
alert("Confirm Password Field is Empty !!");
document.chngpwd.confirmpassword.focus();
return false;
}
else if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
</head>
<body>
<?php include('include/header.inc.php');?>

	<div class="changepwd_wrapper">
			<div class="changepwd_sidebardiv">
<?php include('include/sidebar.inc.php');?>
							<div class="changepwd_title">
								<h3 class="title">Admin Change Password</h3>
							</div>
							<div class="changepwd_form_wrapperdiv">
									<?php if(isset($_POST['submit']))
{?>
									<div class="changepwd_alertmsg">
										<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>
									<br />
			<form class="changepwd_form" name="chngpwd" method="post" onSubmit="return valid();">
									<div class="changepwd_form_div">
										<label class="changepwd_label" for="basicinput">current password<span class="red_astrix">*</span></label><br>
										<input type="password" placeholder="Enter your current Password"  name="password" class="changepwd_input" required>
									</div>
									<div class="changepwd_form_div">
										<label class="changepwd_label" for="basicinput">new password<span class="red_astrix">*</span></label><br>
										<input type="password" placeholder="Enter your new current Password"  name="newpassword" class="changepwd_input" required>
									</div>
									<div class="changepwd_form_div">
										<label class="changepwd_label" for="basicinput">confirm Password<span class="red_astrix">*</span></label><br>
										<input type="password" placeholder="Enter your new Password again"  name="confirmpassword" class="changepwd_input" required>
									</div>
										<div class="changepwd_form_div">
												<button type="submit" name="submit" class="changepwd_form_btn">Submit</button>
										</div>
				</form>
					</div><!--/.content-->
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.inc.php');?>
<?php include 'include/arrow_to_top.inc.php'; ?>
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>
<?php } ?>
