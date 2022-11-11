<?php
session_start();
error_reporting(0);
include('db/connection.php');
if(strlen($_SESSION['email'])==0)
    {
header('location:login-user.php');
}
else{
  $titleQuery = mysqli_query($con, "SELECT title FROM title WHERE titleStatus = 'active' AND selected = 'Yes' ");
       $rw = mysqli_fetch_array($titleQuery);
       $name = $rw['title'];
?>
<head>  <!--to be fixed after checkout-->
<!--TITLE SECTION-->
    <title><?php echo $name; ?> | Order History</title>

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
  <?php include 'navbar/productsnavbar.inc.php'; ?>
<?php include 'navbar/titan_account_fixedsidebar.inc.php'; ?>


<div class="titanorderhistory_wrapper">

  <form name="cart" class="titanorderhistory_form" method="post">

      <table class="titanorderhistory_table">
        <thead class="titanorderhistory_thead">
          <tr class="titanorderhistory_tr">
            <th class="titanorderhistory_th">#</th>
            <th class="titanorderhistory_th">Image</th>
            <th class="titanorderhistory_th">Product Name</th>
            <th class="titanorderhistory_th">Quantity</th>
            <th class="titanorderhistory_th">Price Per unit</th>
            <th class="titanorderhistory_th">shipping charge</th>
            <th class="titanorderhistory_th">total</th>
            <th class="titanorderhistory_th">Payment Method</th>
            <th class="titanorderhistory_th">Order Date</th>
            <th class="titanorderhistory_th">Action</th>
          </tr>
        </thead><!-- /thead -->

        <tbody class="titanorderhistory_tbody">

  <?php $query=mysqli_query($con,"SELECT products.productImage1 AS pimg1,products.productName AS pname,products.productToken AS productToken,orders.productName AS prodName,
                              orders.quantity AS qty,products.productPrice AS pprice,products.shippingCharge AS shippingcharge,orders.paymentMethod AS paym, orders.totalPrice AS finalTotal,
                              orders.orderDate AS odate,orders.orderToken AS orderToken FROM orders JOIN products ON orders.productName=products.productName
                              WHERE orders.paymentMethod IS NOT NULL AND orders.userEmail='".$_SESSION['email']."'");
  $cnt=1;
  while($row=mysqli_fetch_array($query))
  {
  ?>
  				<tr class="titanorderhistory_tr">
  					<td class="titanorderhistory_td"><?php echo $cnt;?></td>
  					<td class="titanorderhistory_td">
  						<a class="product_link" href="titan_product_details.php?p=<?php echo $row['pname'];?>">
  						    <img src="admin/productimages/<?php echo $row['pname'];?>/<?php echo $row['pimg1'];?>" alt="" width="84" height="146">
  						</a>
  					</td>
  					<td class="titanorderhistory_td">
  						<h4><a  class='titanorderhistory_productname' href="titan_product_details.php?p=<?php echo $row['pname'];?>">
  						<?php echo $row['pname'];?></a></h4>
  					</td>
  					<td class="titanorderhistory_td">
  						<?php echo $qty=$row['qty']; ?>
  		       </td>
  					<td class="titanorderhistory_td">$<?php echo $price=$row['pprice']; ?>  </td>
  					<td class="titanorderhistory_td">$<?php echo $shippcharge=$row['shippingcharge']; ?>  </td>
  					<td class="titanorderhistory_td">$<?php echo $row['finalTotal']; ?>  </td>
  					<td class="titanorderhistory_td"><?php echo $row['paym']; ?>  </td>
  					<td class="titanorderhistory_td"><?php echo $row['odate']; ?>  </td>

  					<td class="titanorderhistory_td popup_trackwindow">
                <a href="javascript:void(0);" class="titanorderhistory_btn" onClick="popUpWindow('titan_track_order.php?ot=<?php echo htmlentities($row['orderToken']);?>');" title="Track order">
  					      Track &emsp;
                <a href="javascript:void(0);" class="titanorderhistory_btn" onClick="popUpWindow('titan_delivery_order.php?ot=<?php echo htmlentities($row['orderToken']);?>');" title="To be Delivered">
    					    To be delivered
            </td>

  				</tr>
  <?php $cnt=$cnt+1;} ?>
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
