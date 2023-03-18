<?php
session_start();
error_reporting(0);
include('db/connection.php');
      $orderToken=$_POST['orderToken'];
?>

<head>
<!--TITLE SECTION-->
    <title>Titan Gamers | Order History</title>
<!--ICON SECTION-->
    <link href="img/icons/logo.png" rel="shortcut icon">
<!--FONT AWESOME CDN SECTION-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!--jQUERY CDN SECTION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="css/titan_pending_orders.css" rel="stylesheet">

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

        <div class="div_for_table">
      <form name="cart" class="form" method="post">

      		<table class="titanpendingorders_table">
      			<thead class="table_thead">
      				<tr class="table_tr">
      					<th class="titanpendingorders_th">#</th>
      					<th class="titanpendingorders_th">Image</th>
      					<th class="titanpendingorders_th">Product Name</th>
      					<th class="titanpendingorders_th">Quantity</th>
      					<th class="titanpendingorders_th">Price Per unit</th>
                <th class="titanpendingorders_th">shipping total</th>
      					<th class="titanpendingorders_th">total</th>
      					<th class="titanpendingorders_th">Payment Method</th>
      					<th class="titanpendingorders_th">Order Date</th>
      					<th class="titanpendingorders_th">Action</th>
      				</tr>
      			</thead><!-- /thead -->

      			<tbody class="table_tbody">
      <?php

      $ret = mysqli_query($con,"SELECT orders.orderToken, orders.userEmail, orders.productName, orders.quantity, orders.totalPrice, orders.orderStatus,
                          orders.paymentMethod FROM orders JOIN users ON orders.userEmail = users.email
                    WHERE orders.orderToken= '$orderToken' AND orders.userEmail='".$_SESSION['email']."'");
      $num=mysqli_num_rows($ret);
      if($num>0)
      {
      $query=mysqli_query($con,"SELECT products.productImage1 AS pimg1,products.productName AS pname,products.productToken AS productToken,orders.productName AS prodName,
                          orders.quantity AS qty,products.productPrice AS pprice,products.shippingCharge AS shippingcharge,orders.paymentMethod AS paym, orders.totalPrice AS finalTotal,
                          orders.orderDate AS odate,orders.orderToken AS orderToken FROM orders JOIN products ON orders.productName=products.productName
                          WHERE orders.paymentMethod IS NOT NULL AND orders.userEmail='".$_SESSION['email']."'");
      $cnt=1;
      while($row=mysqli_fetch_array($query))
      {
      ?>
      				<tr class="table_tr">
      					<td class="titanpendingorders_tdtitanpendingorders_td"><?php echo $cnt;?></td>
      					<td class="titanpendingorders_tdtitanpendingorders_td">
      						<a class="entry-thumbnail">
      						   <img class="imgprod" src="admin/productimages/<?php echo htmlentities($row['pname']);?>/<?php echo htmlentities($row['pimg1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['pname']);?>/<?php echo htmlentities($row['pimg1']);?>" >
      						</a>
      					</td>
      					<td class="titanpendingorders_tdtitanpendingorders_td">
      						<h4 class='product_description'><a class="titanpendingorders_productname" href="titan_product_details.php?p=<?php echo $row['pname'];?>">
      						<?php echo $row['pname'];?></a></h4>

      					</td>
      					<td class="table_td">
      		            </td>
                      <td class="titanorderhistory_td">$<?php echo $price=$row['pprice']; ?></td>
            					<td class="titanorderhistory_td">$<?php echo $shippcharge=$row['shippingcharge']; ?></td>
            					<td class="titanorderhistory_td">$<?php echo $row['finalTotal']; ?></td>
            					<td class="titanorderhistory_td"><?php echo $row['paym']; ?></td>
            					<td class="titanorderhistory_td"><?php echo $row['odate']; ?></td>

      					<td class="titanpendingorders_td">
                          <a class="titanpendingorders_btn" href="javascript:void(0);" onClick="popUpWindow('titan_track_order.php?ot=<?php echo htmlentities($row['orderToken']);?>');" title="Track order">
      					Track</td>
      				</tr>
      <?php $cnt=$cnt+1;} } else { ?>
      				<tr class="table_tr"><td colspan="8" class="table_td">Either order ID or  Registered email ID is invalid</td></tr>
      				<?php } ?>
      			</tbody><!-- /tbody -->
      		</table><!-- /table -->

      		</form>

        </div>



    </body>
