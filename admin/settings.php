<?php
session_start();
include('db/connection.php');
if(strlen($_SESSION['email'])==0)
	{
header('location:index.php');
}
else{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Titan Gamers | Settings</title>
    <link rel="stylesheet" href="css/admin.css">
    <link href="images/icons/logo.png" rel="shortcut icon">
    <!--FONT AWESOME CDN SECTION-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--jQUERY CDN SECTION-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>

<body>
  <?php include('include/sidebar.inc.php');?>

	<center>
		<div class="container">
			<div class="titlewrapper">
         <div class="titlewrapper">
              <h3 class="title">settings</h3>
              <h4 class="subtitle"><a href="title.php" class="subtitle-link">Title</a></h4>
              <h4 class="subtitle"><a href="#logo" class="subtitle-link">Logo</a></h4>
            	<h4 class="subtitle"><a href="#navbar" class="subtitle-link">navbar</a></h4>
              <h4 class="subtitle"><a href="#in-web-banners" class="subtitle-link">in web banners</a></h4>
              <h4 class="subtitle"><a href="#footer" class="subtitle-link">footer</a></h4>
          </div>
			</div>
		</div>
</center>

    <?php include('include/footer.inc.php');?>
    <?php include 'include/arrow_to_top.inc.php'; ?>


</body>
<?php } ?>
</html>
