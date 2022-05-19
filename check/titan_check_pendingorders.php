<?php
require_once("../db/connection.php");
if(!empty($_POST["titanpendingorders_btn"])) {
	$titanpendingorders_btn= $_POST["titanpendingorders_btn"];

		$result =mysqli_query($con,"SELECT  orderStatus FROM  orders WHERE  orderStatus=NULL");
		$count=mysqli_num_rows($result);

if($count>0)
{
echo "<span style='color:red'> Email already exists .</span>";
 echo "<script>$('#titanpendingorders_btn').prop('disabled',true);</script>";
} else{

	echo "<span style='color:green'> Email available for Registration .</span>";
 echo "<script>$('#titanpendingorders_btn').prop('disabled',false);</script>";
}
}


?>
