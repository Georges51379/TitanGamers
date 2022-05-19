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
			        mysqli_query($con,"UPDATE title SET titleStatus = 'inactive' WHERE titleToken = '".$_GET['titleToken']."'");
	                  $_SESSION['delmsg']="Title deleted !!";
			  }

	if(isset($_POST['truncateTitleTable'])){
			mysqli_query($con,"TRUNCATE TABLE title");
			$_SESSION['delmsg'] = "TABLE HAS BEEN EMPTY SUCCESSFULLY!!";
	}
?>
<!DOCTYPE html>
<html>
  <head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titan Gamers | Title</title>
    <link rel="stylesheet" href="css/admin.css">
    <link href="images/icons/logo.png" rel="shortcut icon">
			<link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--FONT AWESOME CDN SECTION-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--jQUERY CDN SECTION-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   </head>

<body>
  <?php include('include/sidebar.inc.php');?>

	<center>
		<div class="container">
			<div class="titlewrapper">
				<h1 class="title"> title</h1>
				<h4 class="subtitle"><a href="titan_inserttitle.php" class="subtitle-link">insert title</a></h4>
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
				<button type="submit" name="truncateTitleTable" class="adminform_btn" onClick="return confirm('Are you sure you want to Empty this Table?')">Empty Table</button>
			</form>
			</div>
			</center>

								<table id="datable" class="display" style="width:100%">
										<thead>
											<tr>
												<th id="custom_td">#</th>
												<th id="custom_td">title</th>
												<th id="custom_td">title Status </th>
												<th id="custom_td">selected</th>
												<th id="custom_td">create Date</th>
												<th id="custom_td">last updated</th>
												<th id="custom_td">Action</th>
											</tr>
										</thead>
										<tbody>

			<?php $query=mysqli_query($con,"SELECT * FROM title");
			$cnt=1;
			while($row=mysqli_fetch_array($query))
			{
			?>
											<tr id="custom_tr">
												<td><?php echo htmlentities($cnt);?></td>
												<td id="cap_username"><?php echo htmlentities($row['title']);?></td>
												<td><?php echo htmlentities($row['titleStatus']);?></td>
												<td> <?php echo htmlentities($row['selected']);?></td>
												<td><?php echo htmlentities($row['createDate']);?></td>
												<td><?php echo htmlentities($row['updateDate']);?></td>
												<td>
												<a href="titan_edittitle.php?titleToken=<?php echo $row['titleToken']?>" ><i class="fa fa-plus"></i></a>
												<a href="title.php?titleToken=<?php echo $row['titleToken']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-times"></i></a></td>
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
</html>
