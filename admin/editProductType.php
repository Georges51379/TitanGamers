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

$productName = $_GET['productName'];

$sql=mysqli_query($con,"UPDATE producttype SET productName='$productName',productType='$productType',productTypeDescription='$productTypeDescription' ,
	productTypeStatus = '$productTypeStatus',updateDate='$currentTime' WHERE productName='".$_GET['productName']."'");
$_SESSION['msg']="Type Updated !!";

}
?>
<html lang="en">
<head>
	<title>Admin | Type Laptop</title>
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
		<h3 class="title">Laptop Type</h3>
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

			<form class="admin_form" name="laptopType" method="post" >
<?php
$productName = $_GET['productName'];

$query=mysqli_query($con,"SELECT * FROM producttype WHERE productName='$productName'");
while($row=mysqli_fetch_array($query))
{
?>
										<div class="adminform_div">
											<label class="adminform_label" for="basicinput">product Name</label><br>
											<input type="text" placeholder="Enter product Name" name="productName" value="<?php echo  htmlentities($row['productName']);?>" class="adminform_input" required>
										</div>

									<div class="adminform_div">
											<label class="adminform_label" for="basicinput">product Type</label><br>
											<select name="productType" class="adminform_select" required>
												<option value="<?php echo htmlentities($row['productType']);?>"><?php echo htmlentities($row['productType']);?></option>

												<option value="business">business</option>
												<option value="convertible">convertible</option>
												<option value="low end gaming">low end gaming</option>
												<option value="mid end gaming">mid end gaming</option>
												<option value="high end gaming">high end gaming</option>
												<option value="desktop replacement">desktop replacement</option>
											</select>
									</div>

										<div class="adminform_div">
											<label class="adminform_label" for="basicinput"> Type Description</label><br>
											<textarea class="adminform_textarea" name="productTypeDescription" rows="5"><?php echo  htmlentities($row['productTypeDescription']);?></textarea>
										</div>


										<div class="adminform_div">
											<label class="adminform_label" for="basicinput">product Type Status</label><br>
											<select name="productTypeStatus" class="adminform_select" required>
												<option value="<?php echo htmlentities($row['productTypeStatus']); ?>"><?php echo htmlentities($row['productTypeStatus']); ?></option>
												<option value="Active">Active</option>
												<option value="Inactive">Inactive</option>
											</select>
										</div>

									<?php } ?>
										<div class="adminform_div">
												<button type="submit" name="submit" class="adminform_btn">Update</button>
										</div>
									</form>
							</div>
						</div>
						<div>
						</center>

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
