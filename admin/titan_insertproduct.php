<?php
session_start();
include('db/connection.php');
if(strlen($_SESSION['email'])==0)
	{
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
	$categoryName=$_POST['categoryName'];
	$subcategoryName=$_POST['subcategoryName'];
	$productName=$_POST['productName'];
	$productCompany=$_POST['productCompany'];
	$productCompanyURL=$_POST['productCompanyURL'];
	$productPrice=$_POST['productPrice'];
	$productPriceBeforeDiscount=$_POST['productPriceBeforeDiscount'];
	$productDescription=$_POST['productDescription'];
	$shippingCharge=$_POST['shippingCharge'];
	$productAvailability=$_POST['productAvailability'];
	$productTypeName=$_POST['productTypeName'];
	$productFeatured=$_POST['productFeatured'];
	$productStatus=$_POST['productStatus'];
	$productViews=$_POST['productViews'];
	$productImage1=$_FILES['productImage1']['name'];
	$productImage2=$_FILES['productImage2']['name'];
	$productImage3=$_FILES['productImage3']['name'];

$hashedString = bin2hex(random_bytes(25));
$_SESSION['productToken'] = $hashedString;

//insert variable to DB
$sql=mysqli_query($con,"INSERT INTO products (categoryName,subcategoryName,productToken,productName,productCompany,productCompanyURL,productPrice,
productDescription,shippingCharge,productAvailability,productTypeName,productFeatured,productStatus,productViews,
productImage1,productImage2,productImage3,productPriceBeforeDiscount) VALUES('$categoryName','$subcategoryName','".$_SESSION['productToken']."',
'$productName','$productCompany','$productCompanyURL','$productPrice','$productDescription','$shippingCharge','$productAvailability',
'$productTypeName','$productFeatured','$productStatus','$productViews','$productImage1','$productImage2','$productImage3',
'$productPriceBeforeDiscount')");

$_SESSION['msg']="Product Inserted Successfully !!";


//SOLVED
$productFileName = '';
	//DEBUGGING THE ERROR
$GetMaxIDQuery = mysqli_query($con, "SELECT MAX(id) AS maxID FROM products");
  $fetchID = mysqli_fetch_array($GetMaxIDQuery);
	$maxIds = $fetchID['maxID']; // WORKED FINE!

for($x = 1; $x <= $maxIds; $x++){
	$query = mysqli_query($con, "SELECT productName FROM products WHERE id = $x ");
		$row = mysqli_fetch_array($query);
		$productFileName = $row['productName'];

		$directory = "productimages/".$productFileName;

		if(!file_exists($directory)){ // THE ERROR IS HERE
		 mkdir('productimages/'.$productFileName);
	 	}

}//end FOR
move_uploaded_file($_FILES["productImage1"]["tmp_name"],"productimages/$productFileName/".$_FILES["productImage1"]["name"]);
move_uploaded_file($_FILES["productImage2"]["tmp_name"],"productimages/$productFileName/".$_FILES["productImage2"]["name"]);
move_uploaded_file($_FILES["productImage3"]["tmp_name"],"productimages/$productFileName/".$_FILES["productImage3"]["name"]);

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

function checkProdName(){
	$.ajax({
		url: "check/checkProdName.php",
		data: "productName="+$("#productName").val(),
		method: "POST",
		success: function(data){
			$("#productNameAvailability").html(data);
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
					<input type="text" id="productName" onblur="checkProdName()" name="productName"  placeholder="Enter Product Name" class="adminform_input" required><br>
					<span id="productNameAvailability"></span>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">Product Company</label><br>
					<input type="text"    name="productCompany"  placeholder="Enter Product Comapny Name" class="adminform_input" required>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">Product Company URL</label><br>
					<input type="text"    name="productCompanyURL"  placeholder="Enter Product Comapny Name URL" class="adminform_input" required>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">Product Price Before Discount</label><br>
					<input type="text"    name="productPriceBeforeDiscount"  placeholder="Enter Product Price" class="adminform_input" required>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">Product Price After Discount(Selling Price)</label><br>
					<input type="text"    name="productPrice"  placeholder="Enter Product Price" class="adminform_input" required>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">Product Description</label><br>
					<textarea  name="productDescription"  placeholder="Enter Product Description" rows="6" class="adminform_textarea">
					</textarea>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">Product Shipping Charge</label><br>
					<input type="text"    name="shippingCharge"  placeholder="Enter Product Shipping Charge" class="adminform_input" required>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">Product Availability</label><br>
					<select   name="productAvailability"  id="productAvailability" class="adminform_select" required>
					<option value="">Select</option>
					<option value="In Stock">In Stock</option>
					<option value="Out of Stock">Out of Stock</option>
					</select>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">Product Type</label><br>
					<select   name="productTypeName"  id="productType" class="adminform_select" required>
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
					<label class="adminform_label" for="basicinput">Product featured</label><br>
					<input type="text" name="productFeatured"  placeholder="Enter Product Featured" class="adminform_input" required>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">Product status</label><br>
					<select   name="productStatus"  id="productStatus" class="adminform_select" required>
					<option value="--Select An Option--">--Select An Option--</option>
					<option value="Active">Active</option>
					<option value="Inactive">Inactive</option>
					</select>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">Product views</label><br>
					<input type="text" name="productViews"  placeholder="Enter Product Views" class="adminform_input" required>
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
					<button type="submit" name="submit" id="btn" class="adminform_btn">Insert</button>
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
<?php } ?>
