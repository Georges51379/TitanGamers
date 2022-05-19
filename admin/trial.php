<?php

session_start();
include('db/connection.php');

if(isset($_POST['submit']))
{
	$categoryName=$_POST['categoryName'];
	$subcategoryName=$_POST['subcategoryName'];
	$productName=$_POST['productName'];
	$productStatus=$_POST['productStatus'];
	$productImage1=$_FILES['productImage1']['name'];
	$productImage2=$_FILES['productImage2']['name'];
	$productImage3=$_FILES['productImage3']['name'];

//error here try to fix it while debugging
$query=mysqli_query($con,"SELECT productName FROM products");
	$result=mysqli_fetch_array($query);
	 $productFile=$result['productName'];
	$dir="productimages/'$productFile'";

if(!is_dir($dir)){
		mkdir("productimages/".$productFile);
	}
	move_uploaded_file($_FILES["productImage1"]["tmp_name"],"productimages/$productFile/".$_FILES["productImage1"]["name"]);
	move_uploaded_file($_FILES["productImage2"]["tmp_name"],"productimages/$productFile/".$_FILES["productImage2"]["name"]);
	move_uploaded_file($_FILES["productImage3"]["tmp_name"],"productimages/$productFile/".$_FILES["productImage3"]["name"]);

$sql=mysqli_query($con,"INSERT INTO products (categoryName,subcategoryName,productName,productStatus, productImage1,productImage2,productImage3)
 VALUES('$categoryName','$subcategoryName','$productName', '$productStatus','$productViews','$productImage1','$productImage2','$productImage3')");

$_SESSION['msg']="Product Inserted Successfully !!";
}
?>

<html lang="en">
<head>
	<title>Admin | Insert Product</title>
	<link type="text/css" href="images/icons/logo.png" rel="shortcut icon">
	<link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
<!--FONT AWESOME CDN SECTION-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--jQUERY CDN SECTION-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

				<link href="css/admin.css" rel="stylesheet">

   <script>
function getSubcat(val) {
	$.ajax({
	url: "titan_getsubcat.php",
	data: 'categoryName='+$("#categoryName").val(),
	type: "POST",
	success: function(data){
		$("#subcategoryName").html(data);
	}
	});
}

</script>
</head>

<body>
	<?php include('include/sidebar.inc.php');?>

	<center>
		<div class="container">
	<div class="titlewrapper">
		<h3 class="title">insert product</h3>
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

			<form class="admin_form" name="insertproduct" method="post" enctype="multipart/form-data">
				<div class="adminform_div">
				<label class="adminform_label" for="basicinput">Category</label><br>
				<select name="categoryName" id="categoryName"  class="adminform_select" onchange="getSubcat()"  required>
				<option value="">Select Category</option>
				<?php $query=mysqli_query($con,"select * from category");
				while($row=mysqli_fetch_array($query))
				{?>
				<option value="<?php echo htmlentities($row['categoryName']);?>"><?php echo htmlentities($row['categoryName']);?></option>
				<?php } ?>
				</select>
				</div>
				<div class="adminform_div">
				<label class="adminform_label" for="basicinput">Sub Category</label><br>
				<select name="subcategoryName" id="subcategoryName" class="adminform_select" required>
				</select>
				</div>
				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">Product Name</label><br>
					<input type="text"    name="productName"  placeholder="Enter Product Name" class="adminform_input" required>
				</div>
				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">Product status</label><br>
					<input type="text" name="productStatus"  placeholder="Enter Product Status" class="adminform_input" required>
				</div>
				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">Product Image1</label><br>
					<input type="file" name="productImage1" id="productimage1" value="" class="adminform_input" required>
				</div>
				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">Product Image2</label><br>
					<input type="file" name="productImage2"  class="adminform_input" required>
				</div>
				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">Product Image3</label><br>
					<input type="file" name="productImage3"  class="adminform_input">
				</div>
				<div class="adminform_div">
					<button type="submit" name="submit" class="adminform_btn">Insert</button>
				</div>
			</form>
		</div>
	</div>
</div>
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
	    });
			});
		</script>

</body>
