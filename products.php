<?php
session_start();
error_reporting(0);
include('db/connection.php');
$catName=$_GET['catName'];

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
	<?php $titleQuery = mysqli_query($con, "SELECT title FROM title WHERE titleStatus = 'active' AND selected = 'Yes' ");
	 			$rw = mysqli_fetch_array($titleQuery);
				$name = $rw['title']; ?>
  <head>
<!--TITLE SECTION-->
    <title><?php echo $name; ?> | Products</title>
<!--ICON SECTION-->
    <link href="img/icons/logo.png" rel="shortcut icon">
<!--FONT AWESOME CDN SECTION-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!--jQUERY CDN SECTION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--PRODUCTS.CSS SECTION-->
		<link href="css/products.css" rel="stylesheet">

		<script>
		function checkCart(){
			$.ajax({
				url: "check/checkCart.php",
				data: "cartToken="+$("$_GET['cpt']"),
				type: "POST",
				success:function(data){
					alert(data);
				}
				error:function(){
					alert(data);
				};
			});
		}
		</script>
</head>

  <body>
		<?php// include 'includes/splashscreen.inc.php'; ?>
<!--PRODUCTS TOPBAR.INC.PHP SECTION-->
			<?php include 'includes/products_topbar.inc.php'; ?>
<!--PRODUCTS LOGOSEARCH.INC.PHP SECTION-->
			<?php include 'includes/products_search.inc.php'; ?>
<!--PRODUCTS MAINNAVBAR.INC.PHP--->
			<?php include 'includes/products_mainnavbar.inc.php'; ?>
<!--SHOPPING CART AND REQUEST PRODUCT-->
			<?php include 'includes/rightbar.inc.php'; ?>
<!--BANNERS.INC.PHP SECTION--->
			<?php include 'includes/productbanners.inc.php'; ?>

			<section class="products_section">
				<h3 class="section_title">newest</h3>

					  <?php
			$ret=mysqli_query($con,"SELECT * FROM products WHERE productStatus='Active' ORDER BY postDate DESC LIMIT 3");
			while ($row=mysqli_fetch_array($ret))
			{?>

				<div class="products_wrapper">
					<div class="product">
						<div class="product_img">
							<a href="titan_product_details.php?prodName=<?php echo ($row['productName']);?>">
								<img class="imgprod" src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" >
							</a>
						</div>

						<div class="product_information">
							<div class="row">
								<div class="prod_details">
									<h3 class="product_name"><a class="productname_link" href="titan_product_details.php?prodName=<?php echo htmlentities($row['productName']);?>">
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
									<?php echo htmlentities($row['productViews']); ?>&nbsp;<i class="fa fa-eye"></i>
								</span>
							</div>

						</div><!---END ROW-->

						<div class="product_action">
						<?php if($row['productAvailability']=='In Stock'){?>

							<a onclick="checkCart()" class="btn" href="products.php?cpt=<?php echo htmlentities($row['productToken']);?>&&action=cart" title="Cart">
								<span id="cartAvailability"></span>
									<i class="fa fa-shopping-cart"></i>
							</a>

							<a class="btn" href="products.php?wpt=<?php echo htmlentities($row['productToken']);?>&&action=wishlist" title="Wishlist">
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
			</section>


			<section class="products_section">
				<h3 class="section_title">most viewed</h3>

				<?php
				$ret=mysqli_query($con,"SELECT * FROM products WHERE productStatus='Active' ORDER BY productViews DESC LIMIT 3");
				while ($row=mysqli_fetch_array($ret))
				{
				?>
				<div class="products_wrapper">
					<div class="product">
						<div class="product_img">
							<a href="titan_product_details.php?prodName=<?php echo ($row['productName']);?>">
								<img class="imgprod" src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" >
							</a>
						</div>

						<div class="product_information">
							<div class="row">
								<div class="prod_details">
									<h3 class="product_name"><a class="productname_link" href="titan_product_details.php?prodName=<?php echo htmlentities($row['productName']);?>">
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
									<?php echo htmlentities($row['productViews']); ?>&nbsp;<i class="fa fa-eye"></i>
								</span>
							</div>

						</div><!---END ROW-->

						<div class="product_action">
						<?php if($row['productAvailability']=='In Stock'){?>

							<a onclick="checkCart()" class="btn" href="products.php?cpt=<?php echo htmlentities($row['productToken']);?>&&action=cart" title="Cart">
								<span id="cartAvailability"></span>
									<i class="fa fa-shopping-cart"></i>
							</a>

							<a class="btn" href="products.php?wpt=<?php echo htmlentities($row['productToken']);?>&&action=wishlist" title="Wishlist">
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
			</section>

			<section class="products_section">
				<h3 class="section_title">featured</h3>

				<?php
				$ret=mysqli_query($con,"SELECT * FROM products WHERE productFeatured=1 AND productStatus='Active' GROUP BY RAND() LIMIT 3");
				while ($row=mysqli_fetch_array($ret))
				{
				?>
				<div class="products_wrapper">
					<div class="product">
						<div class="product_img">
							<a href="titan_product_details.php?prodName=<?php echo ($row['productName']);?>">
								<img class="imgprod" src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" >
							</a>
						</div>

						<div class="product_information">
							<div class="row">
								<div class="prod_details">
									<h3 class="product_name"><a class="productname_link" href="titan_product_details.php?prodName=<?php echo htmlentities($row['productName']);?>">
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
									<?php echo htmlentities($row['productViews']); ?>&nbsp;<i class="fa fa-eye"></i>
								</span>
							</div>

						</div><!---END ROW-->

						<div class="product_action">
						<?php if($row['productAvailability']=='In Stock'){?>

							<a onclick="checkCart()" class="btn" href="products.php?cpt=<?php echo htmlentities($row['productToken']);?>&&action=cart" title="Cart">
								<span id="cartAvailability"></span>
									<i class="fa fa-shopping-cart"></i>
							</a>

							<a class="btn" href="products.php?wpt=<?php echo htmlentities($row['productToken']);?>&&action=wishlist" title="Wishlist">
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
			</section>



			<?php include 'includes/productsfirstbanner.inc.php'; ?>



			<section class="products_section">
				<h3 class="section_title">laptops</h3>

				<?php
				$ret=mysqli_query($con,"SELECT * FROM products WHERE categoryName='laptops' AND productStatus='Active' GROUP BY productPrice DESC LIMIT 3");
				while ($row=mysqli_fetch_array($ret))
				{
				?>
				<div class="products_wrapper">
					<div class="product">
						<div class="product_img">
							<a href="titan_product_details.php?prodName=<?php echo ($row['productName']);?>">
								<img class="imgprod" src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" >
							</a>
						</div>

						<div class="product_information">
							<div class="row">
								<div class="prod_details">
									<h3 class="product_name"><a class="productname_link" href="titan_product_details.php?prodName=<?php echo htmlentities($row['productName']);?>">
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
									<?php echo htmlentities($row['productViews']); ?>&nbsp;<i class="fa fa-eye"></i>
								</span>
							</div>

						</div><!---END ROW-->

						<div class="product_action">
						<?php if($row['productAvailability']=='In Stock'){?>

							<a onclick="checkCart()" class="btn" href="products.php?cpt=<?php echo htmlentities($row['productToken']);?>&&action=cart" title="Cart">
								<span id="cartAvailability"></span>
									<i class="fa fa-shopping-cart"></i>
							</a>

							<a class="btn" href="products.php?wpt=<?php echo htmlentities($row['productToken']);?>&&action=wishlist" title="Wishlist">
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
			</section>


			<section class="products_section">
				<h3 class="section_title">pCs</h3>

				<?php
				$ret=mysqli_query($con,"SELECT * FROM products WHERE categoryName='desktops' AND productStatus='Active' GROUP BY productPrice DESC LIMIT 3");
				while ($row=mysqli_fetch_array($ret))
				{
				?>

				<div class="products_wrapper">
					<div class="product">
						<div class="product_img">
							<a href="titan_product_details.php?prodName=<?php echo ($row['productName']);?>">
								<img class="imgprod" src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" >
							</a>
						</div>

						<div class="product_information">
							<div class="row">
								<div class="prod_details">
									<h3 class="product_name"><a class="productname_link" href="titan_product_details.php?prodName=<?php echo htmlentities($row['productName']);?>">
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
									<?php echo htmlentities($row['productViews']); ?>&nbsp;<i class="fa fa-eye"></i>
								</span>
							</div>

						</div><!---END ROW-->

						<div class="product_action">
						<?php if($row['productAvailability']=='In Stock'){?>

							<a onclick="checkCart()" class="btn" href="products.php?cpt=<?php echo htmlentities($row['productToken']);?>&&action=cart" title="Cart">
								<span id="cartAvailability"></span>
									<i class="fa fa-shopping-cart"></i>
							</a>

							<a class="btn" href="products.php?wpt=<?php echo htmlentities($row['productToken']);?>&&action=wishlist" title="Wishlist">
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
			</section>

			<section class="products_section">
				<h3 class="section_title">accessories</h3>

				<?php
				$ret=mysqli_query($con,"SELECT * FROM products WHERE categoryName='accessories' AND productStatus='Active' GROUP BY productPrice DESC LIMIT 3");
				while ($row=mysqli_fetch_array($ret))
				{
				?>

				<div class="products_wrapper">
					<div class="product">
						<div class="product_img">
							<a href="titan_product_details.php?prodName=<?php echo ($row['productName']);?>">
								<img class="imgprod" src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" >
							</a>
						</div>

						<div class="product_information">
							<div class="row">
								<div class="prod_details">
									<h3 class="product_name"><a class="productname_link" href="titan_product_details.php?prodName=<?php echo htmlentities($row['productName']);?>">
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
									<?php echo htmlentities($row['productViews']); ?>&nbsp;<i class="fa fa-eye"></i>
								</span>
							</div>

						</div><!---END ROW-->

						<div class="product_action">
						<?php if($row['productAvailability']=='In Stock'){?>

							<a onclick="checkCart()" class="btn" href="products.php?cpt=<?php echo htmlentities($row['productToken']);?>&&action=cart" title="Cart">
								<span id="cartAvailability"></span>
									<i class="fa fa-shopping-cart"></i>
							</a>

							<a class="btn" href="products.php?wpt=<?php echo htmlentities($row['productToken']);?>&&action=wishlist" title="Wishlist">
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
</section>

			<?php include 'includes/productssecondbanner.inc.php'; ?>

<!--LAPTOP TYPE SECTION-->

<?php
$sql=mysqli_query($con,"SELECT products.id,products.productName, products.productPrice, products.productPriceBeforeDiscount, products.productImage1, products.productAvailability,
	products.productViews, products.productStatus ,producttype.productName, producttype.productType, producttype.productTypeStatus FROM products
	JOIN producttype on products.productName = producttype.productName WHERE productType='business'");
while($row=mysqli_fetch_array($sql)){
	?>
<section class="products_section">
	<h3 class="section_title"><?php echo htmlentities($row['productType']); ?></h3>



	<div class="products_wrapper">
		<div class="product">
			<div class="product_img">
				<a href="titan_product_details.php?prodName=<?php echo ($row['productName']);?>">
					<img class="imgprod" src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" >
				</a>
			</div>

			<div class="product_information">
				<div class="row">
					<div class="prod_details">
						<h3 class="product_name"><a class="productname_link" href="titan_product_details.php?prodName=<?php echo htmlentities($row['productName']);?>">
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
						<?php echo htmlentities($row['productViews']); ?>&nbsp;<i class="fa fa-eye"></i>
					</span>
				</div>

			</div><!---END ROW-->

			<div class="product_action">
			<?php if($row['productAvailability']=='In Stock'){?>

				<a onclick="checkCart()" class="btn" href="products.php?cpt=<?php echo htmlentities($row['productToken']);?>&&action=cart" title="Cart">
					<span id="cartAvailability"></span>
						<i class="fa fa-shopping-cart"></i>
				</a>

				<a class="btn" href="products.php?wpt=<?php echo htmlentities($row['productToken']);?>&&action=wishlist" title="Wishlist">
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
</section>


<?php
$sql=mysqli_query($con,"SELECT products.id,products.productName, products.productPrice, products.productPriceBeforeDiscount, products.productImage1, products.productAvailability,
	products.productViews, products.productStatus ,producttype.productName, producttype.productType, producttype.productTypeStatus FROM products
	JOIN producttype on products.productName = producttype.productName WHERE productType='convertible'");
while($row=mysqli_fetch_array($sql)){
	?>
<section class="products_section">
	<h3 class="section_title"><?php echo htmlentities($row['productType']); ?></h3>



	<div class="products_wrapper">
		<div class="product">
			<div class="product_img">
				<a href="titan_product_details.php?prodName=<?php echo ($row['productName']);?>">
					<img class="imgprod" src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" >
				</a>
			</div>

			<div class="product_information">
				<div class="row">
					<div class="prod_details">
						<h3 class="product_name"><a class="productname_link" href="titan_product_details.php?prodName=<?php echo htmlentities($row['productName']);?>">
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
						<?php echo htmlentities($row['productViews']); ?>&nbsp;<i class="fa fa-eye"></i>
					</span>
				</div>

			</div><!---END ROW-->

			<div class="product_action">
			<?php if($row['productAvailability']=='In Stock'){?>

				<a onclick="checkCart()" class="btn" href="products.php?cpt=<?php echo htmlentities($row['productToken']);?>&&action=cart" title="Cart">
					<span id="cartAvailability"></span>
						<i class="fa fa-shopping-cart"></i>
				</a>

				<a class="btn" href="products.php?wpt=<?php echo htmlentities($row['productToken']);?>&&action=wishlist" title="Wishlist">
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
</section>


<?php
$sql=mysqli_query($con,"SELECT products.id,products.productName, products.productPrice, products.productPriceBeforeDiscount, products.productImage1, products.productAvailability,
	products.productViews, products.productStatus ,producttype.productName, producttype.productType, producttype.productTypeStatus FROM products
	JOIN producttype on products.productName = producttype.productName WHERE productType='low end gaming'");
while($row=mysqli_fetch_array($sql)){
	?>
<section class="products_section">
	<h3 class="section_title"><?php echo htmlentities($row['productType']); ?></h3>



	<div class="products_wrapper">
		<div class="product">
			<div class="product_img">
				<a href="titan_product_details.php?prodName=<?php echo ($row['productName']);?>">
					<img class="imgprod" src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" >
				</a>
			</div>

			<div class="product_information">
				<div class="row">
					<div class="prod_details">
						<h3 class="product_name"><a class="productname_link" href="titan_product_details.php?prodName=<?php echo htmlentities($row['productName']);?>">
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
						<?php echo htmlentities($row['productViews']); ?>&nbsp;<i class="fa fa-eye"></i>
					</span>
				</div>

			</div><!---END ROW-->

			<div class="product_action">
			<?php if($row['productAvailability']=='In Stock'){?>

				<a onclick="checkCart()" class="btn" href="products.php?cpt=<?php echo htmlentities($row['productToken']);?>&&action=cart" title="Cart">
					<span id="cartAvailability"></span>
						<i class="fa fa-shopping-cart"></i>
				</a>

				<a class="btn" href="products.php?wpt=<?php echo htmlentities($row['productToken']);?>&&action=wishlist" title="Wishlist">
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
</section>


<?php
$sql=mysqli_query($con,"SELECT products.id,products.productName, products.productPrice, products.productPriceBeforeDiscount, products.productImage1, products.productAvailability,
	products.productViews, products.productStatus ,producttype.productName, producttype.productType, producttype.productTypeStatus FROM products
	JOIN producttype on products.productName = producttype.productName WHERE productType='mid end gaming'");
while($row=mysqli_fetch_array($sql)){
	?>
<section class="products_section">
	<h3 class="section_title"><?php echo htmlentities($row['productType']); ?></h3>



	<div class="products_wrapper">
		<div class="product">
			<div class="product_img">
				<a href="titan_product_details.php?prodName=<?php echo ($row['productName']);?>">
					<img class="imgprod" src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" >
				</a>
			</div>

			<div class="product_information">
				<div class="row">
					<div class="prod_details">
						<h3 class="product_name"><a class="productname_link" href="titan_product_details.php?prodName=<?php echo htmlentities($row['productName']);?>">
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
						<?php echo htmlentities($row['productViews']); ?>&nbsp;<i class="fa fa-eye"></i>
					</span>
				</div>

			</div><!---END ROW-->

			<div class="product_action">
			<?php if($row['productAvailability']=='In Stock'){?>

				<a onclick="checkCart()" class="btn" href="products.php?cpt=<?php echo htmlentities($row['productToken']);?>&&action=cart" title="Cart">
					<span id="cartAvailability"></span>
						<i class="fa fa-shopping-cart"></i>
				</a>

				<a class="btn" href="products.php?wpt=<?php echo htmlentities($row['productToken']);?>&&action=wishlist" title="Wishlist">
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
</section>


<?php
$sql=mysqli_query($con,"SELECT products.id,products.productName, products.productPrice, products.productPriceBeforeDiscount, products.productImage1, products.productAvailability,
	products.productViews, products.productStatus ,producttype.productName, producttype.productType, producttype.productTypeStatus FROM products
	JOIN producttype on products.productName = producttype.productName WHERE productType='high end gaming'");
while($row=mysqli_fetch_array($sql)){
	?>
<section class="products_section">
	<h3 class="section_title"><?php echo htmlentities($row['productType']); ?></h3>



	<div class="products_wrapper">
		<div class="product">
			<div class="product_img">
				<a href="titan_product_details.php?prodName=<?php echo ($row['productName']);?>">
					<img class="imgprod" src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" >
				</a>
			</div>

			<div class="product_information">
				<div class="row">
					<div class="prod_details">
						<h3 class="product_name"><a class="productname_link" href="titan_product_details.php?prodName=<?php echo htmlentities($row['productName']);?>">
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
						<?php echo htmlentities($row['productViews']); ?>&nbsp;<i class="fa fa-eye"></i>
					</span>
				</div>

			</div><!---END ROW-->

			<div class="product_action">
			<?php if($row['productAvailability']=='In Stock'){?>

				<a onclick="checkCart()" class="btn" href="products.php?cpt=<?php echo htmlentities($row['productToken']);?>&&action=cart" title="Cart">
					<span id="cartAvailability"></span>
						<i class="fa fa-shopping-cart"></i>
				</a>

				<a class="btn" href="products.php?wpt=<?php echo htmlentities($row['productToken']);?>&&action=wishlist" title="Wishlist">
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
</section>



<?php
$sql=mysqli_query($con,"SELECT products.id,products.productName, products.productPrice, products.productPriceBeforeDiscount, products.productImage1, products.productAvailability,
	products.productViews, products.productStatus ,producttype.productName, producttype.productType, producttype.productTypeStatus FROM products
	JOIN producttype on products.productName = producttype.productName WHERE productType='desktop replacement'");
while($row=mysqli_fetch_array($sql)){
	?>
<section class="products_section">
	<h3 class="section_title"><?php echo htmlentities($row['productType']); ?></h3>


	<div class="products_wrapper">
		<div class="product">
			<div class="product_img">
				<a href="titan_product_details.php?prodName=<?php echo ($row['productName']);?>">
					<img class="imgprod" src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" >
				</a>
			</div>

			<div class="product_information">
				<div class="row">
					<div class="prod_details">
						<h3 class="product_name"><a class="productname_link" href="titan_product_details.php?prodName=<?php echo htmlentities($row['productName']);?>">
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
						<?php echo htmlentities($row['productViews']); ?>&nbsp;<i class="fa fa-eye"></i>
					</span>
				</div>

			</div><!---END ROW-->

			<div class="product_action">
			<?php if($row['productAvailability']=='In Stock'){?>

				<a onclick="checkCart()" class="btn" href="products.php?cpt=<?php echo htmlentities($row['productToken']);?>&&action=cart" title="Cart">
					<span id="cartAvailability"></span>
						<i class="fa fa-shopping-cart"></i>
				</a>

				<a class="btn" href="products.php?wpt=<?php echo htmlentities($row['productToken']);?>&&action=wishlist" title="Wishlist">
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
</section>

<!--ARROW_TO_TOP.INC.PHP SECTION-->
      <?php include 'includes/arrow_to_top.inc.php';?>
<!--FOOTER.INC.PHP SECTION-->
      <?php include 'includes/footer.inc.php'; ?>

  </body>
</html>
