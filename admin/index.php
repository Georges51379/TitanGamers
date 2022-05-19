<?php require_once "dataProcessing.php"; ?>

<html lang="en">
<head>
<!--FONT AWESOME CDN SECTION-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--jQUERY CDN SECTION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--TITLE SECTION-->
		<title>Titan Gamers | Admin login</title>
<!--ICON SECTION-->
		<link href="images/icons/logo.png" rel="shortcut icon">
<!--INDEX.CSS STYLESHEET--->
		<link href="css/index.css" rel="stylesheet">
</head>

<body>

	<div class="topnav">
			 <a class="brand">
			  	<span class="left_topnav">titan </span><span class="right_topnav">gamers</span><span class="center_topnav">admin</span>
			 </a>
	</div>

	<div class="login_wrapper">
	<img src="images/icons/logo.png" alt="Snow" style="width:100%;">
	<div class="container">
					<div class="form-div">
							<form action="index.php" class="form" method="POST" autocomplete="">
									<h2 class="text-center">Login Form</h2>
									<p class="text-center">Login with your email and password.</p>
									<?php
									if(count($errors) > 0){
											?>
											<div class="error-div">
													<?php
													foreach($errors as $showerror){
															echo $showerror;
													}
													?>
											</div>
											<?php
									}
									?>
									<div class="form-group">
											<input class="form-input" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
									</div>
									<div class="form-group">
											<input class="form-input" type="password" name="password" placeholder="Password" required>
									</div>
									<div class="right-link"><a href="forgot-password.php" class="lnks">Forgot password?</a></div>
									<div class="form-group">
											<input type="submit" class="submitBtn" name="login" value="Login">
									</div>
									<div class="center-link">Not yet a member? <a href="signup-user.php" class="lnk">Signup now</a></div>
							</form>
					</div>
			</div>
	 </div>

<!---FOOTER.INC.PHP-->
	<?php  include 'include/footer.inc.php'; ?>
<!--ARROW TO TOP.INC.PHP-->
	<?php include 'include/arrow_to_top.inc.php'; ?>
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
</body>
