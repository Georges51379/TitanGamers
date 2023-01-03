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

	if(strlen($_SESSION['email'])==0)
{
header('location:login-user.php');
}
else
{

	$getInfoToCart = mysqli_query($con, "SELECT * FROM products WHERE productToken = '".$_SESSION['cproducttoken']."'");
	$rws = mysqli_fetch_array($getInfoToCart);

	$price = $rws['productPrice'];
	$shippingCharge = $rws['shippingCharge'];

	$_SESSION['carToken'] = bin2hex(random_bytes(20));
	$cartCode = rand(9999999999, 1111111111);

	$checkCartCode = mysqli_query($con, "SELECT cartCode FROM cart WHERE productToken = '".$_SESSION['cproducttoken']."' AND userEmail ='".$_SESSION['email']."'");
	$cartCoderws = mysqli_fetch_array($checkCartCode);

	$cartCodeFromDB = $cartCoderws['cartCode'];

	if($cartCodeFromDB === $cartCode){ //CHECK IF CART CODE ALREADY EXISTS
		$generatedCartCode = rand(9999999999, 1111111111);
		mysqli_query($con, "INSERT INTO cart(cartCode,cartToken, userEmail, productToken, cartStatus,isCartEmpty ,quantity, price, shippingCharge)
										VALUES('$generatedCartCode','".$_SESSION['carToken']."', '".$_SESSION['email']."','".$_SESSION['cproducttoken']."', 'Active','No',1,'$price','$shippingCharge')");

	echo "<script>alert('Product added into your CART');</script>";
	header('location:titan_cart.php');
	}else{

	mysqli_query($con, "INSERT INTO cart(cartCode,cartToken, userEmail, productToken, cartStatus,isCartEmpty ,quantity, price, shippingCharge)
										VALUES('$cartCode','".$_SESSION['carToken']."', '".$_SESSION['email']."','".$_SESSION['cproducttoken']."', 'Active','No',1,'$price','$shippingCharge')");

	echo "<script>alert('Product added into your CART');</script>";
	header('location:titan_cart.php');
	}
}
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

mysqli_query($con,"INSERT INTO wishlist(wishToken, userEmail,productToken, tokenStatus)
									VALUES('$wishToken', '".$_SESSION['email']."','".$_SESSION['wproducttoken']."', 'Active')");

echo "<script>alert('Product added into your wishlist');</script>";
header('location:titan_wishlist.php');
}
}
?>

<head>
<!--TITLE SECTION-->
    <title>Titan Gamers | Sub Category</title>
	<?php include 'header/head.inc.php'; ?>
</head>

<body>
	<!--PRODUCTS navbar.INC.PHP--->
		<?php include 'navbar/productsnavbar.inc.php'; ?>

		<?php
		$catQuery = mysqli_query($con, "SELECT categoryToken FROM subcategory WHERE subcategoryToken = '".$_GET['subCatName']."'");
		$rws = mysqli_fetch_array($catQuery);
		 ?>

    <div class="subcategory_wrapper">
      <h4 class="subcategory_title"><a class="arrow-back-link" href="category.php?c=<?php echo htmlentities($rws['categoryToken']);?>" ><i class="fa fa-arrow-left"></i></a></h4>
    </div><br>

<section class="products_section">
		  <?php

			$subcatQuery = mysqli_query($con,"SELECT subcategoryName FROM subcategory WHERE subcategoryToken = '".$_GET['subCatName']."'");
			$rw = mysqli_fetch_array($subcatQuery);

			$subcatname = $rw['subcategoryName'];

$ret=mysqli_query($con,"SELECT * FROM products WHERE productStatus = 'Active' AND subcategoryName='$subcatname'");
$num=mysqli_num_rows($ret);
if($num>0)
{
while ($row=mysqli_fetch_array($ret))
{
	?>

	<div class="products_wrapper">

		<div class="product">
			<div class="product_img">
				<a href="titan_product_details.php?p=<?php echo htmlentities($row['productName']);?>">
					<img class="imgprod" src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" >
				</a>
			</div>


			<div class="product_information">
				<div class="row">
					<div class="prod_details">
						<h3 class="product_name"><a class="productname_link" href="titan_product_details.php?p=<?php echo htmlentities($row['productName']);?>">
							<?php echo htmlentities($row['productName']);?></a>
						</h3>

						<div class="product_price">
							<span class="price">

							<span class="original_price">
									$<?php echo htmlentities($row['productPrice']);?>
							</span>
							<span class="price_before_discount">$<?php echo htmlentities($row['productPriceBeforeDiscount']);?>

							</span>

						</span>
						</div>
					</div><!--END DIV PROD_DETAILS-->

				<div class="product_views">
					<span class="views">
						<?php echo htmlentities($row['productViewers']); ?><i class="fa fa-eye"></i>
					</span>
				</div>
			</div><!---END ROW-->

			<div class="product_action">
			<?php if($row['productAvailability']=='In Stock'){?>

					<a onClick="checkCart()" name="cartToken" id="cartToken" href="titan_sub_category.php?cpt=<?php echo $row['productToken']; ?>&&action=cart" class="btn">
						<i class="fa fa-shopping-cart"></i>
					</a>

				<a class="btn" href="titan_sub_category.php?wpt=<?php echo htmlentities($row['productToken'])?>&&action=wishlist" title="Wishlist">
				<i class="fa fa-heart"></i>
				</a>
			</div>

		<?php } else {?>
					<div class="btn">Out of Stock</div>
				<?php } ?>
			</div><!--PRODUCT INFORMATION--->

		</div><!--END PRODUCT-->

	</div><!--END PRODUCTS WRAPPER-->

<?php } ?>
<?php } ?>
</section>


<!--ARROW_TO_TOP.INC.PHP SECTION-->
<?php include 'includes/arrow_to_top.inc.php'; ?>
<?php include 'includes/footer.inc.php'; ?>
<script src="js/navbars.js"></script>
</body>
