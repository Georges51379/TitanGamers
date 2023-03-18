<?php
session_start();
error_reporting(0);
include('db/connection.php');
if(strlen($_SESSION['email'])==0)
    {
header('location:login-user.php');
}
else{
	if (isset($_GET['id'])) {

		mysqli_query($con,"delete from orders  where userId='".$_SESSION['id']."' and paymentMethod is null and id='".$_GET['id']."' ");
	}
  $titleQuery = mysqli_query($con, "SELECT title FROM title WHERE titleStatus = 'active' AND selected = 'Yes' ");
       $rw = mysqli_fetch_array($titleQuery);
       $name = $rw['title'];
 ?>

 <head>
 <!--TITLE SECTION-->
 <title><?php echo $name; ?> | Pending Order History</title>
     <?php include 'header/head.inc.php'; ?>
</head>

<body>
  <!--PRODUCTS navbar.INC.PHP--->
    			<?php include 'navbar/productsnavbar.inc.php'; ?>
  <?php include 'navbar/titan_account_fixedsidebar.inc.php'; ?>


    <div class="titanpendingorders_wrapper">
      <span id="pendingorders_availabilitystatus" style="font-size:12px;"></span>
      <h1 class="warning"><span class="warningcolor">warning:</span>&nbspdo not let several pending products</h1>

      <form name="cart" class="titanpendingorders_form" method="post">

          <table class="titanpendingorders_table">
            <thead class="titanpendingorders_thead">
              <tr class="titanpendingorders_tr">
                <th class="titanpendingorders_th">#</th>
                <th class="titanpendingorders_th">Image</th>
                <th class="titanpendingorders_th">Product Name</th>
                <th class="titanpendingorders_th">quantity</th>
                <th class="titanpendingorders_th">price per unit</th>
                <th class="titanpendingorders_th">shipping charge</th>
                <th class="titanpendingorders_th">total</th>
                <th class="titanpendingorders_th">Payment Method</th>
                <th class="titanpendingorders_th">Order Date</th>
                <th class="titanpendingorders_th">Action</th>
              </tr>
            </thead><!-- /thead -->

            <tbody class="titanpendingorders_tbody">

              <?php $query=mysqli_query($con,"select products.productImage1 as pimg1,products.productName as pname,products.id as c,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,products.shippingCharge as shippingcharge,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as oid from orders join products on orders.productId=products.id where orders.userId='".$_SESSION['id']."' and orders.paymentMethod is null");
              $cnt=1;
              $num=mysqli_num_rows($query);
              if($num>0)
              {
              while($row=mysqli_fetch_array($query))
              {
              ?>

              <tr class="titanpendingorders_tr">
      					<td class="titanpendingorders_td"><?php echo $cnt;?></td>
      					<td class="titanpendingorders_td">
                  <a class="product_link" href="titan_product_details.php?pid=<?php echo $row['opid'];?>">
                    <img src="admin/productimages/<?php echo $row['c'];?>/<?php echo $row['pimg1'];?>" alt="" width="256" height="146">
                  </a>
      					</td>
      					<td class="titanpendingorders_td">
      						<h4><a class="titanpendingorders_productname" href="titan_product_details.php?pid=<?php echo $row['opid'];?>">
      						<?php echo $row['pname'];?></a></h4>
      					</td>
      					<td class="titanpendingorders_td">
      						<?php echo $qty=$row['qty']; ?>
      		            </td>
      					<td class="titanpendingorders_td">$<?php echo $price=$row['pprice']; ?>  </td>
      					<td class="titanpendingorders_td">$<?php echo $shippcharge=$row['shippingcharge']; ?>  </td>
      					<td class="titanpendingorders_td">$<?php echo (($qty*$price)+$shippcharge);?></td>
      					<td class="titanpendingorders_td"><?php echo $row['paym']; ?>  </td>
      					<td class="titanpendingorders_td"><?php echo $row['odate']; ?>  </td>

                <td class="titanpendingorders_td"><a class="titanpendingorders_btn" href="titan_pending_orders.php?id=<?php echo $row['oid']; ?> ">Delete</td>
              </tr>
      <?php $cnt=$cnt+1;} ?>
      <tr>
        <td colspan="9" class="titanpendingorders_td">
          <div class="cart_checkout_btn">
      			<button type="submit" name="ordersubmit" onload="pendingordersavailability()" id="titanpendingorders_btn">
              <a class="titanpendingorders_btn proceedbtn" href="titan_payment_method.php">PROCCED To Payment</a>
            </button>
      		</div>
        </td>
      </tr>
    <?php } else {?>
    <tr>
    <td colspan="10" align="center" class="table_td">
      <h4 class="no_result_found">No Result Found</h4>
    </td>
    </tr>
    <?php } ?>
    </tbody><!-- /tbody -->
    </table><!-- /table -->
  </form>
    </div>

  <?php } ?>

  <!--TITAN ACOUNT SIDEBAR .INC.PHP SECTION--->
  <?php include 'includes/titan_account_sidebar.inc.php'; ?>
  <!--ARROW_TO_TOP.INC.PHP SECTION-->
      <?php include 'includes/arrow_to_top.inc.php'; ?>
  <!--FOOTER.INC.PHP SECTION-->
      <?php include 'includes/footer.inc.php'; ?>
  </body>
