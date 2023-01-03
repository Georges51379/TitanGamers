<?php
session_start();
include_once 'db/connection.php';
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
    <title>Titan Gamers | Cart Codes</title>
<!--ICON SECTION-->
    <link href="img/icons/logo.png" rel="shortcut icon">
<!--FONT AWESOME CDN SECTION-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!--jQUERY CDN SECTION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>


  <div style="margin-left:50px;" class="div_for_form">
   <form name="updateticket" class="form" id="updateticket" method="post">
  <table width="100%" border="0" class="table" cellspacing="0" cellpadding="0">

      <tr height="50">
        <td colspan="2" class="fontkink2" style="padding-left:0px;"><div class="fontpink2"> <b>CART CODES !</b></div></td>

      </tr>
      <?php
  $getCorrespondingProdFromCodeCartQuery =
	mysqli_query($con, "SELECT cart.*, products.*
	FROM cart JOIN products ON
	 cart.productToken = products.productToken WHERE cart.cartStatus = 'Active' ORDER BY cart.cartDate ASC");

  $num=mysqli_num_rows($getCorrespondingProdFromCodeCartQuery);
  if($num>0)
  {
  while($row=mysqli_fetch_array($getCorrespondingProdFromCodeCartQuery))
        {

		$prodNameDB = $row['productName'];
       ?>
        <tr height="20">
        <td class="fontkink1" ><b>CART CODE:</b></td>
        <td  class="fontkink"><?php echo $row['cartCode'];?></td>
      </tr>
       <tr height="20">
        <td  class="fontkink1"><b>PRODUCT NAME</b></td>
        <td  class="fontkink"><?php echo $row['productName'];?></td>
      </tr>


      <tr>
        <td colspan="2"><hr /></td>
      </tr>
     <?php } }
  else{//no cart codes available
     ?>
     <tr>
     <td colspan="2">no cart codes available</td>
     </tr>
     <?php  } ?>

  </table>
   </form>
  </div>






</body>
