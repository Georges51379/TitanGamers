<?php
session_start();
include('db/connection.php');
if(strlen($_SESSION['ad_email'])==0)
	{
header('location:index.php');
}
else{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Titan Gamers | Dashboard</title>
    <link rel="stylesheet" href="css/sidebar.css">
    <link href="images/icons/logo.png" rel="shortcut icon">
    <!--FONT AWESOME CDN SECTION-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--jQUERY CDN SECTION-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>

<body>
  <?php include('include/sidebar.inc.php');?>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">

                      <div class="titlewrapper">
                        <h3 class="title">dashboard</h3>
                      </div>

          <?php include('include/footer.inc.php');?>
          <?php include 'include/arrow_to_top.inc.php'; ?>

</body>
<?php } ?>
</html>
