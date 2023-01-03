<?php
session_start();
error_reporting(0);
include('db/connection.php');

if(isset($_GET['del'])){
  $pcctdel = $_GET['del'];

  $deleteCartQuery = mysqli_query($con,"UPDATE cart SET cartStatus = 'Inactive' WHERE cartToken = '$pcctdel'");
}
?>
<head>
<!--TITLE SECTION-->
    <title>Titan Gamers | Cart</title>
	<?php include 'header/head.inc.php'; ?>

	<script language="javascript" type="text/javascript">
  var popUpWin=0;
  function popUpWindow(URLStr, left, top, width, height)
  {
   if(popUpWin)
  {
  if(!popUpWin.closed) popUpWin.close();
  }
  popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
  }

  </script>


</head>

<body>
<!--PRODUCTS navbar.INC.PHP--->
		<?php include 'navbar/productsnavbar.inc.php'; ?>

	<div class="titanwishlist_wrapper">
<?php
	$cartQuery = mysqli_query($con, "SELECT cart.*, products.*
	 FROM cart LEFT JOIN products ON
	 cart.productToken = products.productToken WHERE cart.cartStatus = 'Active' ORDER BY cart.cartDate ASC");
	if(mysqli_num_rows($cartQuery)> 0 ){
		while($cartrws = mysqli_fetch_array($cartQuery)){
			$cartNumber = $cartrws['cartCode'];
?>

<div class="card">
	<img class="imgprod" src="admin/productimages/<?php echo htmlentities($cartrws['productName']);?>/<?php echo htmlentities($cartrws['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($cartrws['productName']);?>/<?php echo htmlentities($cartrws['productImage1']);?>" >
	<h1><?php echo htmlentities($cartrws['productName']); ?></h1>
	<p class="price">$<?php echo htmlentities($cartrws['productPrice']); ?></p>
	<p><?php echo htmlentities($cartrws['productDescription']); ?></p>
	<p><a href="titan_cart_details.php?pcct=<?php echo htmlentities($cartrws['cartToken']); ?>">
				go to this cart
		 	</a><br>
      <a href="titan_cart.php?del=<?php echo htmlentities($cartrws['cartToken']); ?>" onClick="return confirm('Are you sure you want to delete?')">
    			Delete
       </a>
	</p>
</div>



<?php }}?>
	</div>

<!--ARROW_TO_TOP.INC.PHP SECTION-->
    <?php include 'includes/arrow_to_top.inc.php'; ?>
<!--FOOTER.INC.PHP SECTION-->
    <?php include 'includes/footer.inc.php'; ?>
		<script src="js/navbars.js"></script>
</body>
