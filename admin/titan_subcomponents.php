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
  $componentToken=$_POST['componentToken'];
	$componentName=$_POST['componentName'];
	$subcomponentName=$_POST['subcomponentName'];
	$subcomponentGen=$_POST['subcomponentGen'];
	$subcomponentStatus=$_POST['subcomponentStatus'];

  $hashedString = bin2hex(random_bytes(20));
  $_SESSION['subcomponentToken'] = $hashedString;

$sql=mysqli_query($con,"INSERT INTO subcomponents(componentToken, componentName, subcomponentToken,subcomponentName, subcomponentGen,subcomponentStatus)
values('$componentToken', '$componentName', '".$_SESSION['subcomponentToken']."','$subcomponentName', '$subcomponentGen', '$subcomponentStatus')");
$_SESSION['msg']="SUBCOMPONENT Created !!";
}
if(isset($_GET['del']))
		  {
		          mysqli_query($con,"UPDATE subcomponents SET subcomponentStatus = 'Inactive' WHERE subcomponentToken = '".$_GET['subcomponentToken']."'");
                  $_SESSION['delmsg']="SUBCOMPONENT deleted !!";
		  }
if(isset($_POST['truncateSubcomponentsTable'])){
			mysqli_query($con,"TRUNCATE TABLE subcomponents");
			$_SESSION['delmsg'] = "TABLE HAS BEEN EMPTY SUCCESSFULLY!!";
}
?>
<html lang="en">
<head>
	<title>Admin | Sub Category</title>
	<link type="text/css" href="images/icons/logo.png" rel="shortcut icon">
	<link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--FONT AWESOME CDN SECTION-->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--jQUERY CDN SECTION-->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

			<link href="css/admin.css" rel="stylesheet">

			<script>
				function checksubcomponentGEN(){
					$.ajax({
						url: "check/checksubcomponentGEN.php",
						data: "subcomponentGen="+$("#subcomponentGen").val(),
						method: "POST",
						success: function(data){
							$("#subcomponentAvailability").html(data);
						},
						error:function(){}
					});
				}
				</script>
</head>
<body>

	<?php include('include/sidebar.inc.php');?>

	<center>
		<div class="container">

	<div class="titlewrapper">
		<h3 class="title">subComponents</h3>
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
<form method="post">
	<h2>Empty Table:</h2>
	<button type="submit" name="truncateSubcomponentsTable" class="adminform_btn">Empty Table</button>
</form>

			<form class="admin_form" name="subcomponent" method="post" >


                  <div class="adminform_div">
                    <label class="adminform_label" for="basicinput">component Token</label><br>
                    <input type="text" placeholder="Enter Component Token"  name="componentToken" class="adminform_input" required><br>
                  </div>

										<div class="adminform_div">
											<label class="adminform_label" for="basicinput">component name</label><br>
											<select name="componentName" class="adminform_select" required>
												<option value="">Select component Name</option>
										<?php $query=mysqli_query($con,"SELECT * FROM components");
										while($row=mysqli_fetch_array($query))
										{?>
											<option value="<?php echo $row['componentName'];?>"><?php echo $row['componentName'];?></option>
										<?php } ?>
											</select>

										</div>
										<div class="adminform_div">
											<label class="adminform_label" for="basicinput">subcomponent Name</label><br>
											<input type="text"  placeholder="Enter subcomponent Name"  name="subcomponentName" class="adminform_input" required><br>
										</div>

										<div class="adminform_div">
												<label class="adminform_label" for="basicinput">subcomponent Gen</label><br>
                        <input type="text" id="subcomponentGen" onblur="checksubcomponentGEN()" placeholder="Enter subcomponent Generation"  name="subcomponentGen" class="adminform_input" required><br>
                        <span id="subcomponentAvailability"></span>
										</div>

										<div class="adminform_div">
											<label class="adminform_label" for="basicinput">subcomponent Status</label><br>
											<select name="subcomponentStatus" class="adminform_select">
												<option value="--Select An Option--">--Select An Option--</option>
												<option value="Active">Active</option>
												<option value="Inactive">Inactive</option>
											</select>
										</div>

											<div class="adminform_div">
												<button type="submit" name="submit" id="btn" class="adminform_btn">Create</button>
											</div>
									</form>
							</div>
						</div>
					</div>
				</center>

						<div class="titlewrapper">
							<h3 class="title">manage sub component</h3>
						</div>
						<br><br>

								<table id="datable" class="display" style="width:100%">
									<thead>
										<tr>
											<th id="custom_td">ID</th>
											<th id="custom_td">component Name</th>
											<th id="custom_td">subcomponent Name</th>
											<th id="custom_td">Generation</th>
											<th id="custom_td">STATUS</th>
											<th id="custom_td">Create date</th>
											<th id="custom_td">Last Updated</th>
											<th id="custom_td">Action</th>
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"SELECT components.componentName,subcomponents.subcomponentName,subcomponents.subcomponentToken,
subcomponents.subcomponentGen, subcomponents.subcomponentStatus, subcomponents.createDate,
subcomponents.updateDate FROM subcomponents JOIN components ON components.componentName=subcomponents.componentName");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td id="cap_username"><?php echo htmlentities($row['componentName']);?></td>
											<td><?php echo htmlentities($row['subcomponentName']);?></td>
											<td><?php echo htmlentities($row['subcomponentGen']);?></td>
											<td><?php echo htmlentities($row['subcomponentStatus']);?></td>
											<td> <?php echo htmlentities($row['createDate']);?></td>
											<td><?php echo htmlentities($row['updateDate']);?></td>
											<td>
											<a href="titan_editsubcomponents.php?subcomponent=<?php echo $row['subcomponentToken']?>" ><i class="fa fa-plus"></i></a>
											<a href="titan_subcomponents.php?subcomponent=<?php echo $row['subcomponentToken']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-times"></i></a></td>
										</tr>
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
		    } );
		} );
</script>
</body>
<?php } ?>
