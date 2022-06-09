  <?php
  session_start();
  error_reporting(0);
  include('db/connection.php');

  $catName=$_GET['c'];
  $subcat = $_GET['subCatName'];

  //code for CUSTOM DESKTOPS
  $q = mysqli_query($con, "SELECT subcategoryName FROM subcategory WHERE subcategoryToken = '".$_GET['subCatName']."'");
  $rws = mysqli_fetch_array($q);

  $subcatn = $rws['subcategoryName'];

  if($subcatn === 'custom desktops')
  {
  	header('location:titan_customDesktops.php');
  }
  //CODE FOR ADD TO CART
  if(isset($_GET['cpt']) && $_GET['action']=="cart" ){

  	$_SESSION['cproducttoken'] = $_GET['cpt'];

  	$getInfoToCart = mysqli_query($con, "SELECT * FROM products WHERE productToken = '".$_SESSION['cproducttoken']."'");
  	$rws = mysqli_fetch_array($getInfoToCart);

  	$productPrice = $rws['productPrice'];
  	$shippingCharge = $rws['shippingCharge'];

  	$_SESSION['carToken'] = bin2hex(random_bytes(20));

  	mysqli_query($con, "INSERT INTO cart(cartToken, userEmail, productToken, status, quantity, price, shippingCharge)
  										VALUES('".$_SESSION['carToken']."', '".$_SESSION['email']."','".$_SESSION['cproducttoken']."', 'Active', 1, '$productPrice', '$shippingCharge')");

  	echo "<script>alert('Product added into your CART');</script>";
  	header('location:titan_cart.php');
  }
  // COde for Wishlist
  if(isset($_GET['wpt']) && $_GET['action']=="wishlist" ){

  		$_SESSION['wproducttoken'] = $_GET['wpt'];

  	if(strlen($_SESSION['email'])==0)
      {
  header('location:login-user.php');
  }
  else
  {
  $wishToken = bin2hex(random_bytes(20));;

  mysqli_query($con,"INSERT INTO wishlist(wishToken, userEmail,productToken, status)
  										VALUES('$wishToken', '".$_SESSION['email']."','".$_SESSION['wproducttoken']."', 'Active')");

  echo "<script>alert('Product added into your wishlist');</script>";
  header('location:titan_wishlist.php');
  }
  }

  ?>
<html>
  <head>
  <!--TITLE SECTION-->
      <title>Titan Gamers | Custom Desktops</title>
  <!--ICON SECTION-->
      <link href="img/icons/logo.png" rel="shortcut icon">
  <!--FONT AWESOME CDN SECTION-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <!--jQUERY CDN SECTION-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  		<link href="css/products.css" rel="stylesheet">
  </head>

  <body>
  <!--PRODUCTS TOPBAR.INC.PHP SECTION-->
  		<?php include 'includes/products_topbar.inc.php'; ?>
  <!--PRODUCTS LOGOSEARCH.INC.PHP SECTION-->
  		<?php include 'includes/products_search.inc.php'; ?>
  <!--PRODUCTS MAINNAVBAR.INC.PHP--->
  		<?php include 'includes/products_mainnavbar.inc.php'; ?>

      <div style="
        background-color: black;
        color: white;
        margin-top: 3%;
        left: 0;
        right: 0;
        height: 50px;
        z-index: 100;
      ">header</div>

      <div style="
        background-color: green;
        color: white;
        left: 0;
        bottom: 10%;
        top: 50%;
        width: 10%;
        display: block;">
        Components
        sd
        sf
        sd

        we
        sd
        ew
         ?>
      </div>




  <!--ARROW_TO_TOP.INC.PHP SECTION-->
        <?php include 'includes/arrow_to_top.inc.php'; ?>
  <!--FOOTER.INC.PHP SECTION-->
        <?php include 'includes/footer.inc.php'; ?>
  </body>
</html>
