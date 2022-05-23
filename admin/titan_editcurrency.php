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
	$status=$_POST['status'];
	$rate=$_POST['rate'];

	$currencyToken=$_GET['currencyToken'];

$sql=mysqli_query($con,"UPDATE currency SET name='$name', status= '$status', rate='$rate', updateDate='$currentTime'
									WHERE currencyToken = '".$_GET['currencyToken']."'");
$_SESSION['msg']="Currency Updated !!";
header("location:titan_currency.php");
}

?>
<html lang="en">
<head>
	<title>Admin | Edit Currency</title>
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
		<h3 class="title">Currency</h3>
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
$query=mysqli_query($con,"SELECT * FROM currency WHERE currencyToken = '".$_GET['currencyToken']."'");
while($row=mysqli_fetch_array($query))
{
?>
                  <div class="adminform_div">
                    <label class="adminform_label" for="basicinput">name</label><br>
                    <input type="text"  name="name"  placeholder="Enter Name"  value="<?php echo htmlentities($row['name']); ?>" class="adminform_input" required>
                  </div>

                  <div class="adminform_div">
                    <label class="adminform_label" for="basicinput"> status</label><br>
                    <select name="status"  id="status" class="adminform_select" required>
                      <option value="<?php echo htmlentities($row['status']); ?>"><?php echo htmlentities($row['status']); ?></option>
                    <option value="active">active</option>
                    <option value="inactive">inactive</option>
                    </select>
                  </div>

                  <div class="adminform_div">
                    <label class="adminform_label" for="basicinput"> rate</label><br>
                    <input type="text" name="rate" value="<?php echo htmlentities($row['rate']);  ?>" class="adminform_input" required>
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
