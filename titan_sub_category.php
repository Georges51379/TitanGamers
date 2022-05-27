<?php
session_start();
error_reporting(0);
include('db/connection.php');

$catName=$_GET['c'];
$subcat = $_GET['subCatName'];

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

<head>
<!--TITLE SECTION-->
    <title>Titan Gamers | Sub Category</title>
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

    <div class="subcategory_wrapper">
      <h4 class="subcategory_title"><i class="fa fa-arrow-left"></i></h4>
    </div><br>

<section class="products_section">
		  <?php
			$sql = mysqli_query($con, "SELECT subcategoryName FROM subcategory WHERE subcategoryStatus = 'Active' AND subcategoryToken= '".$_GET['subCatName']."'");
			$row = mysqli_fetch_array($sql);

			$subcategoryname = $row['subcategoryName'];

$ret=mysqli_query($con,"SELECT * FROM products WHERE productStatus = 'Active' AND subcategoryName='$subcategoryname'");
$num=mysqli_num_rows($ret);
if($num>0)
{
while ($row=mysqli_fetch_array($ret))
{?>

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

					<a href="titan_sub_category.php?cpt=<?php echo $row['productToken']; ?>&&action=cart" class="btn">
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
<!--FOOTER.INC.PHP SECTION-->
    <?php include 'includes/footer.inc.php'; ?>
</body>
