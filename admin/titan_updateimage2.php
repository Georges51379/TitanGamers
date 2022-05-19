<?php
session_start();
include('db/connection.php');
if(strlen($_SESSION['email'])==0)
	{
header('location:index.php');
}
else{
	$prodName = $_GET['prodName'];

if(isset($_POST['submit']))
{
	$productname=$_POST['productName'];
	$productimage2=$_FILES["productimage2"]["name"];

	move_uploaded_file($_FILES["productimage2"]["tmp_name"],"productimages/$prodName/".$_FILES["productimage2"]["name"]);
	$sql=mysqli_query($con,"UPDATE  products SET productImage2='$productimage2' WHERE productName='$prodName' ");
$_SESSION['msg']="Product Image Updated Successfully !!";
}
?>
<html lang="en">
<head>
	<title>Admin | Update Product Image</title>
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
		<h3 class="title">update product image</h3>
	</div>
	<div class="wrapper">
				<?php if(isset($_POST['submit']))
	{?>
				<div class="msgwrapper">
				<strong  class="positivemsg">Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
				</div>
	<?php } ?>
	<br />
	<!--***********************************END ADD DELETE CATEGORY MSG*******************************************************-->
			<form class="admin_form" name="insertproduct" method="post" enctype="multipart/form-data">

<?php
$query=mysqli_query($con,"SELECT productName,productImage2 FROM products WHERE productName='$prodName'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
				<div class="adminform_div">
				<label class="adminform_label" for="basicinput">Product Name</label><br>
				<input type="text" name="productName"  readonly value="<?php echo htmlentities($row['productName']);?>" class="adminform_input" required>
				</div>

				<div class="adminform_div">
				<label class="adminform_label" for="basicinput">Current Product Image1</label><br>
				<img src="productimages/<?php echo htmlentities($prodName);?>/<?php echo htmlentities($row['productImage2']);?>" width="200" height="100">
				</div>

				<div class="adminform_div">
				<label class="adminform_label" for="basicinput">New Product Image2</label><br>
				<input type="file" name="productimage2" id="productimage2" value="" class="adminform_input" required>
				</div>
				<?php } ?>

				<div class="adminform_div">
						<button type="submit" name="submit" class="adminform_btn">Update</button>
				</div>
			</form>
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
