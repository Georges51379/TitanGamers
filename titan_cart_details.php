<?php
session_start();
error_reporting(0);
include('db/connection.php');

$pcct = $_GET['pcct'];

if(isset($_POST['unlockCartDetails'])){
  $cartCode = $_POST['cartCode'];

  $checkQuery = mysqli_query($con, "SELECT * FROM cart WHERE cartCode = '$cartCode' ");
  $resultrws = mysqli_fetch_array($checkQuery);

  $inCartCode = $resultrws['cartCode'];

  mysqli_query($con, "UPDATE cart SET isCartEmpty = 'Unlocked' WHERE cartCode = '$inCartCode'");
}
//UPDATE QUANTITY FOR CART
if(isset($_POST['submit'])){
	$quantity = $_POST['quantity'];

	$updateQuantity = mysqli_query($con, "UPDATE cart SET quantity = '$quantity' WHERE cartToken = '$pcct'");
	echo "<script>alert('Cart has been SUCCESSFULLY UPDATED');</script>";
}
//CODE TO UPDATE SHIPPING INFO
if(isset($_POST['updateShipping'])){
		$saddress=$_POST['shippingAddress'];
		$sstate=$_POST['shippingState'];
		$scity=$_POST['shippingCity'];

		$query=mysqli_query($con,"UPDATE users SET shippingAddress='$saddress',shippingState='$sstate',shippingCity='$scity',shippingPinCode=0 WHERE email='".$_SESSION['email']."'");
		if($query)
		{
echo "<script>alert('Shipping Address has been updated');</script>";
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

  $_SESSION['orderToken'] = bin2hex(random_bytes(20));

  $getCartTokenQuery = mysqli_query($con, "SELECT productToken FROM cart WHERE cartToken = '$pcct'");
  $result = mysqli_fetch_array($getCartTokenQuery);

  $prodTokenDB = $result['productToken'];

  $PRODNAMEqUERY = mysqli_query($con,"SELECT productName FROM products WHERE
                              productToken = '$prodTokenDB'");
    $rw = mysqli_fetch_array($PRODNAMEqUERY);
    $pname = $rw['productName'];

  mysqli_query($con,"INSERT INTO  orders (orderToken, userEmail,productName,quantity)
  							VALUES('".$_SESSION['orderToken']."','".$_SESSION['email']."','$pname','$quantity')");

  mysqli_query($con,"UPDATE cart SET cartStatus = 'Inactive' WHERE cartToken = '$pcct'");              
  header('location:titan_payment_method.php');
  }
  }

?>
<head>
<!--TITLE SECTION-->
    <title>Titan Gamers | Cart</title>
	<?php include 'header/head.inc.php'; ?>

	<script language="javascript" type="text/javascript">
  var popUpWin=0;
  function popUpWindow(URLStr, left, top, width, height)
  {
   if(popUpWin)
  {
  if(!popUpWin.closed) popUpWin.close();
  }
  popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
  }

  </script>
</head>

<body>
<!--PRODUCTS navbar.INC.PHP--->
		<?php include 'navbar/productsnavbar.inc.php'; ?>

<!--GENERATED CART CODES-->
	<div class="code-wrapper">
<?php
	$cartCodeQuery = mysqli_query($con,"SELECT cartCode, productToken FROM cart WHERE userEmail ='".$_SESSION['email']."' AND cartStatus = 'Active' ");

	$getCorrespondingProdFromCodeCartQuery =
	mysqli_query($con, "SELECT cart.*, products.*
	FROM cart JOIN products ON
	 cart.productToken = products.productToken WHERE cart.cartStatus = 'Active'");
	while($coderws = mysqli_fetch_array($cartCodeQuery)){
		$cartCode = $coderws['cartCode'];
		$prodNamerws = mysqli_fetch_array($getCorrespondingProdFromCodeCartQuery);
		$prodNameDB = $prodNamerws['productName'];
}
?>

		<div class="popup_cart_code">
                <a href="javascript:void(0);" class="titanorderhistory_btn" onClick="popUpWindow('titan_cart_codes.php');" title="Cart">
				    cart codes &emsp;
				</a>
		</div>
	</div>


  <div class="form-wrapper">
      <form class="form"  method="post">
        <div class="form-group">
          <input class="form-input" name="cartCode" id="cartCode" placeholder="Enter Cart Code...">
        </div>
        <div class="form-btn">
          <input type="submit" class="btn" name="unlockCartDetails" value="Unlock">
        </div>
      </form>
  </div>

  <div class="titanwishlist_wrapper">
    <form class="cartForm" method="post" >
      <table class="titanwishlist_table">
        <thead class="titanwishlist_thead">
          <tr class="titancart_tr">
            <th class="titancart_th">Image</th>
            <th class="titancart_th">Product Name</th>
            <th class="titancart_th">Quantity</th>
            <th class="titancart_th">Price Per unit</th>
            <th class="titancart_th">Shipping Charge</th>
            <th class="titancart_th">total</th>
          </tr>
        </thead>
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
        <tbody class="titanwishlist_tbody">

        <?php
  $ret= mysqli_query($con,"SELECT products.productName AS pname,products.productImage1 AS pimage,
  products.productToken AS productToken,
  products.productPrice AS pprice,products.shippingCharge AS shippingCharge, cart.quantity AS quantity,
  cart.productToken AS cartProdToken,
  cart.cartToken AS cartToken FROM products JOIN cart ON products.productToken = cart.productToken  WHERE
  cart.cartStatus = 'Active' AND cart.isCartEmpty = 'Unlocked' AND cart.cartToken = '$pcct' AND
   cart.userEmail='".$_SESSION['email']."' ");

   $couponQuery = mysqli_query($con,"SELECT * FROM coupon WHERE couponStatus ='Active' ");
   $rw = mysqli_fetch_array($couponQuery);

   $couponName = $rw['name'];
   $discount = $rw['discount'];

  $num=mysqli_num_rows($ret);
    if($num>0)
    {
  while ($row=mysqli_fetch_array($ret)) {
    $price = $row['pprice'];
    $shippingfees = $row['shippingCharge'];
    $cartQuantity = $row['quantity'];
    $resultCart = $price * $cartQuantity;
  ?>
  <tr>
    <td class="titancart_td">
      <a class="product_link" href="titan_product_details.php?p=<?php echo htmlentities($row['pname']);?>">
          <img src="admin/productimages/<?php echo $row['pname'];?>/<?php echo $row['pimage'];?>" alt="" width="114" height="146">
      </a>
    </td>
    <td class="titancart_td">
      <h4>
        <a class="titancart_productname" href="titan_product_details.php?p=<?php echo htmlentities($row['pname']);?>" ><?php echo $row['pname'];?></a>
     </h4>


    </td>
    <td class="titancart_td">
      <div class="titancart_quantityinput">
        <input type="number" step="1" min="1" max="2" oninput="validity.valid||(value='');" name="quantity" value="<?php echo htmlentities($row['quantity']); ?>">
       </div>
          </td>
    <td class="titancart_td"><span class="titancart_prodprice"><?php echo "$"." ".$price; ?></span>
    </td>
  <td class="titancart_td"><span class="titancart_shippingcharge"><?php echo "$"." ".$shippingfees; ?></span>
  </td>


    <td class="titancart_td"><span class="titancart_totalprice">$<?php echo $_SESSION['totalPrice'] = $resultCart + $shippingfees;  ?></span></td>
  </tr>

  <?php } } else{ ?>
          <tr class="titancart_tr">
            <td class="titancart_td">Your CART is Empty</td>
          </tr>
          <?php } ?>
        </tbody>
      </table>


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
                Total<span class="titancart_totalprice">&nbsp$<?php echo $_SESSION['totalPrice']; ?></span>
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
    </div>
      </form>
</div>






  <!--ARROW_TO_TOP.INC.PHP SECTION-->
      <?php include 'includes/arrow_to_top.inc.php'; ?>
  <!--FOOTER.INC.PHP SECTION-->
      <?php include 'includes/footer.inc.php'; ?>
  		<script src="js/navbars.js"></script>
  </body>
