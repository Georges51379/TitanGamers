<?php
session_start();
error_reporting(0);
include('db/connection.php');
if(strlen($_SESSION['email'])==0)
    {
header('location:login-user.php');
}
else{
?>
<head>  <!--to be fixed after checkout-->
<!--TITLE SECTION-->
    <title>Titan Gamers | Order History</title>
<!--ICON SECTION-->
    <link href="img/icons/logo.png" rel="shortcut icon">
<!--FONT AWESOME CDN SECTION-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!--jQUERY CDN SECTION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="css/titan_order_history.css" rel="stylesheet">

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
<!--PRODUCTS TOPBAR.INC.PHP SECTION-->
		<?php include 'includes/products_topbar.inc.php'; ?>
<!--PRODUCTS LOGOSEARCH.INC.PHP SECTION-->
		<?php include 'includes/products_search.inc.php'; ?>
<!--PRODUCTS MAINNAVBAR.INC.PHP--->
		<?php include 'includes/products_mainnavbar.inc.php'; ?>


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

  <?php $query=mysqli_query($con,"select products.productImage1 as pimg1,products.productName as pname,products.id as proid,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,products.shippingCharge as shippingcharge,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid from orders join products on orders.productId=products.id where orders.userId='".$_SESSION['id']."' and orders.paymentMethod is not null");
  $cnt=1;
  while($row=mysqli_fetch_array($query))
  {
  ?>
  				<tr class="titanorderhistory_tr">
  					<td class="titanorderhistory_td"><?php echo $cnt;?></td>
  					<td class="titanorderhistory_td">
  						<a class="product_link" href="titan_product_details.php?pid=<?php echo $row['opid'];?>">
  						    <img src="admin/productimages/<?php echo $row['proid'];?>/<?php echo $row['pimg1'];?>" alt="" width="84" height="146">
  						</a>
  					</td>
  					<td class="titanorderhistory_td">
  						<h4><a  class='titanorderhistory_productname' href="titan_product_details.php?pid=<?php echo $row['opid'];?>">
  						<?php echo $row['pname'];?></a></h4>
  					</td>
  					<td class="titanorderhistory_td">
  						<?php echo $qty=$row['qty']; ?>
  		       </td>
  					<td class="titanorderhistory_td">$<?php echo $price=$row['pprice']; ?>  </td>
  					<td class="titanorderhistory_td">$<?php echo $shippcharge=$row['shippingcharge']; ?>  </td>
  					<td class="titanorderhistory_td">$<?php echo (($qty*$price)+$shippcharge);?></td>
  					<td class="titanorderhistory_td"><?php echo $row['paym']; ?>  </td>
  					<td class="titanorderhistory_td"><?php echo $row['odate']; ?>  </td>

  					<td class="titanorderhistory_td popup_trackwindow">
   <a href="javascript:void(0);" class="titanorderhistory_btn" onClick="popUpWindow('titan_track_order.php?oid=<?php echo htmlentities($row['orderid']);?>');" title="Track order">
  					Track</td>
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
