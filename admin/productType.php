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

if(isset($_POST['submit']))
{
	$productName=$_POST['productName'];
	$productType=$_POST['productType'];
	$productTypeDescription=$_POST['productTypeDescription'];
	$productTypeStatus=$_POST['productTypeStatus'];


$sql=mysqli_query($con,"INSERT INTO producttype(productName, productType, productTypeDescription, productTypeStatus)
			VALUES ('$productName','$productType','$productTypeDescription', '$productTypeStatus')");
$_SESSION['msg']="product Type Created !!";
}

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"UPDATE producttype SET productTypeStatus = 'Inactive' WHERE productName = '".$_GET['productType']."'");
                  $_SESSION['delmsg']= "product type deleted !!";
		  }
if(isset($_POST['truncateTable'])){
	mysqli_query($con,"TRUNCATE TABLE producttype");
	$_SESSION['delmsg'] = "TABLE HAS BEEN EMPTY SUCCESSFULLY!!";
}
?>

<html>
<head>
	<title>Admin | Product Type</title>
	<link type="text/css" href="images/icons/logo.png" rel="shortcut icon">
	<link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
<!--FONT AWESOME CDN SECTION-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--jQUERY CDN SECTION-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link href="css/admin.css" rel="stylesheet">

		<script>
		function checkProductType() {
			jQuery.ajax({
				url: "check/checkProductType.php",
				data: 'productName='+$("#productName").val(),
				type: "POST",
				success:function(data){
					$("#productNameAvailability").html(data);
				},
				error:function(){}
			});
		}
		</script>
</head>
<body>

	<?php include('include/sidebar.inc.php');?>
<center>
	<div class="container">
							<div class="titlewrapper">
								<h3 class="title">product type</h3>
							</div>

<!--**********************START ADD DELETE CATEGORY MSG********************************************************************-->

<div class="wrapper">
									<?php if(isset($_POST['submit']))
{?>
									<div class="msgwrapper">
									<strong  class="positivemsg">Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>
<div class="wrapper">
<?php if(isset($_GET['del']))
{?>
		<div class="msgwrapper">
		<strong class="negativemsg">Oh Noo!</strong><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
		</div>
<?php } ?>
		<br />
<!--***********************************END ADD DELETE CATEGORY MSG*******************************************************-->
<form method="post">
	<h2>Empty Table:</h2>
	<button type="submit" name="truncateTable" class="adminform_btn">Empty Table</button>
</form>

			<form class="admin_form" name="laptopType" method="post" >

					<div class="adminform_div">
						<label class="adminform_label" for="basicinput">product Name</label><br>
						<select name="productName" onchange="checkProductType()" id="productName" class="adminform_select" required>
							<option value="">Select product Name</option>
					<?php $query=mysqli_query($con,"SELECT productName FROM products");
					while($row=mysqli_fetch_array($query))
					{?>
						<option value="<?php echo $row['productName'];?>"><?php echo $row['productName'];?></option>
					<?php } ?>
				</select><br>
						<span id="productNameAvailability"></span>
						</div>

						<div class="adminform_div">
					<label class="adminform_label" for="basicinput">product Type</label><br>
					<select name="productType" class="adminform_select" required>
						<option value="">Select product Type</option>
						<option value="business">business</option>
						<option value="convertible">convertible</option>
						<option value="low end gaming">low end gaming</option>
						<option value="mid end gaming">mid end gaming</option>
						<option value="high end gaming">high end gaming</option>
						<option value="desktop replacement">desktop replacement</option>

					</select>
					</div>
					<div class="adminform_div">
							<label class="adminform_label" for="basicinput">Description</label><br>
							<textarea class="adminform_textarea" name="productTypeDescription" rows="5"></textarea>
						</div>

						<div class="adminform_div">
						<label class="adminform_label" for="basicinput">product Type Status</label><br>
						<select name="productTypeStatus" class="adminform_select" required>
							<option value="--Select An Option--">--Select An Option--</option>
							<option value="Active">Active</option>
							<option value="Inactive">Inactive</option>
						</select>
						</div>

						<div class="adminform_div">
							<button type="submit" name="submit" id="btn" class="adminform_btn">Create</button>
						</div>
			</form>
		</div><!--END WRAPPER div-->
	</div>
</center>

							<div class="titlewrapper">
								<h3 class="title">Manage types</h3>
							</div>
							<br><br>

						<table id="datable" class="display" style="width:100%">
									<thead>
										<tr>
											<th id="custom_td">ID</th>
											<th id="custom_td">product Name</th>
											<th id="custom_td">product type</th>
											<th id="custom_td">Description</th>
											<th id="custom_td">type Status</th>
											<th id="custom_td">Create date</th>
											<th id="custom_td">Last Updated</th>
											<th id="custom_td">Action</th>
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"select * from producttype");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
										<tr id="custom_tr">
											<td><?php echo htmlentities($cnt);?></td>
											<td id="cap_username"><?php echo htmlentities($row['productName']);?></td>
											<td id="cap_username"><?php echo htmlentities($row['productType']);?></td>
											<td><?php echo htmlentities($row['productTypeDescription']);?></td>
											<td><?php echo htmlentities($row['productTypeStatus']);?></td>
											<td> <?php echo htmlentities($row['createDate']);?></td>
											<td><?php echo htmlentities($row['updateDate']);?></td>
											<td>
											<a href="editProductType.php?productName=<?php echo $row['productName']?>"><i class="fa fa-plus"></i></a>
											<a href="productType.php?productName=<?php echo $row['productName']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-times"></i></a>
                      </td>
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
		    } );
		} );
</script>
</body>
<?php } ?>
