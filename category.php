<?php
session_start();
error_reporting(0);
include('db/connection.php');

$catName=$_GET['c'];

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

$titleQuery = mysqli_query($con, "SELECT title FROM title WHERE titleStatus = 'active' AND selected = 'Yes' ");
		 $rw = mysqli_fetch_array($titleQuery);
		 $name = $rw['title'];
?>
<head>
	<!--TITLE SECTION-->
		<title><?php echo $name; ?> | Category</title>
		<?php include 'header/head.inc.php'; ?>
</head>

<body>
	<!--PRODUCTS navbar.INC.PHP--->
				<?php include 'navbar/productsnavbar.inc.php'; ?>

    <div class="subcategory_wrapper">
      <h4 class="subcategory_title">sub category</h4>
      <nav class="subacategory_nav">
        <ul class="subcategory_list">
          <li class="subacategory_li">
            <?php $sql=mysqli_query($con,"SELECT subcategoryToken, subcategoryName FROM subcategory WHERE subcategoryStatus = 'Active' AND categoryToken='".$_GET['c']."' ");
while($row=mysqli_fetch_array($sql))
{
  ?>
              <a href="titan_sub_category.php?subCatName=<?php echo $row['subcategoryToken'];?>" class="subcategory_link" style="display:hidden;"><i class="fa fa-product-hunt"></i>
              <?php echo $row['subcategoryName'];?></a>
              <?php }?>
            </li>
        </ul>
      </nav>
    </div>

<section class="cards">
		  <?php
			$sql = mysqli_query($con, "SELECT categoryName FROM category WHERE categoryStatus = 'Active' AND categoryToken= '".$_GET['c']."'");
			$row = mysqli_fetch_array($sql);
			$categoryname = $row['categoryName'];

$ret=mysqli_query($con,"SELECT * FROM products WHERE productStatus = 'Active' AND categoryName='$categoryname'");
$num=mysqli_num_rows($ret);
if($num>0)
{
while ($row=mysqli_fetch_array($ret))
{?>

	<div class="card">

		<div class="caaard">
			<div class="product-img">
				<a href="titan_product_details.php?p=<?php echo htmlentities($row['productName']);?>">
					<img class="imgprod" src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" >
				</a>
			</div>

			<div class="product-information">
				<div class="row">
					<div class="prod-details">
						<h3 class="product_name"><a class="productname_link" href="titan_product_details.php?p=<?php echo htmlentities($row['productName']);?>">
							<?php echo htmlentities($row['productName']);?></a>
						</h3>

						<div class="product-price">
							<span class="price">

							<span class="original_price">
									$<?php echo htmlentities($row['productPrice']);?>
							</span>
							<span class="price_before_discount">$<?php echo htmlentities($row['productPriceBeforeDiscount']);?>

							</span>

						</span>
						</div>
					</div><!--END DIV PROD_DETAILS-->

				<div class="product-views">
					<span class="views">
						<?php echo htmlentities($row['productViews']); ?><i class="fa fa-eye"></i>
					</span>
				</div>
			</div><!---END ROW-->

			<div class="product-action">
			<?php if($row['productAvailability']=='In Stock'){?>

					<a href="category.php?cpt=<?php echo htmlentities($row['productToken']); ?>&&action=cart" class="btn">
						<i class="fa fa-shopping-cart"></i>
					</a>

				<a class="btn" href="category.php?wpt=<?php echo htmlentities($row['productToken']); ?>&&action=wishlist" title="Wishlist">
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
