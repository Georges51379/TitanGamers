<?php
session_start();
include('db/connection.php');
if(strlen($_SESSION['email'])==0)
	{
header('location:index.php');
}
else{
if(isset($_GET['del']))
		  {
		        mysqli_query($con,"UPDATE products SET productStatus = 'Inactive' WHERE productToken = '".$_GET['prodName']."'");
                  $_SESSION['delmsg']="Product deleted !!";
		  }

if(isset($_POST['truncateManageProductsTable'])){
		mysqli_query($con,"TRUNCATE TABLE products");
		$_SESSION['delmsg'] = "TABLE HAS BEEN EMPTY SUCCESSFULLY!!";
}
?>
<html>
<head>
	<title>Admin | Manage Products</title>
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
			<h1 class="title"> products</h1>
			<h4 class="subtitle"><a href="titan_insertproduct.php" class="subtitle-link">insert product</a></h4>
		</div>

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
			<button type="submit" name="truncateManageProductsTable" class="adminform_btn" onClick="return confirm('Are you sure you want to Empty this Table?')">Empty Table</button>
		</form>
</div>
</center>
							<table id="datable" class="display" style="width:100%">
									<thead>
										<tr>
											<th id="custom_td">#</th>
											<th id="custom_td">Product Name</th>
											<th id="custom_td">Category </th>
											<th id="custom_td">Subcategory</th>
											<th id="custom_td">Company Name</th>
											<th id="custom_td">featured</th>
											<th id="custom_td">status</th>
											<th id="custom_td">views</th>
											<th id="custom_td">Product Creation Date</th>
											<th id="custom_td">last updated</th>
											<th id="custom_td">Action</th>
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"SELECT products.*,category.categoryName,
subcategory.subcategoryName FROM products JOIN category ON category.categoryName=products.categoryName
JOIN subcategory ON subcategory.subcategoryName=products.subCategoryName");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
										<tr id="custom_tr">
											<td><?php echo htmlentities($cnt);?></td>
											<td id="cap_username"><?php echo htmlentities($row['productName']);?></td>
											<td><?php echo htmlentities($row['categoryName']);?></td>
											<td> <?php echo htmlentities($row['subcategoryName']);?></td>
											<td><?php echo htmlentities($row['productCompany']);?></td>
											<td><?php echo htmlentities($row['productFeatured']);?></td>
											<td><?php echo htmlentities($row['productStatus']);?></td>
											<td><?php echo htmlentities($row['productViews']);?></td>
											<td><?php echo htmlentities($row['postDate']);?></td>
											<td><?php echo htmlentities($row['updateDate']);?></td>
											<td>
											<a href="titan_editproducts.php?prodName=<?php echo $row['productToken']?>" ><i class="fa fa-plus"></i></a>
											<a href="titan_manageproducts.php?prodName=<?php echo $row['productToken']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-times"></i></a></td>
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
