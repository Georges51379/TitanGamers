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
	$email=$_POST['email'];
	$phone=$_POST['phone'];
  $password = $_POST['password'];
	$shippingAddress=$_POST['shippingAddress'];
	$shippingState=$_POST['shippingState'];
	$shippingCity=$_POST['shippingCity'];
	$shippingPinCode=$_POST['shippingPinCode'];
	$donationCoupon=$_POST['donationCoupon'];
  $status=$_POST['status'];
  $userStatus=$_POST['userStatus'];

  $hashedpwd = password_hash($password, PASSWORD_BCRYPT);
  $code = rand(999999, 111111);

	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$hashedString = '';
	for ($i = 0 ; $i <= 10; $i++){
		  $index = rand(0, strlen($characters) - 1);
		  $hashedString .= $characters[$index];
	}
	$_SESSION['userToken'] = $hashedString;


  //insert variable to DB
  $sql=mysqli_query($con,"INSERT INTO users (userToken, name,email,phone,password,shippingAddress,shippingState,shippingCity,shippingPinCode,
  donationCoupon,code, status,userStatus) VALUES('".$_SESSION['userToken']."', '$name','$email','$phone',
  '$hashedpwd','$shippingAddress','$shippingState','$shippingCity','$shippingPinCode','$donationCoupon','$code','$status','$userStatus')");
  $_SESSION['msg']="User Created Successfully !!";

}
?>
<html lang="en">
<head>
	<title>Admin | Insert User</title>
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
		<h3 class="title">insert user</h3>
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
					<label class="adminform_label" for="basicinput">name</label><br>
					<input type="text"    name="name"  placeholder="Enter Name" class="adminform_input" required>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">email</label><br>
					<input type="email"    name="email"  placeholder="Enter email" class="adminform_input" required>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">phone</label><br>
					<input type="text"    name="phone"  placeholder="Enter phone" class="adminform_input" required>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">password</label><br>
					<input type="password" name="password"  placeholder="Enter password" class="adminform_input" required>
				</div>

        <div class="adminform_div">
          <label class="adminform_label" for="basicinput">shipping address </label><br>
          <textarea  name="shippingAddress"  placeholder="Enter shipping Address" rows="6" class="adminform_textarea">
          </textarea>
        </div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">shipping State</label><br>
					<input type="text"    name="shippingState"  placeholder="Enter shipping State" class="adminform_input" required>
				</div>



				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">shipping city</label><br>
					<input type="text"    name="shippingCity"  placeholder="Enter shipping City" class="adminform_input" required>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">shipping pin Code</label><br>
          <input type="text"    name="shippingPinCode"  placeholder="Enter shipping Pin Code" class="adminform_input" required>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">donation coupon</label><br>
					<select type="text" name="donationCoupon"  placeholder="Enter donation Coupon" class="adminform_input" required>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">status</label><br>
					<input type="text" name="status"  placeholder="Enter Status" class="adminform_input" required>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">user status</label><br>
					<select type="text" name="userStatus" class="adminform_input" required>
						<option value="--Select An Option--">-Select An Option--</option>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
          </select>
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
<?php } ?>
