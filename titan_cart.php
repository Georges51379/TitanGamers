<?php
session_start();
error_reporting(0);
include('db/connection.php');
if(isset($_POST['submit'])){
		if(!empty($_SESSION['cart'])){
		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['quantity']=$val;

			}
		}
			echo "<script>alert('Your Cart has been Updated');</script>";
		}
	}
// Code for Remove a Product from Cart
if(isset($_POST['remove_code']))
	{

if(!empty($_SESSION['cart'])){
		foreach($_POST['remove_code'] as $key){

				unset($_SESSION['cart'][$key]);
		}
			echo "<script>alert('Your Cart has been Updated');</script>";
	}
}
// code for insert product in order table


if(isset($_POST['ordersubmit']))
{

if(strlen($_SESSION['email'])===0)
    {
header('location:login-user.php');
}
else{

	$quantity=$_POST['quantity'];
	$pdd=$_SESSION['pid'];
	$value=array_combine($pdd,$quantity);

	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$hashedString = '';

for ($i = 0 ; $i <= 10; $i++){
		$index = rand(0, strlen($characters) - 1);
		$hashedString .= $characters[$index];
}
$orderToken = $hashedString;

		foreach($value as $qty=> $val34){

mysqli_query($con,"INSERT INTO  orders (orderToken, userEmail,productName,quantity)
							VALUES('$orderToken','".$_SESSION['email']."','$qty','$val34')");
header('location:titan_payment_method.php');
}
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
		   $pdtid=array();
		      $sql = "SELECT * FROM products WHERE id IN(";
		  			foreach($_SESSION['cart'] as $id => $value){
		  			$sql .=$id. ",";
		  			}
		  			$sql=substr($sql,0,-1) . ") ORDER BY id ASC";
		  			$query = mysqli_query($con,$sql);
		  			$totalprice=0;
		  			$totalqunty=0;
		  			if(!empty($query)){
		  			while($row = mysqli_fetch_array($query)){
		  				$quantity=$_SESSION['cart'][$row['id']]['quantity'];
		  				$subtotal= $_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']+$row['shippingCharge'];
		  				$totalprice += $subtotal;
		  				$_SESSION['qnty']=$totalqunty+=$quantity;

		  				array_push($pdtid,$row['id']);
		  	?>

		  				<tr>
		  					<td class="titancart_td"><input type="checkbox" name="remove_code[]" value="<?php echo htmlentities($row['id']);?>" /></td>
		  					<td class="titancart_td">
		  						<a class="product_link" href="titan_product_details.php?p=<?php echo htmlentities($pd=$row['productName']);?>">
		  						    <img src="admin/productimages/<?php echo $row['productName'];?>/<?php echo $row['productImage1'];?>" alt="" width="114" height="146">
		  						</a>
		  					</td>
		  					<td class="titancart_td">
		  						<h4><a class="titancart_productname" href="titan_product_details.php?p=<?php echo htmlentities($pd=$row['productName']);?>" ><?php echo $row['productName'];

		  $_SESSION['sid']=$pd;
		  						 ?></a>
								 </h4>
		  						<div class="titancart_row">
		  							<div class="titancart_ratingwrapper">
		  								<div class="titancart_rating"></div>
		  							</div>
		  							<div class="titancart_reviews">
		  <?php $rt=mysqli_query($con,"select * from productreviews where productId='$pd'");
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
		                <input type="number" step="1" min="1" max="2" oninput="validity.valid||(value='');" value="<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>" name="quantity[<?php echo $row['id']; ?>]">
		  			       </div>
		  		            </td>
		  					<td class="titancart_td"><span class="titancart_prodprice"><?php echo "$"." ".$row['productPrice']; ?></span>
								</td>
		  				<td class="titancart_td"><span class="titancart_shippingcharge"><?php echo "$"." ".$row['shippingCharge']; ?></span>
							</td>

		  					<td class="titancart_td"><span class="titancart_totalprice">$<?php echo ($_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']+$row['shippingCharge']); ?></span></td>
		  				</tr>

		  				<?php } }
		  $_SESSION['pid']=$pdtid;
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
		  						Total<span class="titancart_totalprice">&nbsp$<?php echo $_SESSION['tp']="$totalprice"; ?></span>
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
