<?php
require_once("../db/connection.php");
if(!empty($_POST["categoryName"])) {
	$categoryName= $_POST["categoryName"];

		$result =mysqli_query($con,"SELECT categoryName FROM  category WHERE  categoryName='$categoryName'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> category already exists .</span>";
 echo "<script>$('#btn').prop('disabled',true);</script>";
} else{
	echo "<span style='color:green'> Category Available .</span>";
 echo "<script>$('#btn').prop('disabled',false);</script>";
}
}


?>
