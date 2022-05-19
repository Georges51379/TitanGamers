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
	$categoryName=$_POST['categoryName'];
	$subcategoryName=$_POST['subcategoryName'];
	$subcategoryStatus= $_POST['subcategoryStatus'];

	$subcatName=$_GET['subcatName'];

$sql=mysqli_query($con,"update subcategory set categoryName='$categoryName',subcategoryName='$subcategoryName',subcategoryStatus='$subcategoryStatus',
updateDate='$currentTime' where subcategoryToken = '".$_GET['subcatName']."'");
$_SESSION['msg']="Sub-Category Updated !!";
}

?>
<html lang="en">
<head>
	<title>Admin | Edit Sub Category</title>
	<link type="text/css" href="images/icons/logo.png" rel="shortcut icon">
	<link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--FONT AWESOME CDN SECTION-->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--jQUERY CDN SECTION-->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

			<link href="css/admindatatable.css" rel="stylesheet">

	</head>
	<body>

		<?php include('include/header.inc.php');?>
		<?php include('include/sidebar.inc.php');?>


		<div class="titlewrapper">
			<h3 class="title">Edit Sub Category</h3>
		</div>

		<!--**********************START ADD DELETE CATEGORY MSG********************************************************************-->

		<div class="wrapper">
					<?php if(isset($_POST['submit']))
		{?>
					<div class="msgwrapper">
					<strong  class="positivemsg">Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
					</div>
		<?php } ?>
		<br />
		<!--***********************************END ADD DELETE CATEGORY MSG*******************************************************-->

			<form class="admin_form" name="Category" method="post" >
<?php

$query=mysqli_query($con,"select category.categoryName,subcategory.subcategoryName,subcategory.subcategoryToken,
subcategory.subcategoryDescription, subcategory.subcategoryStatus, subcategory.createDate,
subcategory.updateDate from subcategory join category on category.categoryName=subcategory.categoryName where subcategoryToken= '".$_GET['subcatName']."'");
while($row=mysqli_fetch_array($query))
{
?>
								<div class="adminform_div">
									<label class="adminform_label" for="basicinput">Category</label><br>
									<select name="categoryName" class="adminform_select" required>
										<option value="<?php echo htmlentities($row['categoryName']);?>"><?php echo htmlentities($catname=$row['categoryName']);?></option>
								<?php $ret=mysqli_query($con,"select * from category");
								while($result=mysqli_fetch_array($ret))
								{
								echo $cat=$result['categoryName'];
								if($catname==$cat)
								{
									continue;
								}
								else{
								?>
								<option value="<?php echo $result['categoryName'];?>"><?php echo $result['categoryName'];?></option>
								<?php } }?>
								</select>
								</div>

								<div class="adminform_div">
									<label class="adminform_label" for="basicinput">SubCategory Name</label><br>
									<input type="text" placeholder="Enter subcategory Name"  name="subcategoryName" value="<?php echo  htmlentities($row['subcategoryName']);?>" class="adminform_input" required>
								</div>

								<div class="adminform_div">
										<label class="adminform_label" for="basicinput">Description</label><br>
										<textarea class="adminform_textarea" name="subcategoryDescription" rows="5"><?php echo  htmlentities($row['subcategoryDescription']);?></textarea>
								</div>

								<div class="adminform_div">
									<label class="adminform_label" for="basicinput">subcategory Status</label><br>
									<select name="subcategoryStatus" class="adminform_select">
										<option value="<?php echo htmlentities($row['subcategoryStatus']) ?>"><?php echo htmlentities($row['subcategoryStatus']) ?></option>
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
