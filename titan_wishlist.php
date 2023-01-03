<?php
session_start();
error_reporting(0);
include('db/connection.php');
if(strlen($_SESSION['email'])==0)
    {
header('location:login-user.php');
}
else{
	$ptdel = $_GET['del'];
	$WISHpRODtOKEN = $_GET['wishtoCartpt'];

	if(isset($_GET['del']))
	{
	$query=mysqli_query($con,"UPDATE wishlist SET tokenStatus = 'Inactive' WHERE productToken='$ptdel'");
	}

	if(isset($_GET['action']) && $_GET['action']=="cart"){ //ADD TO CART FROM WISHLIST

		$query=mysqli_query($con,"UPDATE wishlist SET tokenStatus = 'Inactive' 
		WHERE productToken='$WISHpRODtOKEN' ");

		$_SESSION['carToken'] = bin2hex(random_bytes(20));
		
		mysqli_query($con, "INSERT INTO cart(cartToken, userEmail, productToken, cartStatus, quantity, price, shippingCharge)
										VALUES('".$_SESSION['carToken']."', '".$_SESSION['email']."','$WISHpRODtOKEN', 'Active', 1, 'NULL', 'NULL')");

		echo "<script>alert('Product added into your CART');</script>";
		header('location:titan_cart.php');
		
	}
?>
<html>
	<head>
<!--TITLE SECTION-->
    <title>Titan Gamers | Wishlist</title>
	<?php include 'header/head.inc.php'; ?>
</head>

<body>
<!--PRODUCTS navbar.INC.PHP--->
	<?php include 'navbar/productsnavbar.inc.php'; ?>

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
products.productToken AS productToken,
products.productPrice AS pprice,products.productPriceBeforeDiscount AS pbdiscount, 
wishlist.productToken AS wishProdToken, wishlist.wishToken AS wishToken 
FROM wishlist JOIN products
 ON products.productToken = wishlist.productToken 
 WHERE 
 tokenStatus = 'Active' AND
 wishlist.userEmail='".$_SESSION['email']."'");
$num=mysqli_num_rows($ret);
	if($num>0)
	{
while ($row=mysqli_fetch_array($ret)) {
?>
			  <tr class="titanwishlist_tr">
  					<td class="titanwishlist_td">
              <img src="admin/productimages/<?php echo htmlentities($row['pname']);?>/<?php echo htmlentities($row['pimage']);?>" alt="<?php echo htmlentities($row['pname']);?>" width="60" height="100"></td>
  					<td class="titanwishlist_td">
  						<div class="titanwishlist_productname"><a class="titanwishlist_productname" href="titan_product_details.php?p=<?php echo htmlentities($pd=$row['pname']);?>"><?php echo htmlentities($row['pname']);?></a></div>
						  $<?php echo htmlentities($row['pprice']);?>
  							<span class="titanwishlist_pbdiscount">$<?php echo htmlentities($row['pbdiscount']);?></span>
  						</div>
  					</td>
  					<td class="titanwishlist_td">
  						<a href="titan_wishlist.php?action=cart&wishtoCartpt=<?php echo htmlentities($row['productToken']); ?>" class="titanwishlist_btn">Add to cart</a>
  					</td>
  					<td class="titanwishlist_td">
  						<a href="titan_wishlist.php?del=<?php echo htmlentities($row['productToken']);?>" onClick="return confirm('Are you sure you want to delete?')" class="titanwishlist_btn"><i class="fa fa-times"></i></a>
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
    <script src="js/navbars.js"></script>
</body>
<?php } ?>

</html>