<?php
session_start();
require_once("../db/connection.php");

if(!empty($_POST["name"])) {
	$name= $_POST["name"];

		$result =mysqli_query($con,"SELECT discount FROM  coupon WHERE  name='$name'");
    $rw = mysqli_fetch_array($result);
		$discount = $rw['discount'];
		$count=mysqli_num_rows($result);
if($count>0)
{

	$_SESSION['discountedPrice'] = ($discount / 100) * $_SESSION['totalPrice'] ;
  echo "<span style='color:green'> Coupon Verified.</span>";
	echo $_SESSION['finalTotal'] = $_SESSION['totalPrice'] - $_SESSION['discountedPrice'];
 echo "<script>$('#btn').prop('disabled',false);</script>";

} else{
  echo "<span style='color:red'> INVALID Coupon .</span>";
   echo "<script>$('#btn').prop('disabled',true);</script>";

}
}


?>
