<?php
session_start();
include_once 'db/connection.php';
$oid=intval($_GET['oid']);
 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print();
}
</script>


<head>
<!--TITLE SECTION-->
    <title>Titan Gamers | Cart</title>
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
        <td colspan="2" class="fontkink2" style="padding-left:0px;"><div class="fontpink2"> <b>Order Tracking Details !</b></div></td>

      </tr>
      <tr height="30">
        <td  class="fontkink1"><b>order Id:</b></td>
        <td  class="fontkink"><?php echo $oid;?></td>
      </tr>
      <?php
  $ret = mysqli_query($con,"SELECT * FROM ordertrackhistory WHERE orderId='$oid'");
  $num=mysqli_num_rows($ret);
  if($num>0)
  {
  while($row=mysqli_fetch_array($ret))
        {
       ?>



        <tr height="20">
        <td class="fontkink1" ><b>At Date:</b></td>
        <td  class="fontkink"><?php echo $row['postingDate'];?></td>
      </tr>
       <tr height="20">
        <td  class="fontkink1"><b>Status:</b></td>
        <td  class="fontkink"><?php echo $row['status'];?></td>
      </tr>
       <tr height="20">
        <td  class="fontkink1"><b>Remark:</b></td>
        <td  class="fontkink"><?php echo $row['remark'];?></td>
      </tr>


      <tr>
        <td colspan="2"><hr /></td>
      </tr>
     <?php } }
  else{
     ?>
     <tr>
     <td colspan="2">Order Not Process Yet</td>
     </tr>
     <?php  }
  $st='Delivered';
     $rt = mysqli_query($con,"SELECT * FROM orders WHERE id='$oid'");
       while($num=mysqli_fetch_array($rt))
       {
       $currrentSt=$num['orderStatus'];
     }
       if($st==$currrentSt)
       { ?>
     <tr><td colspan="2"><b>
        Product Delivered successfully </b></td>
     <?php }

    ?>
  </table>
   </form>
  </div>




</body>
