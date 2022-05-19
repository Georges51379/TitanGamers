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
	$name=$_POST['name'];
	$type=$_POST['type'];
	$discount=$_POST['discount'];
	$status=$_POST['status'];
	$validDate=$_POST['validDate'];


	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$hashedString = '';

for ($i = 0 ; $i <= 10; $i++){
	  $index = rand(0, strlen($characters) - 1);
	  $hashedString .= $characters[$index];
}
$_SESSION['couponToken'] = $hashedString;

//insert variable to DB
$sql=mysqli_query($con,"INSERT INTO coupon (couponToken, name, type, discount, status, validDate)
									VALUES('".$_SESSION['couponToken']."', '$name', '$type', '$discount', '$status', '$validDate')");

$_SESSION['msg']="Coupon Inserted Successfully !!";

}
?>
<html lang="en">
<head>
  	<title>Admin | Add Coupon</title>
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
		<h3 class="title">Add Coupon</h3>
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


			<form class="admin_form" name="insertcoupon" method="post" enctype="multipart/form-data">

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">name</label><br>
					<input type="text"  name="name"  placeholder="Enter Name" class="adminform_input" required>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput"> type</label><br>
          <select name="type"  id="type" class="adminform_select" required>
          <option value="">--Select an option--</option>
          <option value="commercial">commercial</option>
          <option value="red cross">red cross</option>
          <option value="marketing">marketing</option>
          <option value="political">political</option>
          <option value="non-benefital">non-benefital</option>
          </select>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">discount</label><br>
          <select name="discount"  id="discount" class="adminform_select" required>
          <option value="">--Select an option--</option>
          <option value="1%">1%</option>
          <option value="2%">2%</option>
          <option value="3%">3%</option>
          <option value="4%">4%</option>
          <option value="5%">5%</option>
          <option value="6%">6%</option>
          <option value="7%">7%</option>
          <option value="8%">8%</option>
          <option value="9%">9%</option>
          <option value="10%">10%</option>
          <option value="11%">11%</option>
          <option value="12%">12%</option>
          <option value="13%">13%</option>
          <option value="14%">14%</option>
          <option value="15%">15%</option>
          <option value="16%">16%</option>
          <option value="17%">17%</option>
          <option value="18%">18%</option>
          <option value="19%">19%</option>
          <option value="20%">20%</option>
          <option value="21%">21%</option>
          <option value="22%">22%</option>
          <option value="23%">23%</option>
          <option value="24%">24%</option>
          <option value="25%">25%</option>
          <option value="26%">26%</option>
          <option value="27%">27%</option>
          <option value="28%">28%</option>
          <option value="29%">29%</option>
          <option value="30%">30%</option>
          <option value="31%">31%</option>
          <option value="32%">32%</option>
          <option value="33%">33%</option>
          <option value="34%">34%</option>
          <option value="35%">35%</option>
          <option value="36%">36%</option>
          <option value="37%">37%</option>
          <option value="38%">38%</option>
          <option value="39%">39%</option>
          <option value="40%">40%</option>
        </select>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput"> status</label><br>
					<select name="status"  id="status" class="adminform_select" required>
					<option value="">--Select an option--</option>
					<option value="active">active</option>
					<option value="inactive">inactive</option>
					</select>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput"> valid Date</label><br>
					<input type="date" name="validDate" class="adminform_input" required>
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
