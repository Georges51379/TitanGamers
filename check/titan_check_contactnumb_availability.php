<?php
require_once("../db/connection.php");
if(!empty($_POST["phone"])) {
	$phone= $_POST["phone"];

if(!preg_match ("/^[0-9]*$/", $phone) ){
  echo "<span style='color:red'> Only numbers are allowed!! .</span>";
   echo "<script>$('.signup_btn').prop('disabled',true);</script>";
}
else if(strlen ($phone) != 8){
  echo "<span style='color:red'> 8 digits only! .</span>";
   echo "<script>$('.signup_btn').prop('disabled',true);</script>";
}
else {
		$result =mysqli_query($con,"SELECT  phone FROM  users WHERE  phone='$phone'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Contact Number already exists .</span>";
 echo "<script>$('.signup_btn').prop('disabled',true);</script>";
} else{

	echo "<span style='color:green'> Contact Number available for Registration .</span>";
 echo "<script>$('.signup_btn').prop('disabled',false);</script>";
}
}
}
?>
