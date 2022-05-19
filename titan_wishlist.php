<?php
session_start();
error_reporting(0);
include('db/connection.php');
if(strlen($_SESSION['email'])==0)
    {
header('location:login-user.php');
}
else{
// Code forProduct deletion from  wishlist
$pname = $_GET['del'];

if(isset($_GET['del']))
{
$query=mysqli_query($con,"UPDATE wishlist SET status = 'Inactive' WHERE productName='$pname'");
}

if(isset($_GET['action']) && $_GET['action']=="add"){
	$p = $_GET['p']; //PRODUCT NAME

	$query=mysqli_query($con,"UPDATE wishlist SET status = 'Inactive' WHERE productName='$p'");
	if(isset($_SESSION['cart'][$p])){
		$_SESSION['cart'][$p]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE productName= '$p' ";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['productName']]=array("quantity" => 1, "price" => $row_p['productPrice']);
header('location:titan_wishlist.php');
}
		else{
			$message="Product ID is invalid";
		}
	}
}

?>

<head>
<!--TITLE SECTION-->
    <title>Titan Gamers | Titan Wishlist</title>
<!--ICON SECTION-->
    <link href="img/icons/logo.png" rel="shortcut icon">
<!--FONT AWESOME CDN SECTION-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!--jQUERY CDN SECTION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="css/titan_wishlist.css" rel="stylesheet">
</head>

<body>
<!--PRODUCTS TOPBAR.INC.PHP SECTION-->
		<?php include 'includes/products_topbar.inc.php'; ?>
<!--PRODUCTS LOGOSEARCH.INC.PHP SECTION-->
		<?php include 'includes/products_search.inc.php'; ?>
<!--PRODUCTS MAINNAVBAR.INC.PHP--->
		<?php include 'includes/products_mainnavbar.inc.php'; ?>


    <div class="titanwishlist_wrapper">
  		<table class="titanwishlist_table">
  			<thead class="titanwishlist_thead">
  				<tr class="titanwishlist_tr">
  					<th colspan="4" class="titanwishlist_th wishlist_title">my wishlist</th>
  				</tr>
  			</thead>
  			<tbody class="titanwishlist_tbody">
  <?php
  $ret=mysqli_query($con,"SELECT products.productName AS pname,products.productImage1 AS pimage,
  products.productPrice AS pprice,products.productPriceBeforeDiscount AS pbdiscount, wishlist.productName AS wishProdName,
  wishlist.wishlistToken AS wishToken FROM wishlist JOIN products ON products.productName = wishlist.productName WHERE status = 'Active' AND
   wishlist.userEmail='".$_SESSION['email']."'");
  $num=mysqli_num_rows($ret);
  	if($num>0)
  	{
  while ($row=mysqli_fetch_array($ret)) {

  ?>

  				<tr class="titanwishlist_tr">
  					<td class="titanwishlist_td"><img src="admin/productimages/<?php echo htmlentities($row['pname']);?>/<?php echo htmlentities($row['pimage']);?>" alt="<?php echo htmlentities($row['pname']);?>" width="60" height="100"></td>
  					<td class="titanwishlist_td">
  						<div class="titanwishlist_productname"><a class="titanwishlist_productname" href="titan_product_details.php?p=<?php echo htmlentities($pd=$row['pname']);?>"><?php echo htmlentities($row['pname']);?></a></div>
  <?php $rt=mysqli_query($con,"SELECT * FROM productreviews WHERE productId='$pd'");
  $num=mysqli_num_rows($rt);
  {
  ?>

  						<div class="titanwishlist_rating">
  							<i class="fa fa-star rate"></i>
  							<i class="fa fa-star rate"></i>
  							<i class="fa fa-star rate"></i>
  							<i class="fa fa-star rate"></i>
  							<i class="fa fa-star non-rate"></i>
  							<span class="titanwishlist_review">( <?php echo htmlentities($num);?> Reviews )</span>
  						</div>
  						<?php } ?>
  						<div class="titanwishlist_price">$
  							<?php echo htmlentities($row['pprice']);?>
  							<span class="titanwishlist_pbdiscount">$<?php echo htmlentities($row['pbdiscount']);?></span>
  						</div>
  					</td>
  					<td class="titanwishlist_td">
  						<a href="titan_wishlist.php?page=product&action=add&p=<?php echo $row['pname']; ?>" class="titanwishlist_btn">Add to cart</a>
  					</td>
  					<td class="titanwishlist_td">
  						<a href="titan_wishlist.php?del=<?php echo htmlentities($row['pname']);?>" onClick="return confirm('Are you sure you want to delete?')" class="titanwishlist_btn"><i class="fa fa-times"></i></a>
  					</td>
  				</tr>
  				<?php } } else{ ?>
  				<tr class="titanwishlist_tr">
  					<td class="titanwishlist_td">Your Wishlist is Empty</td>
  				</tr>
  				<?php } ?>
  			</tbody>
  		</table>
  	</div>
<!--ARROW_TO_TOP.INC.PHP SECTION-->
    <?php include 'includes/arrow_to_top.inc.php'; ?>
<!--FOOTER.INC.PHP SECTION-->
    <?php include 'includes/footer.inc.php'; ?>

</body>
<?php } ?>
