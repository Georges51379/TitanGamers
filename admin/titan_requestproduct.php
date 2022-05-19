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

if(isset($_GET['del'])){
	mysqli_query($con,"UPDATE requestproduct SET requestAvailability = 0 WHERE id = '".$_GET['requestid']."'");
	$_SESSION['delmsg']= 'Request Deleted!!';
	header("location: titan_requestproduct.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin | Requested Products</title>
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
	<h3 class="title">requests</h3>
</div>

<div class="wrapper">
<?php if(isset($_GET['del']))
{?>
		<div class="msgwrapper">
		<strong class="msg">Oh Noo!</strong><?php echo ($_SESSION['delmsg']);?>
		<?php echo htmlentities($_SESSION['delmsg']="");?>
		</div>
<?php } ?>
		<br />
</center>
										<table id="datable" class="display" style="width:100%">
											<thead>
												<tr>
													<th id="custom_td">ID</th>
													<th id="custom_td">user name</th>
													<th id="custom_td" width="50">brand</th>
													<th id="custom_td">series</th>
													<th id="custom_td">description </th>
													<th id="custom_td">Request Date</th>
													<th id="custom_td">Request Status</th>
													<th id="custom_td">Request Availability</th>
													<th id="custom_td">Action</th>
												</tr>
											</thead>

	<tbody>
<?php
$status='successful';
$query=mysqli_query($con,"SELECT users.email AS email,requestproduct.brand AS brand, requestproduct.series AS series,
 requestproduct.description AS description, requestproduct.requestStatus AS requestStatus, requestproduct.requestDate AS requestDate,
 requestproduct.requestAvailability AS requestAvailability, requestproduct.id AS id FROM requestproduct JOIN users ON
 requestproduct.userEmail=users.email WHERE requestStatus='$status'");
$cnt=1;

while($row=mysqli_fetch_array($query))
{
?>
										<tr id="custom_tr">
											<td><?php echo htmlentities($cnt);?></td>
											<td id="cap_username"><?php echo htmlentities($row['email']);?></td>
											<td><?php echo htmlentities($row['brand']);?></td>
											<td><?php echo htmlentities($row['series']);?></td>
											<td><?php echo htmlentities($row['description']);?></td>
											<td><?php echo htmlentities($row['requestDate']);?></td>
											<td><?php echo htmlentities($row['requestStatus']);?></td>
											<td><?php echo htmlentities($row['requestAvailability']);?></td>
											<td>
												<a href="titan_updaterequest.php?requestid=<?php echo $row['id'];?>" title="Update request" target="_blank"><i class="fa fa-plus"></i></a>
												<a href="titan_requestproduct.php?requestid=<?php echo $row['id'];?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-times"></i></a>
											</td>
											</tr>
										<?php $cnt=$cnt+1; } ?>
										</tbody>
								</table>
							</div>
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
	    } );
	} );
	</script>
</body>
<?php } ?>
