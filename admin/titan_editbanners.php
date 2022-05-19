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
	$name=$_POST['name'];
	$URL=$_POST['URL'];
  $endDate=$_POST['endDate'];
  $form=$_POST['form'];
  $status=$_POST['status'];
	$price=$_POST['price'];

	$bannerToken=$_GET['bannerToken'];

$sql=mysqli_query($con,"UPDATE banners SET name='$name',URL='$URL', endDate='$endDate', form = '$form', status= '$status', price='$price', updateDate='$currentTime'
									WHERE bannerToken = '".$_GET['bannerToken']."'");
$_SESSION['msg']="Category Updated !!";
header("location:titan_banners.php");
}

?>
<html lang="en">
<head>
	<title>Admin | Edit Banners</title>
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
		<h3 class="title">Banner</h3>
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

			<form class="admin_form" name="Banner" method="post" >
<?php
$query=mysqli_query($con,"SELECT * FROM banners WHERE bannerToken = '".$_GET['bannerToken']."'");
while($row=mysqli_fetch_array($query))
{
?>
										<div class="adminform_div">
											<label class="adminform_label" for="basicinput"> Name</label>
											<input type="text" placeholder="Enter Name" name="name" value="<?php echo  htmlentities($row['name']);?>" class="adminform_input" required>
										</div>

										<div class="adminform_div">
												<label class="adminform_label" for="basicinput">URL</label>
                        <input type="url" placeholder="Enter URL" name="URL" value="<?php echo  htmlentities($row['URL']);?>" class="adminform_input" required>
                    </div>

                    <div class="adminform_div">
											<label class="adminform_label" for="basicinput"> end date</label>
											<input type="date" placeholder="Enter end date" name="endDate" value="<?php echo  htmlentities($row['endDate']);?>" class="adminform_input" required>
										</div>

										<div class="adminform_div">
											<label class="adminform_label" for="basicinput">form</label>
											<select type="text" placeholder="Enter form" name="form" class="adminform_input" required>
												<option value="<?php echo  htmlentities($row['form']);?>"><?php echo  htmlentities($row['form']);?></option>
												<option value="landscape">landscape</option>
												<option value="portrait">portrait</option>
											</select>
										</div>

                    <div class="adminform_div">
                      <label class="adminform_label" for="basicinput">status</label>
                      <select type="text" placeholder="Enter status" name="status" class="adminform_input" required>
                        <option value="<?php echo  htmlentities($row['status']);?>"><?php echo  htmlentities($row['status']);?></option>
                        <option value="active">active</option>
                        <option value="inactive">inactive</option>
                      </select>
                    </div>

                    <div class="adminform_div">
											<label class="adminform_label" for="basicinput"> price</label>
											<input type="text" placeholder="Enter price" name="price" value="<?php echo  htmlentities($row['price']);?>" class="adminform_input" required>
										</div>

                    <div class="adminform_div">
  									<label class="adminform_label" for="basicinput">image</label><br>
  									<img src="banner/<?php echo htmlentities($row['image']);?>/<?php echo htmlentities($row['image']);?>"
  									width="60" height="60">
  									<a href="titan_updateBannerImage.php?bannerName=<?php echo $row['name'];?>">Change Image</a>
  									</div>

									<?php } ?>
										<div class="adminform_div">
												<button type="submit" name="submit" id="btn" class="adminform_btn">Update</button>
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
		    } );
		} );
</script>
</body>
<?php } ?>
