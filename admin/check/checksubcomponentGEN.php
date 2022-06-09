<?php
require_once("../db/connection.php");
if(!empty($_POST["subcomponentGen"])) {
	$subcomponentGen= $_POST["subcomponentGen"];

		$result =mysqli_query($con,"SELECT subcomponentGen FROM subcomponents WHERE subcomponentGen='$subcomponentGen'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> subcomponent GEN already exists .</span>";
 echo "<script>$('#btn').prop('disabled',true);</script>";
} else{
	echo "<span style='color:green'> subcomponent GEN Available .</span>";
 echo "<script>$('#btn').prop('disabled',false);</script>";
}
}


?>
