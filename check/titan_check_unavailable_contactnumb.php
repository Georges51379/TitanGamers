<?php
require_once("../db/connection.php");

if(!empty($_POST["phone"]) && !empty($_POST["email"])) {
	$phone= $_POST["phone"];
  $email= $_POST["email"];

		$result =mysqli_query($con,"SELECT  email,phone FROM  users WHERE  email='$email' AND phone='$phone'");
		$count=mysqli_num_rows($result);
if($count==0)
{
echo "<span style='color:red'> Contact Number or Email Not Found .</span>";
 echo "<script>$('.signup_btn').prop('disabled',true);</script>";
} else{

	echo "<span style='color:green'> Contact Number and Email Successfully Found! .</span>";
 echo "<script>$('.signup_btn').prop('disabled',false);</script>";
}
}


?>
