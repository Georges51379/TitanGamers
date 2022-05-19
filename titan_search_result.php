<?php
session_start();
error_reporting(0);
include('db/connection.php');
$find="%{$_POST['product']}%";
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
						echo "<script>alert('Product has been added to your cart')</script>";
		echo "<script type='text/javascript'> document.location ='titan_cart.php'; </script>";
		}else{
			$message="Product ID is invalid";
		}
	}
}
// COde for Wishlist
if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){
	if(strlen($_SESSION['login'])==0)
    {
header('location:titan_login.php');
}
else
{
mysqli_query($con,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','".$_GET['pid']."')");
echo "<script>alert('Product added into your wishlist');</script>";
header('location:titan_wishlist.php');

}
}
?>

<head>
<!--TITLE SECTION-->
    <title>Titan Gamers | Category</title>
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


<section class="products_section searchContainer">
  <?php
$ret=mysqli_query($con,"select * from products where productName like '$find'");
$num=mysqli_num_rows($ret);
if($num>0)
{
while ($row=mysqli_fetch_array($ret))
{?>
	<div class="products_wrapper">
		<div class="product">
			<div class="product_img">
    		<a href="titan_product_details.php?pid=<?php echo htmlentities($row['id']);?>">
					<img class="imgprod" src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" alt=""></a>
  		</div><!--product image-->

<div class="product_information">
	<div class="row">
		<div class="prod_details">
		  <h3 class="product_name">
				<a class="productname_link" href="titan_product_details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a>
			</h3>
  <div class="product_price">
		<span class="price">

		<span class="original_price">
      $ <?php echo htmlentities($row['productPrice']);?>
		</span>
    	<span class="price_before_discount">$<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>

		</span><!--END PRICE-->
  </div><!--product_price -->
</div><!--END DIV PROD_DETAILS-->

<div class="product_views">
	<span class="views">
		<?php echo htmlentities($row['productViewers']); ?><i class="fa fa-eye"></i>
	</span>
</div>
</div><!--END ROW-->


<div class="product_action">
<?php if($row['productAvailability']=='In Stock'){?>
		<a href="category.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="btn">
			<i class="fa fa-shopping-cart"></i>
		</a>
	<a class="btn" href="category.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist" title="Wishlist">
	<i class="icon fa fa-heart"></i>
	</a>
</div>

<?php } else {?>
		<div class="btn">Out of Stock</div>
	<?php } ?>
	</div><!--PRODUCT INFORMATION--->
</div><!--END product-->
</div><!--END products_wrapper-->
<?php } ?>
<?php } ?>
</section><!--END products_section -->

<!--ARROW_TO_TOP.INC.PHP SECTION-->
    <?php include 'includes/arrow_to_top.inc.php'; ?>
<!--FOOTER.INC.PHP SECTION-->
    <?php include 'includes/footer.inc.php'; ?>
</body>
