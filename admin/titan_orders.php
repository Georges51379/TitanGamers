<?php
session_start();
include('db/connection.php');
if(strlen($_SESSION['ad_email'])==0)
	{
header('location:index.php');
}
else{
	if(isset($_GET['del'])){
		mysqli_query($con,"UPDATE orders SET status='inactive' WHERE orderToken='".$_GET['ot']."'");
		header('location:titan_orders.php');
		echo'<script>alert("order Has been succesfully deleted");</script>';
	}
?>
<html>
  <head>
  	<title>Admin | Orders</title>
  	<link type="text/css" href="images/icons/logo.png" rel="shortcut icon">
  	<link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
  <!--FONT AWESOME CDN SECTION-->
  		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--jQUERY CDN SECTION-->
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  		<link href="css/admin.css" rel="stylesheet">
  </head>

  <body>
  	<?php include('include/sidebar.inc.php');?>


		<center>
			<div class="container">
				<div class="titlewrapper">
					<h3 class="title">orders</h3>
						<div class="subtitle_wrapper">
							<h4 class="subtitle"><a href="titan_todaysorders.php" class="subtitle-link">today's orders</a></h4>&emsp;
							<h4 class="subtitle"><a href="titan_pendingorders.php" class="subtitle-link">pending orders</a></h4>&emsp;
							<h4 class="subtitle"><a href="titan_deliveredorders.php" class="subtitle-link">delivered orders</a></h4>&emsp;
							<h4 class="subtitle"><a href="titan_tobedeliveredorders.php" class="subtitle-link">TBD orders</a></h4>&emsp;
						</div>
				</div>

				<!--**********************START ADD DELETE CATEGORY MSG********************************************************************-->

				<div class="wrapper">
				<?php if(isset($_GET['del']))
				{?>
				<div class="msgwrapper">
				<strong class="negativemsg">Oh Noo!</strong><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
				</div>
				<?php } ?>
				<br />
				<!--***********************************END ADD DELETE CATEGORY MSG*******************************************************-->
				</div>
</center>
				<table id="datable" class="display" style="width:100%">
						<thead>
							<tr>
								<th id="custom_td">#</th>
								<th id="custom_td">user email </th>
								<th id="custom_td">Product Name</th>
								<th id="custom_td">quantity</th>
								<th id="custom_td">order status</th>
								<th id="custom_td">payment method</th>
								<th id="custom_td">order date</th>
								<th id="custom_td">Action</th>
							</tr>
						</thead>
						<tbody>
				<?php
				$ordersQuery = mysqli_query($con,"SELECT * FROM orders WHERE status='active'");
				$cnt=1;
					while($row = mysqli_fetch_array($ordersQuery)){
				 ?>

				 <tr id="custom_tr">
						<td><?php echo htmlentities($cnt);?></td>
						<td><?php echo htmlentities($row['userEmail']);?></td>
						<td id="cap_username"><?php echo htmlentities($row['productName']);?></td>
						<td> <?php echo htmlentities($row['quantity']);?></td>
						<td><?php echo htmlentities($row['orderStatus']);?></td>
						<td><?php echo htmlentities($row['paymentMethod']);?></td>
						<td><?php echo htmlentities($row['orderDate']);?></td>
						<td>
						<a href="titan_orders.php?ot=<?php echo $row['orderToken']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-times"></i></a></td>
					</tr>
					<?php $cnt=$cnt+1; } ?>
			</table>
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
  	    });
  			});
  		</script>
  </body>
  <?php } ?>
</html>
