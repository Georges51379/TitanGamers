<?php
session_start();
error_reporting(0);
include('db/connection.php');

if(isset($_POST['submit'])){
		if(!empty($_SESSION['cart'][$_SESSION['cproducttoken']])){
				unset($_SESSION['cart'][$_SESSION['cproducttoken']]);
			}else{
				$_SESSION['cart'][$_SESSION['cproducttoken']]=$val;
		}
			echo "<script>alert('Your Cart has been Updated');</script>";
}



// Code for Remove a Product from Cart
if(isset($_POST['remove_code'])){
if(!empty($_SESSION['cart'][$_SESSION['cproducttoken']])){
				unset($_SESSION['cart'][$_SESSION['cproducttoken']]);
			echo "<script>alert('Your Cart has been Updated');</script>";
	}
}

// code for insert product in order table
if(isset($_POST['ordersubmit']))
{
if(strlen($_SESSION['email'])==0)
    {
header('location:login-user.php');
}
else{
	$quantity=$_POST['quantity'];

$orderToken = bin2hex(random_bytes(20));

$PRODNAMEqUERY = mysqli_query($con,"SELECT productName FROM products WHERE
                            productToken = '".$_SESSION['cproducttoken']."'");
  $rw = mysqli_fetch_array($PRODNAMEqUERY);
  $pname = $rw['productName'];

mysqli_query($con,"INSERT INTO  orders (orderToken, userEmail,productName,quantity)
							VALUES('$orderToken','".$_SESSION['email']."','$pname','$quantity')");
header('location:titan_payment_method.php');
}
}


// code for Shipping address updation
	if(isset($_POST['updateShipping']))
	{
		$saddress=$_POST['shippingAddress'];
		$sstate=$_POST['shippingState'];
		$scity=$_POST['shippingCity'];

		$query=mysqli_query($con,"UPDATE users SET shippingAddress='$saddress',shippingState='$sstate',shippingCity='$scity',shippingPinCode=0 WHERE email='".$_SESSION['email']."'");
		if($query)
		{
echo "<script>alert('Shipping Address has been updated');</script>";
		}
	}
?>
<head>
<!--TITLE SECTION-->
    <title>Titan Gamers | Cart</title>
<!--ICON SECTION-->
    <link href="img/icons/logo.png" rel="shortcut icon">
<!--FONT AWESOME CDN SECTION-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!--jQUERY CDN SECTION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<link href="css/titan_cart.css" rel="stylesheet">

</head>

<body>
<!--PRODUCTS TOPBAR.INC.PHP SECTION-->
		<?php include 'includes/products_topbar.inc.php'; ?>
<!--PRODUCTS LOGOSEARCH.INC.PHP SECTION-->
		<?php include 'includes/products_search.inc.php'; ?>
<!--PRODUCTS MAINNAVBAR.INC.PHP--->
		<?php include 'includes/products_mainnavbar.inc.php'; ?>

  <div class="titancart_wrapper">
		  <form name="cart" class="titancart_form" method="post">
		  <?php
		  if(!empty($_SESSION['cart'])){
		  	?>
		  		<table class="titancart_table">
		  			<thead class="titancart_thead">
		  				<tr class="titancart_tr">
		  					<th class="titancart_th">Remove</th>
		  					<th class="titancart_th">Image</th>
								<th class="titancart_th">Product Name</th>
		  					<th class="titancart_th">Quantity</th>
		  					<th class="titancart_th">Price Per unit</th>
		  					<th class="titancart_th">Shipping Charge</th>
		  					<th class="titancart_th">total</th>
		  				</tr>
		  			</thead><!-- /thead -->
		  			<tfoot class="titancart_tfoot">
		  				<tr class="titancart_tr">
		  					<td colspan="7" class="titancart_td">
		  						<div class="titancart_btn">
		  							<span class="titancart_continueshopping">
		  								<a href="products.php" class="titancart_btn">continue Shopping</a>
		  								<input type="submit" name="submit" value="Update shopping cart" class="titancart_btn">
		  							</span>
		  						</div><!-- /.shopping-cart-btn -->
		  					</td>
		  				</tr>
		  			</tfoot>
		  			<tbody class="titancart_tbody">
		   <?php
		      $cartQuery = mysqli_query($con, "SELECT * FROM products WHERE productToken= '".$_SESSION['cproducttoken']."' OR productToken = '".$_SESSION['wproducttoken']."' ");
					while($row = mysqli_fetch_array($cartQuery)){
		  	?>

		  				<tr>
		  					<td class="titancart_td"><a name="remove_code" href="titan_cart.php?delcartpt=<?php echo htmlentities($row['productToken']); ?>">Delete</a></td>

		  					<td class="titancart_td">
		  						<a class="product_link" href="titan_product_details.php?p=<?php echo htmlentities($row['productName']);?>">
		  						    <img src="admin/productimages/<?php echo $row['productName'];?>/<?php echo $row['productImage1'];?>" alt="" width="114" height="146">
		  						</a>
		  					</td>
		  					<td class="titancart_td">
		  						<h4><a class="titancart_productname" href="titan_product_details.php?p=<?php echo htmlentities($row['productName']);?>" ><?php echo $row['productName'];
		  						 ?></a>
								 </h4>
		  						<div class="titancart_row">
		  							<div class="titancart_ratingwrapper">
		  								<div class="titancart_rating"></div>
		  							</div>
		  							<div class="titancart_reviews">
		  <?php $rt=mysqli_query($con,"SELECT * FROM productreviews WHERE productId=1");
		  $num=mysqli_num_rows($rt);
		  {
		  ?>
		  								<div class="titancart_reviews">
		  									( <?php echo htmlentities($num);?> Reviews )
		  								</div>
		  								<?php } ?>
		  							</div>
		  					</div><!--TITAN CART ROW -->

		  					</td>
		  					<td class="titancart_td">
		  						<div class="titancart_quantityinput">
		                <input type="number" step="1" min="1" max="2" oninput="validity.valid||(value='');" value="<?php echo $_SESSION['cart'][$row['productName']]['quantity']; ?>" name="quantity[<?php echo $row['quantity']; ?>]">
		  			       </div>
		  		            </td>
		  					<td class="titancart_td"><span class="titancart_prodprice"><?php echo "$"." ".$row['productPrice']; ?></span>
								</td>
		  				<td class="titancart_td"><span class="titancart_shippingcharge"><?php echo "$"." ".$row['shippingCharge']; ?></span>
							</td>

		  					<td class="titancart_td"><span class="titancart_totalprice">$<?php echo ($_SESSION['cart'][$row['productName']]['quantity']*$row['productPrice']+$row['shippingCharge']); ?></span></td>
		  				</tr>

		  				<?php }
		  				?>

		  			</tbody><!-- /tbody -->
		  		</table><!-- /table -->


		  	<table class="titancart_table">
		  		<thead class="titancart_thead">
		  			<tr class="titancart_tr">
		  				<th class="titancart_th">
		  					<span class="billship_section_title">Shipping Address</span>
		  				</th>
		  			</tr>
		  		</thead>
		  		<tbody class="titancart_tbody">
		  				<tr class="titancart_tr">
		  					<td class="titancart_td">
		  						<div class="billship_div">
		  <?php
		  $query=mysqli_query($con,"SELECT shippingAddress, shippingState, shippingCity, shippingPinCode FROM users WHERE email='".$_SESSION['email']."'");
		  while($row=mysqli_fetch_array($query))
		  {
		  ?>
		  					<div class="billship_div_form">
		  					    <label class="billship_label" for="Billing Address">shipping Address<span class="red_astrix">*</span></label><br>
		  					    <textarea class="billship_input textarea"  name="shippingAddress" required="required"><?php echo $row['shippingAddress'];?></textarea>
		  					  </div>
		  						<div class="billship_div_form">
		  					    <label class="billship_label" for="Billing State ">shipping State   <span class="red_astrix">*</span></label><br>
		  			 				<input type="text" class="billship_input" id="shippingState" name="shippingState" value="<?php echo $row['shippingState'];?>" required>
		  					  </div>
		  					  <div class="billship_div_form">
		  					    <label class="billship_label" for="Billing City">shipping City <span class="red_astrix">*</span></label><br>
		  					    <input type="text" class="billship_input" id="shippingCity" name="shippingCity" required="required" value="<?php echo $row['shippingCity'];?>" >
		  					  </div>
		   					<div class="billship_div_form">
		  					    <label class="billship_label" for="Billing Pincode">shipping PinCode <span class="red_astrix">*</span></label><br>
		  					    <input type="text" class="billship_input" id="shippingPinCode" name="shippingPinCode" required="required" value="<?php echo $row['shippingPinCode'];?>" >
		  					  </div>
		  					  <button type="submit" name="updateShipping" class="billship_btn">Update</button>

		  					<?php } ?>

		  						</div>

		  					</td>
		  				</tr>
		  		</tbody><!-- /tbody -->
		  	</table><!-- /table -->

		  <div class="titancart_div">
		  	<table class="titancart_table">
		  		<thead class="titancart_thead">
		  			<tr class="titancart_tr">
		  				<th class="titancart_th">
		  					<div class="titancart_totalpricewrapper">
		  						Total<span class="titancart_totalprice">&nbsp$<?php echo ($_SESSION['cart'][$row['productName']]['quantity']*$row['productPrice']+$row['shippingCharge']); ?></span>
		  					</div>
		  				</th>
		  			</tr>
		  		</thead><!-- /thead -->
		  		<tbody class="titancart_tbody">
		  				<tr class="titancart_tr">
		  					<td class="titancart_td">
		  						<div class="titancart_cartcheckoutbtn">
		  							<button type="submit" name="ordersubmit" class="proceedbtn">PROCCED TO CHEKOUT</button>
		  						</div>
		  					</td>
		  				</tr>
		  		</tbody><!-- /tbody -->
		  	</table>
		  	<?php } else {
		  echo "Your shopping Cart is empty";
		  		}?>
		  </div>
		  	</form>
</div>


<!--ARROW_TO_TOP.INC.PHP SECTION-->
    <?php include 'includes/arrow_to_top.inc.php'; ?>
<!--FOOTER.INC.PHP SECTION-->
    <?php include 'includes/footer.inc.php'; ?>
</body>
