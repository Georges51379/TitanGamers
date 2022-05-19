<?php
session_start();
include 'db/connection.php';
if(strlen($_SESSION['email'])===0)
  {
header('location:index.php');
}
else{

if(isset($_POST['updateSubmit'])){
$status=$_POST['status'];
$remark=$_POST['remark'];

$query=mysqli_query($con,"INSERT INTO requestproducthistory (requestID,status,remark) VALUES ('".$_GET['requestid']."','$status','$remark')");

$sql=mysqli_query($con,"UPDATE requestproduct SET requestStatus='$status' WHERE id ='".$_GET['requestid']."' ");
echo "<script>alert('Request updated sucessfully...');</script>";
}
 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}
function f3()
{
window.print();
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin | Update Request</title>
<link href="images/icons/logo.png" rel="shortcut icon">
</head>

<body>

<div style="margin-left:50px;">
 <form name="updateticket" id="updateticket" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr height="50">
      <td colspan="2" class="fontkink2" style="padding-left:0px;"><div class="fontpink2"> <b>Update Request !</b></div></td>
    </tr>

    <tr height="30">
      <td  class="fontkink1"><b>request Id:</b></td>
      <td  class="fontkink"><?php echo $_GET['requestid'];?></td>
    </tr>

    <?php
$ret = mysqli_query($con,"SELECT * FROM requestproducthistory WHERE id='".$_GET['requestid']."' ");
     while($row=mysqli_fetch_array($ret))
      {
     ?>
      <tr height="20">
      <td class="fontkink1" ><b>At Date:</b></td>
      <td  class="fontkink"><?php echo $row['postingDate'];?></td>
    </tr>

     <tr height="20">
      <td  class="fontkink1"><b>Status:</b></td>
      <td  class="fontkink"><?php echo $row['status'];?></td>
    </tr>

     <tr height="20">
      <td  class="fontkink1"><b>Remark:</b></td>
      <td  class="fontkink"><?php echo $row['remark'];?></td>
    </tr>

    <tr>
      <td colspan="2"><hr /></td>
    </tr>
   <?php } ?>
   <?php
$st='done';
   $rt = mysqli_query($con,"SELECT * FROM requestproduct WHERE id='".$_GET['requestid']."' ");
     while($num=mysqli_fetch_array($rt))
     {
     $currrentSt=$num['requestStatus'];
   }
     if($st==$currrentSt)
     { ?>

   <tr><td colspan="2"><b>
      request Delivered </b></td>
   <?php }else  {
      ?>

    <tr height="50">
      <td class="fontkink1">Status: </td>
      <td  class="fontkink"><span class="fontkink1" >
        <select name="status" class="fontkink" required="required" >
          <option value="">Select Status</option>
                 <option value="searching">searching</option>
                  <option value="done">done</option>
        </select>
        </span></td>
    </tr>

     <tr style=''>
      <td class="fontkink1" >Remark:</td>
      <td class="fontkink" align="justify" ><span class="fontkink">
        <textarea cols="50" rows="7" name="remark"  required="required" ></textarea>
        </span></td>
    </tr>

    <tr>
      <td class="fontkink1">&nbsp;</td>
      <td  >&nbsp;</td>
    </tr>

    <tr>
      <td class="fontkink">       </td>
      <td  class="fontkink"> <input type="submit" name="updateSubmit"  value="update"   size="40" style="cursor: pointer;" /> &nbsp;&nbsp;
      <input name="updateSubmit" type="submit" class="txtbox4" value="Close this Window " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>
<?php } ?>
</table>
 </form>
</div>

</body>
</html>
<?php } ?>
