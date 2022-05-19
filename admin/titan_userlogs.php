<?php
session_start();
include('db/connection.php');
if(strlen($_SESSION['email'])==0)
	{
header('location:index.php');
}
else{
?>
<html lang="en">
<head>
	<title>Admin|  Users log</title>
	<link type="text/css" href="images/icons/logo.png" rel="shortcut icon">
	<link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--FONT AWESOME CDN SECTION-->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--jQUERY CDN SECTION-->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

				<link href="css/admindatatable.css" rel="stylesheet">
</head>
<body>
	<?php include('include/header.inc.php');?>
	<?php include('include/sidebar.inc.php');?>

							<div class="titlewrapper">
								<h3 class="title">users logs</h3>
							</div>

								<table id="datable" class="display" style="width:100%">
									<thead>
										<tr>
											<th id="custom_td">#</th>
											<th id="custom_td"> User Email</th>
											<th id="custom_td">User IP </th>
											<th id="custom_td">Login Time</th>
											<th id="custom_td">Logout Time </th>
											<th id="custom_td">Status </th>
										</tr>
									</thead>
									<tbody>
<?php $query=mysqli_query($con,"select * from userlog");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
										<tr id="custom_tr">
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['userEmail']);?></td>
											<td><?php echo htmlentities($row['userip']);?></td>
											<td> <?php echo htmlentities($row['loginTime']);?></td>
											<td><?php echo htmlentities($row['logout']); ?></td>
										<td><?php $st=$row['status'];
if($st==1)
{
	echo "Successfull";
}
else
{
	echo "Failed";
}
										 ?></td>
										<?php $cnt=$cnt+1; } ?>
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
    });
});
</script>
</body>
<?php } ?>
