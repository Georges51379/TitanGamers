<?php
require_once("../db/connection.php");
if(!empty($_POST["componentName"]))
{
 $componentName=$_POST['componentName'];

$query=mysqli_query($con,"SELECT componentToken FROM components WHERE componentName='$componentName'");
?>
<option value="">Select Component Name First</option>
<?php
 while($row=mysqli_fetch_array($query))
 {
  ?>
  <option value="<?php echo htmlentities($row['componentToken']); ?>"><?php echo htmlentities($row['componentToken']); ?></option>
  <?php
 }
}
?>
