<?php
session_start();
require_once("../db/connection.php");

if(!empty($_POST['cartToken'])){
  $cartToken = $_GET['cpt'];

  $checkQuery = mysqli_query($con, "SELECT status FROM cart WHERE cartToken = '".$_GET['cpt']."'");
  $rw = mysqli_fetch_array($checkQuery);
  $status = $rw['status'];
  $result = mysqli_num_rows($checkQuery);

  if($result > 0){
    echo "<span style='color:green'> STATUS ACTIVE .</span>";
   echo "<script>$('#btn').prop('disabled',false);</script>";

  } else{
    echo "<span style='color:red'> STATUS INACTIVE .</span>";
     echo "<script>$('#btn').prop('disabled',true);</script>";

  }
  }
 ?>
