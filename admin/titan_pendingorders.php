<?php
session_start();
include('db/connection.php');
if(strlen($_SESSION['email'])==0)
	{
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Beirut');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin | Pending Orders</title>
<link type="text/css" href="images/icons/logo.png" rel="shortcut icon">
<link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
<!--FONT AWESOME CDN SECTION-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--jQUERY CDN SECTION-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

			<link href="css/admin.css" rel="stylesheet">

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

<?php include('include/sidebar.inc.php');?>

<center>
	<div class="container">
			<div class="titlewrapper">
				<h3 class="title">pending Orders</h3>
			</div>

			<div class="wrapper">
<?php if(isset($_GET['del']))
{?>
					<div class="msgwrapper">
					<strong class="msg">Oh Noo!</strong><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
					</div>
<?php } ?>
					<br />

</center>
									<table id="datable" class="display" style="width:100%">
										<thead>
											<tr>
												<th id="custom_td">#</th>
												<th id="custom_td">email</th>
												<th id="custom_td" width="50">phone</th>
												<th id="custom_td">Shipping Address</th>
												<th id="custom_td">Product name</th>
												<th id="custom_td">quantity</th>
												<th id="custom_td">Amount</th>
												<th id="custom_td">Order Date</th>
												<th id="custom_td">Action</th>
											</tr>
										</thead>

<tbody>
<?php
$status='Delivered';
$query=mysqli_query($con,"SELECT users.email AS userEmail,users.phone AS phone,users.shippingAddress AS shippingaddress,users.shippingCity AS shippingcity,
	users.shippingState AS shippingstate,users.shippingPinCode AS shippingpincode,products.productName AS productname,products.shippingCharge AS shippingcharge,orders.quantity AS quantity,
	orders.orderDate AS orderdate,products.productPrice AS productprice,orders.id AS id  FROM orders JOIN users ON  orders.userEmail=users.email JOIN products ON products.productName=orders.productName
 WHERE orders.orderStatus!='$status' OR orders.orderStatus IS NULL");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
										<tr id="custom_tr">
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['userEmail']);?></td>
											<td><?php echo htmlentities($row['phone']);?></td>
											<td><?php echo htmlentities($row['shippingaddress'].",".$row['shippingcity'].",".$row['shippingstate']."-".$row['shippingpincode']);?></td>
											<td><?php echo htmlentities($row['productname']);?></td>
											<td><?php echo htmlentities($row['quantity']);?></td>
											<td>$<?php echo htmlentities($row['quantity']*$row['productprice']+$row['shippingcharge']);?></td>
											<td><?php echo htmlentities($row['orderdate']);?></td>
											<td><a href="titan_updateorder.php?oid=<?php echo htmlentities($row['id']);?>" title="Update order" target="_blank"><i class="fa fa-plus"></i></a>
											</td>
											</tr>
										<?php $cnt=$cnt+1; } ?>
										</tbody>
								</table>
							</div>
</div>

<?php include('include/footer.inc.php');?>
<?php include 'include/arrow_to_top.inc.php'; ?>

<!--DATATABLES SECTION JS-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<!--END DATATABLES SECTION JS-->

	<script>
	$(document).ready(function() {
	    $('#datable').DataTable( {
	        "columnDefs": [
	            {
	                "render": function ( data, type, row ) {
	                    return data +' ('+ row[3]+')';
	                },
	                "targets": 0
	            },
	            { "visible": false,  "targets": [ 3 ] }
	        ]
	    } );
	} );
	</script>
</body>
<?php } ?>
