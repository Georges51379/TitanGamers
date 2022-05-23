<?php
session_start();
include 'db/connection.php';

if(strlen($_SESSION['email']) === 0 ){
  header("location: index.php");
}
else{

  if(isset($_GET['del'])){
    mysqli_query($con, "UPDATE currency SET status = 'inactive' WHERE currencyToken = '".$_GET['currencyToken']."' ");
    $_SESSION['msg'] = "Currency has been Successfully been INACTIVE";
  }

  if(isset($_POST['truncateCurrencyTable'])){
    mysqli_query($con, "TRUNCATE TABLE currency");
    $_SESSION['msg'] = "Currency Table has been Successfully Emptied";
  }
 ?>
 <html>
    <head>
    <title>Admin | Currency</title>
  	<link type="text/css" href="images/icons/logo.png" rel="shortcut icon">
  	<link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
  <!--FONT AWESOME CDN SECTION-->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--jQUERY CDN SECTION-->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  	<link href="css/admin.css" rel="stylesheet">
    </head>

    <body>
      <?php include 'include/sidebar.inc.php'; ?>

      <center>
      	<div class="container">
      							<div class="titlewrapper">
      								<h3 class="title">Currency</h3>
                      <h4 class="subtitle"><a href="titan_insertcurrency.php" class="subtitle-link">insert currency</a></h4>
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
        <button type="submit" name="truncateCurrencyTable" class="adminform_btn" onClick="return confirm('Are you sure you want to Empty this Table?')">Empty Table</button>
      </form>
    </div>
    </center>

    <table id="datable" class="display" style="width:100%">
        <thead>
          <tr>
            <th id="custom_td">#</th>
            <th id="custom_td"> Name</th>
            <th id="custom_td">status</th>
            <th id="custom_td">rate</th>
            <th id="custom_td">last updated</th>
            <th id="custom_td">Action</th>
          </tr>
        </thead>
        <tbody>

<?php $query=mysqli_query($con,"SELECT * FROM currency");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
          <tr id="custom_tr">
            <td><?php echo htmlentities($cnt);?></td>
            <td id="cap_username"><?php echo htmlentities($row['name']);?></td>
            <td><?php echo htmlentities($row['status']);?></td>
            <td><?php echo htmlentities($row['rate']);?></td>
            <td><?php echo htmlentities($row['updateDate']);?></td>
            <td>
            <a href="titan_editcurrency.php?currencyToken=<?php echo $row['currencyToken']?>" ><i class="fa fa-plus"></i></a>
            <a href="titan_currency.php?currencyToken=<?php echo $row['currencyToken']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-times"></i></a></td>
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
 </html>
<?php } ?>
