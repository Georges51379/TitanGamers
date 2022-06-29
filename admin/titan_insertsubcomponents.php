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
	$componentName=$_POST['componentName'];
	$componentToken=$_POST['componentToken'];
	$subcomponentName=$_POST['subcomponentName'];
	$subcomponentGen=$_POST['subcomponentGen'];
	$image=$_FILES['image']['name'];
	$price = $_POST['price'];
	$subcomponentStatus=$_POST['subcomponentStatus'];

	$hashedString = bin2hex(random_bytes(20));
$_SESSION['subcomponentToken'] = $hashedString;

//insert variable to DB
$sql=mysqli_query($con,"INSERT INTO subcomponents (componentName, componentToken, subcomponentToken, subcomponentName, subcomponentGen, image,price, subcomponentStatus)
									VALUES('$componentName', '$componentToken','".$_SESSION['subcomponentToken']."','$subcomponentName', '$subcomponentGen', '$image', '$price','$subcomponentStatus')");

$_SESSION['msg']="subcomponents Inserted Successfully !!";


//SOLVED
$subcomponentFileName = '';
	//DEBUGGING THE ERROR
$GetMaxIDQuery = mysqli_query($con, "SELECT MAX(id) AS maxID FROM subcomponents");
  $fetchID = mysqli_fetch_array($GetMaxIDQuery);
	$maxIds = $fetchID['maxID']; // WORKED FINE!

for($x = 1; $x <= $maxIds; $x++){
	$query = mysqli_query($con, "SELECT subcomponentName FROM subcomponents WHERE id = $x ");
		$row = mysqli_fetch_array($query);
		$subcomponentFileName = $row['subcomponentName'];

		$directory = "componentimg/".$subcomponentFileName;

		if(!file_exists($directory)){ // THE ERROR IS HERE
		 mkdir('componentimg/'.$subcomponentFileName);
	 	}

}//end FOR
move_uploaded_file($_FILES["image"]["tmp_name"],"componentimg/$subcomponentFileName/".$_FILES["image"]["name"]);
}
?>
<html lang="en">
<head>
	<title>Admin | Insert Subcomponents</title>
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

  				function checkcomponentToken(){
  					$.ajax({
  						url: "check/checkcomponentToken.php",
  						data: "componentName="+$("#componentName").val(),
  						method: "POST",
  						success: function(data){
  							$("#componentToken").html(data);
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
		<h3 class="title">insert sub Component</h3>
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


			<form class="admin_form" name="insertsubcomponent" method="post" enctype="multipart/form-data">

        <div class="adminform_div">
          <label class="adminform_label" for="basicinput">component name</label><br>
          <select onchange="checkcomponentToken()" id="componentName" name="componentName" class="adminform_select" required>
            <option value="">Select component Name</option>
              <?php $query=mysqli_query($con,"SELECT * FROM components");
                while($row=mysqli_fetch_array($query))
                  {?>
            <option value="<?php echo $row['componentName'];?>"><?php echo $row['componentName'];?></option>
              <?php } ?>
          </select>
        </div>

        <div class="adminform_div">
          <label class="adminform_label" for="basicinput">component Token</label><br>
          <select name="componentToken" id="componentToken" class="adminform_select" required>
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
						<label class="adminform_label" for="basicinput">Image</label><br>
						<input type="file" name="image" id="image" value="" class="adminform_input" required>
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
          <label for="basicinput" class="adminform_label">Price</label><br>
          <input type="text" id="price" name="price" class="adminform_input" placeholder="Enter Price">
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
