<?php
session_start();
include('db/connection.php');

$productFileName = '';

	//DEBUGGING THE ERROR
$GetMaxIDQuery = mysqli_query($con, "SELECT MAX(id) AS maxID FROM products");
  $fetchID = mysqli_fetch_array($GetMaxIDQuery);
	$maxIds = $fetchID['maxID']; // WORKED FINE!

 for($x = 1; $x <= $maxIds; $x++){

	 echo "The value of x at the beggining is: &emsp;:" .$x;
	 echo '<br>';
	 echo '<br>';
	 echo '<br>';

	 	$query = mysqli_query($con, "SELECT productName FROM products WHERE id = $x ");
 		$row = mysqli_fetch_array($query);
 		$productFileName = $row['productName'];

		echo " The product file name after the query select is: &emsp;" .$productFileName;
		echo '<br>';
		echo '<br>';
		echo '<br>';

 		$directory = "productimages/".$productFileName;

		echo "The directory name is: &emsp;" .$directory;
		echo '<br>';
		echo '<br>';
		echo '<br>';


		if(!file_exists($directory)){ // THE ERROR IS HERE
		 $makeFolder = mkdir('productimages/'.$productFileName);

		 echo "The maked folder name is after the mkdir command: &emsp;" .$makeFolder;
		 echo '<br>';
		 echo '<br>';
		 echo '<br>';
		}

		echo "The value of X at the end of for is: &emsp;" .$x;

}//end FOR
echo '<br>';
echo '<br>';
echo '<br>';
	echo "The productFile name is: &emsp;" .$productFileName;
?>
