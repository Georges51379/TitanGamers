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
	$URL=$_POST['URL'];
	$image=$_FILES['image']['name'];
	$form=$_POST['form'];
	$endDate=$_POST['endDate'];
	$status=$_POST['status'];
	$price=$_POST['price'];


	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$hashedString = '';

for ($i = 0 ; $i <= 10; $i++){
	  $index = rand(0, strlen($characters) - 1);
	  $hashedString .= $characters[$index];
}
$_SESSION['bannerToken'] = $hashedString;

//insert variable to DB
$sql=mysqli_query($con,"INSERT INTO banners (bannerToken, name, URL, image, endDate, form, status, price)
									VALUES('".$_SESSION['bannerToken']."', '$name', '$URL', '$image', '$endDate', '$form', '$status', '$price')");

$_SESSION['msg']="Banner Inserted Successfully !!";


//SOLVED
$bannerFileName = '';
	//DEBUGGING THE ERROR
$GetMaxIDQuery = mysqli_query($con, "SELECT MAX(id) AS maxID FROM banners");
  $fetchID = mysqli_fetch_array($GetMaxIDQuery);
	$maxIds = $fetchID['maxID']; // WORKED FINE!

for($x = 1; $x <= $maxIds; $x++){
	$query = mysqli_query($con, "SELECT name FROM banners WHERE id = $x ");
		$row = mysqli_fetch_array($query);
		$bannerFileName = $row['name'];

		$directory = "banner/".$bannerFileName;

		if(!file_exists($directory)){ // THE ERROR IS HERE
		 mkdir('banner/'.$bannerFileName);
	 	}

}//end FOR
move_uploaded_file($_FILES["image"]["tmp_name"],"banner/$bannerFileName/".$_FILES["image"]["name"]);
}
?>
<html lang="en">
<head>
	<title>Admin | Insert Banner</title>
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
		<h3 class="title">insert banner</h3>
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


			<form class="admin_form" name="insertbanner" method="post" enctype="multipart/form-data">

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">name</label><br>
					<input type="text"  name="name"  placeholder="Enter Name" class="adminform_input" required>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput"> URL</label><br>
					<input type="text"    name="URL"  placeholder="Enter URL" class="adminform_input" required>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">Image</label><br>
					<input type="file" name="image" id="image" value="" class="adminform_input" required>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">end date</label><br>
					<input type="date"    name="endDate"  placeholder="Enter End date" class="adminform_input" required>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">form</label><br>
					<select name="form"  id="form" class="adminform_select" required>
					<option value="">--Select an option--</option>
					<option value="landscape">landscape</option>
					<option value="portrait">portrait</option>
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
					<label class="adminform_label" for="basicinput"> price</label><br>
					<input type="text"    name="price"  placeholder="Enter price" class="adminform_input" required>
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
