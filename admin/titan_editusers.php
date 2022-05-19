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

	$userToken = $_GET['userToken'] ;// USERS EMAIL

if(isset($_POST['submit']))//ss
{
  $name =$_POST['name'];
  $email =$_POST['email'];
  $phone =$_POST['phone'];
  $shippingAddress =$_POST['shippingAddress'];
  $shippingState =$_POST['shippingState'];
  $shippingCity =$_POST['shippingCity'];
	$shippingPinCode = $_POST["shippingPinCode"];
  $userStatus =$_POST['userStatus'];
  $status =$_POST['status'];

$sql=mysqli_query($con,"UPDATE  users SET name='$name',email='$email',phone='$phone', shippingAddress='$shippingAddress',shippingState='$shippingState',shippingCity='$shippingCity',
	shippingPinCode='$shippingPinCode',userStatus='$userStatus', status='$status', updateDate='$currentTime'
	 WHERE userToken='$userToken' ");
$_SESSION['msg']="USER has been Updated Successfully !!";
}
?>

<html lang="en">
<head>
	<title>Admin | Insert Users</title>
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
		<h3 class="title">edit users</h3>
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

			<form class="admin_form" name="insertuser" method="post" enctype="multipart/form-data">

<?php
$query=mysqli_query($con,"SELECT * FROM users WHERE userToken='$userToken'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">userName</label><br>
										<input type="text"  name="name"  placeholder="Enter user Name" value="<?php echo htmlentities($row['name']);?>" class="adminform_input" >
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">email</label><br>
										<input type="text"    name="email"  placeholder="Enter email"	value="<?php echo htmlentities($row['email']);?>" class="adminform_input" required>
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">phone</label><br>
										<input type="text"    name="phone"  placeholder="Enter contact number" value="<?php echo htmlentities($row['phone']);?>"  class="adminform_input" required>
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">shipping address</label><br>
										<textarea  name="shippingAddress"  placeholder="Enter shipping address" rows="6" class="adminform_textarea">
											<?php echo htmlentities($row['shippingAddress']);?>
										</textarea>
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">shipping state</label><br>
										<input type="text" name="shippingState"  placeholder="Enter shipping state"	 value="<?php echo htmlentities($row['shippingState']);?>" class="adminform_input" required>
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">shipping city</label><br>
                    <input type="text" name="shippingCity"  placeholder="Enter shipping city" value="<?php echo htmlentities($row['shippingCity']);?>" class="adminform_input" required>
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">shipping Pincode</label><br>
										<input type="text" name="shippingPinCode"  placeholder="Enter shipping Pincode" value="<?php echo htmlentities($row['shippingPinCode']);?>" class="adminform_input" >
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">user Status</label><br>
										<select class="adminform_select" name="userStatus">
											<option value="<?php echo htmlentities($row['userStatus']); ?>"><?php echo htmlentities($row['userStatus']); ?></option>
											<option value="Active">Active</option>
											<option value="Inactive">Inactive</option>
										</select>
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">status</label><br>
										<input type="text" name="status"  placeholder="Enter status" value="<?php echo htmlentities($row['status']);?>" class="adminform_input" >
									</div>

										<?php } ?>
											<div class="adminform_div">
												<button type="submit" name="submit" class="adminform_btn">Update</button>
											</div>
									</form>
							</div>
						</div>
</center>
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
