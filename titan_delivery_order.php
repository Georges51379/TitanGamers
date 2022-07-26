<?php
session_start();
include_once 'db/connection.php';
$ot= $_GET['ot'];

if(isset($_POST['placeDate'])){
  	$toBeDelivered = $_POST['toBeDelivered'];

  $toBeDelivered = mysqli_query($con, "UPDATE orders SET  toBeDelivered = '$toBeDelivered' WHERE orderToken='".$_GET['ot']."' ");
  echo "<script>alert('Order date SUCCESSSFULLY SAVED');</script>";
}


 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}
function f3()
{
window.print();
}
</script>


<head>
<!--TITLE SECTION-->
    <title>Titan Gamers | To Be Delivered</title>
<!--ICON SECTION-->
    <link href="img/icons/logo.png" rel="shortcut icon">
<!--FONT AWESOME CDN SECTION-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!--jQUERY CDN SECTION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<style>
*{
  margin: 0;
  padding: 0;
}
</style>


</head>

<body>


  <div style="margin-left:50px;" class="div_for_form">
   <form name="updateticket" class="form" id="updateticket" method="post">
  <table width="100%" border="0" class="table" cellspacing="0" cellpadding="0">

      <tr height="50">
        <td colspan="2" class="fontkink2" style="padding-left:0px;"><div class="fontpink2"> <b>Select on which day you want your order to be DELIVERED</b></div></td>

      </tr>
      <tr height="30">
        <td  class="fontkink1"><b>order Id:</b></td>
        <td  class="fontkink"><?php echo $ot;?></td>
      </tr>

      <tr>
        <td class="fontkink1">

          <form class="form" name="toBeDelivered" method="post">
            <div class="form-group">
              <label for="toBeDelivered" class="input-form">to be delivered</label>
              <input type="date" class="input-form" name="toBeDelivered" id="toBeDelivered" required>
            </div>

            <div class="form-group">
              <input type="submit" value="submit" class="form-btn" name="placeDate">
            </div>
          </form>

        </td>
        <td class="fontkink1"></td>
      </tr>

  </table>
   </form>
  </div>




</body>
