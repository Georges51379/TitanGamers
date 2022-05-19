<?php
require_once("../db/connection.php");
if(!empty($_POST["subcategoryName"])) {
	$subcategoryName= $_POST["subcategoryName"];

		$result =mysqli_query($con,"SELECT subcategoryName FROM  subcategory WHERE  subcategoryName='$subcategoryName'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> subcategory already exists .</span>";
 echo "<script>$('#btn').prop('disabled',true);</script>";
} else{
	echo "<span style='color:green'> subcategory Available .</span>";
 echo "<script>$('#btn').prop('disabled',false);</script>";
}
}


?>
