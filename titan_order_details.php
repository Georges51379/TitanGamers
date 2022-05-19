<?php
session_start();
error_reporting(0);
include('db/connection.php');
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
      					<th class="titanpendingorders_th">total</th>
      					<th class="titanpendingorders_th">Payment Method</th>
      					<th class="titanpendingorders_th">Order Date</th>
      					<th class="titanpendingorders_th">Action</th>
      				</tr>
      			</thead><!-- /thead -->

      			<tbody class="table_tbody">
      <?php
      $orderid=$_POST['orderid'];
      $email=$_POST['email'];
      $ret = mysqli_query($con,"select t.email,t.id from (select usr.email,odrs.id from users as usr join orders as odrs on usr.id=odrs.userId) as t where  t.email='$email' and (t.id='$orderid')");
      $num=mysqli_num_rows($ret);
      if($num>0)
      {
      $query=mysqli_query($con,"select products.productImage1 as pimg1,products.productName as pname,products.id as id,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid from orders join products on orders.productId=products.id where orders.id='$orderid' and orders.paymentMethod is not null");
      $cnt=1;
      while($row=mysqli_fetch_array($query))
      {
      ?>
      				<tr class="table_tr">
      					<td class="titanpendingorders_tdtitanpendingorders_td"><?php echo $cnt;?></td>
      					<td class="titanpendingorders_tdtitanpendingorders_td">
      						<a class="entry-thumbnail">
      						   <img class="imgprod" src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['pimg1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['pimg1']);?>" >
      						</a>
      					</td>
      					<td class="titanpendingorders_tdtitanpendingorders_td">
      						<h4 class='product_description'><a class="titanpendingorders_productname" href="titan_product_details.php?pid=<?php echo $row['opid'];?>">
      						<?php echo $row['pname'];?></a></h4>

      					</td>
      					<td class="table_td">
      						<?php echo $qty=$row['qty']; ?>
      		            </td>
      					<td class="titanpendingorders_td"><?php echo $price=$row['pprice']; ?>  </td>
      					<td class="titanpendingorders_td"><?php echo $qty*$price;?></td>
      					<td class="titanpendingorders_td"><?php echo $row['paym']; ?>  </td>
      					<td class="titanpendingorders_td"><?php echo $row['odate']; ?>  </td>

      					<td class="titanpendingorders_td">
       <a class="titanpendingorders_btn" href="javascript:void(0);" onClick="popUpWindow('titan_track_order.php?oid=<?php echo htmlentities($row['orderid']);?>');" title="Track order">
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
