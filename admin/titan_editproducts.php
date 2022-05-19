<?php
session_start();
include('db/connection.php');
if(strlen($_SESSION['email'])==0)
	{
header('location:index.php');
}
else{
	date_default_timezone_set('Asia/Beirut');
	$currentTime = date('d-m-Y h:i:s A', time() );

if(isset($_POST['submit']))//ss
{
	$category=$_POST['categoryName'];
	$subcat=$_POST['subcategoryName'];
	$productname=$_POST['productName'];
	$productcompany=$_POST['productCompany'];
	$productprice=$_POST['productprice'];
	$productpricebd=$_POST['productpricebd'];
	$productdescription=$_POST['productDescription'];
	$productscharge=$_POST['productShippingcharge'];
	$productavailability=$_POST['productAvailability'];
	$productTypeName=$_POST['productTypeName'];
	$productFeatured=$_POST['productFeatured'];
	$productStatus=$_POST['productStatus'];
	$productViews=$_POST['productViews'];

$sql=mysqli_query($con,"UPDATE products SET categoryName='$category',subcategoryName='$subcat',productName='$productname',
productCompany='$productcompany',productPrice='$productprice',productDescription='$productdescription',
shippingCharge='$productscharge',productAvailability='$productavailability',productTypeName='$productTypeName' ,productPriceBeforeDiscount='$productpricebd',
productFeatured='$productFeatured',productStatus='$productStatus',productViews='$productViews', updateDate='$currentTime' WHERE productToken = '".$_GET['prodName']."'");
$_SESSION['msg']="Product has been Updated Successfully !!";
header("location:titan_manageproducts.php");
}
?>

<html lang="en">
<head>
	<title>Admin | Edit Product</title>
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
	type: "POST",
	url: "titan_getsubcat.php",
	data: 'categoryName='+$("#categoryName").val(),
	success: function(data){
		$("#subcategory").html(data);
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
		<h3 class="title">edit products</h3>
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

<?php
$showProductQuery=mysqli_query($con,"SELECT products.*,category.categoryName AS catname,subcategory.subcategoryName AS subcatname,
	 producttype.productType AS prodType FROM products JOIN category ON category.categoryName=products.categoryName JOIN producttype ON
	 producttype.productType=products.productTypeName JOIN subcategory ON subcategory.subCategoryName=products.subCategoryName
   WHERE products.productToken='".$_GET['prodName']."' ");

$cnt=1;
while($row=mysqli_fetch_array($showProductQuery))
{
?>
<!--ERRORRR-->
									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">Category</label><br>
										<select name="categoryName" id="categoryName" class="adminform_select" onChange="getSubcat(this.value);"  required>
										<option value="<?php echo htmlentities($row['catname']);?>"><?php echo htmlentities($row['catname']);?></option>
										<?php $query=mysqli_query($con,"SELECT * FROM category");
										while($rw=mysqli_fetch_array($query))
										{
											if($row['catname']==$rw['categoryName'])
											{
												continue;
											}
											else{
											?>
										<option value="<?php echo $rw['categoryName'];?>"><?php echo $rw['categoryName'];?></option>
										<?php }} ?>
										</select>
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">Sub Category</label><br>
										<select   name="subcategoryName"  id="subcategory" class="adminform_select" required>
											<option value="<?php echo htmlentities($row['subcatname']);?>"><?php echo htmlentities($row['subcatname']);?></option>
										</select>
									</div>
<!--end ERRORRR-->

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">Product Name</label><br>
										<input type="text"    name="productName"  placeholder="Enter Product Name" value="<?php echo htmlentities($row['productName']);?>" class="adminform_input" >
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">Product Company</label><br>
										<input type="text"    name="productCompany"  placeholder="Enter Product Comapny Name"	value="<?php echo htmlentities($row['productCompany']);?>" class="adminform_input" required>
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">Product Price Before Discount</label><br>
										<input type="text"    name="productpricebd"  placeholder="Enter Product Price" value="<?php echo htmlentities($row['productPriceBeforeDiscount']);?>"  class="adminform_input" required>
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">Product Price</label><br>
										<input type="text"    name="productprice"  placeholder="Enter Product Price"	value="<?php echo htmlentities($row['productPrice']);?>" class="adminform_input" required>
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">Product Description</label><br>
										<textarea  name="productDescription"  placeholder="Enter Product Description" rows="6" class="adminform_textarea">
											<?php echo htmlentities($row['productDescription']);?>
										</textarea>
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">Product Shipping Charge</label><br>
										<input type="text"    name="productShippingcharge"  placeholder="Enter Product Shipping Charge"	 value="<?php echo htmlentities($row['shippingCharge']);?>" class="adminform_input" required>
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">Product Availability</label><br>
										<select   name="productAvailability"  id="productAvailability" class="adminform_select" required>
										<option value="<?php echo htmlentities($row['productAvailability']);?>"><?php echo htmlentities($row['productAvailability']);?></option>
										<option value="In Stock">In Stock</option>
										<option value="Out of Stock">Out of Stock</option>
										</select>
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">Product Type</label><br>
										<select name="productTypeName" class="adminform_select" required>
										<option><?php echo htmlentities($row['prodType']);?></option>
										<?php $query=mysqli_query($con,"SELECT * FROM producttype");
										while($rw=mysqli_fetch_array($query))
										{	?>
										<option><?php echo $rw['productType'];?></option>
										<?php }?>
										</select>
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">Product featured</label><br>
										<input type="text" name="productFeatured"  placeholder="Enter Product featured" value="<?php echo htmlentities($row['productFeatured']);?>" class="adminform_input" >
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">Product Status</label><br>
										<select   name="productStatus"  id="productStatus" class="adminform_select" required>
										<option value="<?php echo htmlentities($row['productStatus']);?>"><?php echo htmlentities($row['productStatus']);?></option>
										<option value="Active">Active</option>
										<option value="Inactive">Inactive</option>
										</select>
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">Product views</label><br>
										<input type="text" name="productViews"  placeholder="Enter Product views" value="<?php echo htmlentities($row['productViews']);?>" class="adminform_input" >
									</div>

									<div class="adminform_div">
									<label class="adminform_label" for="basicinput">Product Image1</label><br>
									<img src="productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>"
									width="60" height="60">
									<a href="titan_updateimage1.php?prodName=<?php echo $row['productName'];?>">Change Image</a>
									</div>

									<div class="adminform_div">
									<label class="adminform_label" for="basicinput">Product Image2</label><br>
									<img src="productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage2']);?>" width="60" height="60">
									 <a href="titan_updateimage2.php?prodName=<?php echo $row['productName'];?>">Change Image</a>
									</div>

										<div class="adminform_div">
										<label class="adminform_label" for="basicinput">Product Image3</label><br>
										<img src="productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage3']);?>" width="60" height="60">
										 <a href="titan_updateimage3.php?prodName=<?php echo $row['productName'];?>">Change Image</a>
										</div>
										<?php } ?>
											<div class="adminform_div">
												<button type="submit" name="submit" class="adminform_btn">Update</button>
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
