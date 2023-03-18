<?php
session_start();
error_reporting(0);
require "db/connection.php";

$pname = $_GET['p'];

//CODE FOR ADD TO CART
if(isset($_GET['cpt']) && $_GET['action']=="cart" ){

	$_SESSION['cproducttoken'] = $_GET['cpt'];

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
    <title>Titan Gamers | Product Details</title>
		<?php include 'header/head.inc.php'; ?>

</head>

<body>
	<!--PRODUCTS navbar.INC.PHP--->
			<?php include 'navbar/productsnavbar.inc.php'; ?>

	<?php

	$filterQuery = mysqli_query($con,"SELECT categoryName, subcategoryName FROM products
									WHERE productName = '".$_GET['p']."'");
		$rw = mysqli_fetch_array($filterQuery);

		$cat = $rw['categoryName'];
		$sub = $rw['subcategoryName'];
	 ?>

	<?php
	$query=mysqli_query($con,"SELECT * FROM products WHERE productName='$pname'");
	while($row=mysqli_fetch_array($query))
	{
	?>
<div class="product_wrapper">
			<div class="top_product_section">
				<div class="product_imgs">
				<div class="prodimg" id="slide1">
					<a data-title="<?php echo htmlentities($row['productName']);?>">
						 <img class="img1" src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>"/>
					</a>
				</div>

				 <div class="prodimg " id="slide2">
				 	<a data-title="<?php echo htmlentities($row['productName']);?>">
						 <img class="img2" src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage2']);?>"/>
					</a>

					 <a data-title="<?php echo htmlentities($row['productName']);?>">
					 	<img class="img3" src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage3']);?>"/>
					 </a>
				</div>
			</div><!--product_imgs-->


		<div class="rightsidepro_info">
				<h1 class="name"><?php echo htmlentities($row['productName']);?></h1>

			<div class="product_availability">
					<div class="label">
						<span class="label">Availability :</span>
					</div>

					<div class="valuefromdb">
						<span class="value"><?php echo htmlentities($row['productAvailability']);?></span>
					</div>
			</div><!--PRODUCT AVAILABILITY-->

			<br>
			<div class="product_brand">
					<div class="label">
							<span class="label">Product Brand :</span>
					</div>
					<div class="valuefromdb">
							<span class="value"><a target="_blank" class="companyURL-link" href="<?php echo htmlentities($row['productCompanyURL']); ?>"><?php echo htmlentities($row['productCompany']);?></a></span>
				  </div>
			</div><!--PRODUCT BRAND-->

			<br>
			<div class="product_shippingcharge">
									<div class="label">
										<span class="label">Shipping Charge :</span>
									</div>
									<div class="valuefromdb">
										<span class="value"><?php if($row['shippingCharge']==0)
										{
											echo "Free";
										}
										else
										{
											echo htmlentities($row['shippingCharge']);
										}
										?></span>
									</div>
			</div><!--PRODUCT SHIPPING CHARGE SECTION -->
			<br>
						<div class="product_price">
							<div class="label">
								<span class="label">price :</span>
							</div>
							<div class="valuefromdb">
										<span class="price">$<?php echo htmlentities($row['productPrice']);?></span>
										<span class="price_before_discount">$<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>
							</div>
						</div><!--END PRODUCT PRICE -->
			<br>

			<!--QUANTITY SECTION-->
						<div class="product_quantity">
								<div class="label">
									<span class="label">Quantity:</span>
								</div>
								<div class="valuefromdb">
										<input type="number" value="1" step="1" min="1" max="2" oninput="validity.valid||(value='');"/>
								</div>
							</div>
			<!--QUANTITY SECTION-->
			<br>
			<div class="product_action">
								<?php if($row['productAvailability']=='In Stock'){?>
							<a href="titan_product_details.php?page=product&action=cart&cpt=<?php echo $row['productToken']; ?>" class="btn">
							<i class="fa fa-shopping-cart"></i>
						</a>

						<a class="btn" href="titan_product_details.php?wpt=<?php echo htmlentities($row['productToken'])?>&&action=wishlist" title="Wishlist">
							<i class="fa fa-heart"></i>
						</a>
						<?php } else {?>
							<div class="btn">Out of Stock</div>
								<?php } ?>

			</div><!--END PRODUCT ACTION-->
			<br>
		<!--SHARE ON SM SECTION-->
			<div class="product_share">
				<span class="label">Share :</span>
					<div class="social_icons">
						<ul class="icons_list">
							<li class="icons_li"><a class="icon fb fa fa-facebook" target="_blank" href="https://facebook.com"></a></li>
							<li class="icons_li"><a class="icon insta fa fa-instagram" target="_blank" href="https://instagram.com"></a></li>
							<li class="icons_li"><a class="icon yt fa fa-youtube" target="_blank" href="https://youtube.com"></a></li>
							<li class="icons_li"><a class="icon wtp fa fa-whatsapp" target="_blank" href="https://whatsapp.com"></a></li>
			 			</ul><!--ICONS LIST-->
					</div><!--SOCIAL ICONS-->
			</div><!--PRODUCT SHARE-->
		</div><!---END PRODUCT_IMGS TAG-->
</div><!--top_product_section-->


<!--START OF THE PRODUCTS REVIEWW AND DESCRIPTION SECTION---->
	<div class="product_description_wrapper"><!--MISSING END OF DIV-->

		<div class="review_wrapper">
			<ul class="review_description_list">
				<li class="active review_description_li" class="review">
					<a class="review_description_links" href="#description">description</a>
				</li>
				<li class="review_description_li">
					<a class="review_description_links" href="#relatedProducts">related products</a>
				</li>
			</ul><!--END PRODUCT _REVIEW-->
		</div>

		<div class="product_description" id="description">
			<p class="description"><span class="review_title">description<br></span><?php echo $row['productDescription'];?></p>
		</div>
<!--END OF THE PRODUCTS REVIEWW SECTION-->

</div><!--END PRODUCT DESCRIPTION WRAPPER-->
			<?php $cid=$row['category'];
						$subcid=$row['subcategory']; } ?>
</div><!--END PRODUCT WRAPPER-->



<!--START HOT DEALS-->
<section class="products_section">
		<h3 class="related_title" id="relatedProducts">related products</h3>

<?php
$query=mysqli_query($con,"SELECT * FROM products WHERE  categoryName='$cat' AND subcategoryName='$sub'  AND productName != '".$_GET['p']."'");
$numrws = mysqli_num_rows($query);
if($numrws === 0){
		?>
			<div class="btn_details">No Products Found</div>
<?php } else{ ?>

<?php
while($r=mysqli_fetch_array($query))
{

			?>
			<div class="products_wrapper">
				<div class="product">
					<div class="product_img">
						<a href="titan_product_details.php?p=<?php echo htmlentities($r['productName']);?>">
							<img class="imgprod" src="admin/productimages/<?php echo htmlentities($r['productName']);?>/<?php echo htmlentities($r['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($r['productName']);?>/<?php echo htmlentities($r['productImage1']);?>" >
						</a>
					</div>

					<div class="product_information">
						<div class="row">
							<div class="prod_details">
								<h3 class="product_name"><a class="productname_link" href="titan_product_details.php?p=<?php echo htmlentities($r['productName']);?>">
									<?php echo htmlentities($r['productName']);?></a>
								</h3>

								<div class="product_price">
									<span class="price">

									<span class="original_price">
											$<?php echo htmlentities($r['productPrice']);?>
									</span>
									<span class="price_before_discount">$<?php echo htmlentities($r['productPriceBeforeDiscount']);?>

									</span>

								</span>
								</div>
							</div><!--END DIV PROD_DETAILS-->

						<div class="product_views">
							<span class="views">
								<?php echo htmlentities($r['productViews']); ?><i class="fa fa-eye"></i>
							</span>
						</div>
					</div><!---END ROW-->

					<div class="product_action">
					<?php if($r['productAvailability']=='In Stock'){?>

							<a href="category.php?page=product&action=add&id=<?php echo $r['id']; ?>" class="btn_details">
								<i class="fa fa-shopping-cart"></i>
							</a>

						<a class="btn_details" href="category.php?pid=<?php echo htmlentities($r['id'])?>&&action=wishlist" title="Wishlist">
						<i class="fa fa-heart"></i>
						</a>
					</div>

				<?php } else {?>
							<div class="btn_details">Out of Stock</div>
						<?php } ?>
					</div><!--PRODUCT INFORMATION--->

				</div><!--END PRODUCT-->
			</div><!--END PRODUCTS WRAPPER-->

		<?php }} ?>
	</section><br><br>


<!--END HOT DEALS-->

<!--ARROW_TO_TOP.INC.PHP SECTION-->
    <?php include 'includes/arrow_to_top.inc.php'; ?>
<!--FOOTER.INC.PHP SECTION-->
    <?php include 'includes/footer.inc.php'; ?>
		<script src="js/navbars.js"></script>
</body>
