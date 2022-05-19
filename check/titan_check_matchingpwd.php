<?php
require_once("../db/connection.php");

if(!empty($_POST["cpassword"])) {
  $cpassword = $_POST["cpassword"];

  if($password !== $cpassword){
    echo "<span style='color:red'> Passwords do not match! .</span>";
     echo "<script>$('.btn').prop('disabled',true);</script>";
  }
 else{
	echo "<span style='color:green'> Passwords matched! .</span>";
 echo "<script>$('.btn').prop('disabled',false);</script>";
}
}


?>
