<?php
session_start();
require_once("../db/connection.php");

if(!empty($_POST['cartToken'])){
  $carToken = $_GET['cpt'];

  $checkQuery = mysqli_query($con, "SELECT status FROM cart WHERE carToken = '".$_GET['cpt']."'");
  $rw = mysqli_fetch_array($checkQuery);
  $status = $rw['status'];
  $result = mysqli_num_rows($checkQuery);

  if($result > 0){
    echo "<span style='color:green'> Coupon Verified.</span>";
   echo "<script>$('#btn').prop('disabled',false);</script>";

  } else{
    echo "<span style='color:red'> INVALID Coupon .</span>";
     echo "<script>$('#btn').prop('disabled',true);</script>";

  }
  }



 ?>
