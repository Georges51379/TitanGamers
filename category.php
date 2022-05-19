<?php
session_start();
error_reporting(0);
include('db/connection.php');

$catName=$_GET['c'];

if(isset($_GET['action']) && $_GET['action']=="add"){

	//GETTING ID OF THE PRODUCT SHOULD BE FIXED TO NAME
	$pname= $_GET['pname'];

	if(isset($_SESSION['cart'][$pname])){
		$_SESSION['cart']['$pname']['quantity']++;
	}else{
		$prodQuery = mysqli_query($con, "SELECT * FROM products WHERE productName = '$pname'");
		if(mysqli_num_rows($prodQuery)!=0){
			$row_p=mysqli_fetch_array($prodQuery);
			$_SESSION['cart'][$row_p['productName']]=array("quantity" => 1, "price" => $row_p['productPrice']);
				echo "<script>alert('Product has been added to your cart')</script>";
		echo "<script type='text/javascript'> document.location ='titan_cart.php'; </script>";
		}else{
			$message="Product ID is invalid";
		}
	}
}
// COde for Wishlist
if(isset($_GET['p']) && $_GET['action']=="wishlist" ){
	if(strlen($_SESSION['email'])==0)
    {
header('location:login-user.php');
}
else
{

	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$hashedString = '';
	for ($i = 0 ; $i <= 10; $i++){
			$index = rand(0, strlen($characters) - 1);
			$hashedString .= $characters[$index];
	}
	$_SESSION['wishToken'] = $hashedString;

mysqli_query($con,"INSERT INTO wishlist(wishlistToken, userEmail,productName, status)
										VALUES('".$_SESSION['wishToken']."', '".$_SESSION['email']."','".$_GET['p']."', 'Active')");

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

<section class="products_section">
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

					<a href="category.php?page=product&action=add&pname=<?php echo $row['productName']; ?>" class="btn">
						<i class="fa fa-shopping-cart"></i>
					</a>

				<a class="btn" href="category.php?p=<?php echo htmlentities($row['productName'])?>&&action=wishlist" title="Wishlist">
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
