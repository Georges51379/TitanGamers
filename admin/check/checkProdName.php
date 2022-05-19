<?php
require_once("../db/connection.php");
if(!empty($_POST["productName"])) {
	$productName= $_POST["productName"];

		$result =mysqli_query($con,"SELECT productName FROM  products WHERE  productName='$productName'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> product already exists .</span>";
 echo "<script>$('#btn').prop('disabled',true);</script>";
} else{
	echo "<span style='color:green'> product Available .</span>";
 echo "<script>$('#btn').prop('disabled',false);</script>";
}
}
?>
