<?php
session_start();
error_reporting(0);
include('db/connection.php');

if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
					echo "<script>alert('Product has been added to your cart')</script>";
		echo "<script type='text/javascript'> document.location ='titan_cart.php'; </script>";
		}else{
			$message="Product ID is invalid";
		}
	}
}
$pid=intval($_GET['pid']);
if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){
	if(strlen($_SESSION['email'])==0)
    {
header('location: login-user.php');
}
else
{
mysqli_query($con,"insert into wishlist(userEmail,productId) values('".$_SESSION['email']."','$pid')");
echo "<script>alert('Product has been addded to your wishlist');</script>";
header('location:titan_wishlist.php');
}
}
if(strlen($_SESSION['email'])==0 && isset($_POST['submit_review'])){
	header('location: login-user.php');
}
else{
	$qty=$_POST['quality'];
	$price=$_POST['price'];
	$value=$_POST['value'];
	$name=$_POST['name'];
	$summary=$_POST['summary'];
	$review=$_POST['review'];
	mysqli_query($con,"insert into productreviews(productId,quality,price,value,name,summary,review) values('$pid','$qty','$price','$value','$name','$summary','$review')");
}
?>

<script>

function ReviewForm(){

	$("#loaderIcon").show();
	jQuery.ajax({
		url:"titan_check_productReview.php",
		data:'',
		type:"POST",
		success:function(data){
			$("#reviewCheck").html(data);
			$("#loaderIcon").hide();
		},
		error:function(){}

	});
}

</script>

<head>
<!--TITLE SECTION-->
    <title>Titan Gamers | Product Details</title>
<!--ICON SECTION-->
    <link href="img/icons/logo.png" rel="shortcut icon">
<!--FONT AWESOME CDN SECTION-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!--jQUERY CDN SECTION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--PRODUCTS.CSS SECTION-->
		<link href="css/productsdetails.css" rel="stylesheet">

		<script src='js/jquery-1.8.3.min.js'></script>
<script src='js/jquery.elevatezoom.js'></script>

</head>

<body>
<!--PRODUCTS TOPBAR.INC.PHP SECTION-->
  <?php include 'includes/products_topbar.inc.php'; ?>
<!--PRODUCTS LOGOSEARCH.INC.PHP SECTION-->
  <?php include 'includes/products_search.inc.php'; ?>
<!--PRODUCTS MAINNAVBAR.INC.PHP--->
  <?php include 'includes/products_mainnavbar.inc.php'; ?>

<!--MY SQL QUERY TO SELECT CATEGORIES AND PRODUCTS BY ALTER JOINING THE TABLES OF CAT AND PROD--->
	<?php
	$ret=mysqli_query($con,"select category.categoryName as catname,subCategory.subcategory as subcatname,
	products.productName as pname from products join category on category.id=products.category
	 join subcategory on subcategory.id=products.subCategory where products.id='$pid'");

	while ($rw=mysqli_fetch_array($ret)) {
	?>

	<?php
	$ret=mysqli_query($con,"select * from products where id='$pid'");
	while($row=mysqli_fetch_array($ret))
	{
	?>

<div class="product_wrapper">
			<div class="top_product_section">

				<div class="product_imgs">
				<div class="prodimg" id="slide1">
					<a data-title="<?php echo htmlentities($row['productName']);?>">
						 <img class="img1" src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"/>
					</a>
				</div>

				 <div class="prodimg " id="slide2">
				 	<a data-title="<?php echo htmlentities($row['productName']);?>">
						 <img class="img2" src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage2']);?>"/>
					</a>

					 <a data-title="<?php echo htmlentities($row['productName']);?>">
					 	<img class="img3" src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage3']);?>"/>
					 </a>
				</div>
			</div><!--product_imgs-->


		<div class="rightsidepro_info">
				<h1 class="name"><?php echo htmlentities($row['productName']);?></h1>

		<?php $rt=mysqli_query($con,"select * from productreviews where productId='$pid'");
		$num=mysqli_num_rows($rt);
		{
		?>

			<div class="product_ratings">
					<div class="valuefromdb">
						<a href="#review" class="lnk"><?php echo htmlentities($num);?> reviews</a>
					</div>
			</div><!--PRODUCT RATINGS-->
			<?php } ?>

			<div class="product_availability">
					<div class="label">
						<span class="label">Availability :</span>
					</div>

					<div class="valuefromdb">
						<span class="value"><?php echo htmlentities($row['productAvailability']);?></span>
					</div>
			</div><!--PRODUCT AVAILABILITY-->


			<br>
			<div class="product_brand">
					<div class="label">
							<span class="label">Product Brand :</span>
					</div>
					<div class="valuefromdb">
							<span class="value"><?php echo htmlentities($row['productCompany']);?></span>
				  </div>
			</div><!--PRODUCT BRAND-->

			<br>
			<div class="product_shippingcharge">
									<div class="label">
										<span class="label">Shipping Charge :</span>
									</div>
									<div class="valuefromdb">
										<span class="value"><?php if($row['shippingCharge']==0)
										{
											echo "Free";
										}
										else
										{
											echo htmlentities($row['shippingCharge']);
										}
										?></span>
									</div>
			</div><!--PRODUCT SHIPPING CHARGE SECTION -->
			<br>
						<div class="product_price">
							<div class="label">
								<span class="label">price :</span>
							</div>
							<div class="valuefromdb">
										<span class="price">$<?php echo htmlentities($row['productPrice']);?></span>
										<span class="price_before_discount">$<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>
							</div>
						</div><!--END PRODUCT PRICE -->
			<br>

			<!--QUANTITY SECTION-->
						<div class="product_quantity">
								<div class="label">
									<span class="label">Quantity:</span>
								</div>
								<div class="valuefromdb">
										<input type="number" value="1" step="1" min="1" max="2" oninput="validity.valid||(value='');"/>
								</div>
							</div>
			<!--QUANTITY SECTION-->
			<br>
			<div class="product_action">
								<?php if($row['productAvailability']=='In Stock'){?>
							<a href="titan_product_details.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="btn">
							<i class="fa fa-shopping-cart"></i>
						</a>

						<a class="btn" href="titan_product_details.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist" title="Wishlist">
							<i class="fa fa-heart"></i>
						</a>
						<?php } else {?>
							<div class="btn">Out of Stock</div>
								<?php } ?>

			</div><!--END PRODUCT ACTION-->
			<br>
		<!--SHARE ON SM SECTION-->
			<div class="product_share">
				<span class="label">Share :</span>
					<div class="social_icons">
						<ul class="icons_list">
							<li class="icons_li"><a class="icon fb fa fa-facebook" target="_blank" href="https://facebook.com"></a></li>
							<li class="icons_li"><a class="icon insta fa fa-instagram" target="_blank" href="https://instagram.com"></a></li>
							<li class="icons_li"><a class="icon yt fa fa-youtube" target="_blank" href="https://youtube.com"></a></li>
							<li class="icons_li"><a class="icon wtp fa fa-whatsapp" target="_blank" href="https://whatsapp.com"></a></li>
			 			</ul><!--ICONS LIST-->
					</div><!--SOCIAL ICONS-->
			</div><!--PRODUCT SHARE-->
		</div><!---END PRODUCT_IMGS TAG-->
</div><!--top_product_section-->


<!--START OF THE PRODUCTS REVIEWW AND DESCRIPTION SECTION---->
	<div class="product_description_wrapper"><!--MISSING END OF DIV-->

		<div class="review_wrapper">
			<ul class="review_description_list">
				<li class="active review_description_li" class="review">
					<a class="review_description_links" href="#description">description</a>
				</li>
				<li class="review_description_li">
					<a class="review_description_links" href="#review">review</a>
				</li>
			</ul><!--END PRODUCT _REVIEW-->
		</div>

		<div class="product_description" id="description">
			<p class="description"><span class="review_title">description<br></span><?php echo $row['productDescription'];?></p>
		</div>

<!--PRODUCT REVIEWWW SECTION-->
	<div id="review" class="product_reviews">
		<h4 class="review_title">customer reviews</h4>

	<?php $qry=mysqli_query($con,"select * from productreviews where productId='$pid'");
	 $qrys=mysqli_query($con,"select * from productreviews where productId='$pid'");

	$rvws=mysqli_fetch_array($qrys);

	if($rvws==0){
		echo"<center style='color:red'>";
			echo'NO REVIEW YET! BE THE FIRST TO REVIEW THIS PRODUCT BELOW!!';
		echo'</center>';
	}
	 else{
		 while($rvw=mysqli_fetch_array($qry)){
	?>

		<div class="reviews" style="border: solid 1px #000; padding-left: 2% ">
			<div class="review">
				<span class="date"><i class="fa fa-calendar"></i><span><?php echo htmlentities($rvw['reviewDate']);?></span></span><br>
				<br><div class="review-title"><span class="review_main_titles">title&emsp;</span><span class="summary"><?php echo htmlentities($rvw['summary']);?></span></div>
				<div class="text"><span class="review_main_titles">review&emsp;</span><span class="main_review">"<?php echo htmlentities($rvw['review']);?>"</span></div>
				<br><div class="text"><span class="review_main_titles">Quality :</span>  <?php echo htmlentities($rvw['quality']);?> Star(s)</div>
				<div class="text"><span class="review_main_titles">Price :</span>  <?php echo htmlentities($rvw['price']);?> Star(s)</div>
				<div class="text"><span class="review_main_titles">value :</span>  <?php echo htmlentities($rvw['value']);?> Star(s)</div>
				<br><div class="user"><i class="fa fa-pencil-square-o"></i> <span class="name"><?php echo htmlentities($rvw['name']);?></span></div>
			</div><!--END REVIEWw-->
		</div><!--END REVIEWS-->

	<?php   } }  ?>
	</div><!--END PRODUCT REVIEWS-->
<!--END OF THE PRODUCTS REVIEWW SECTION-->

</div><!--END PRODUCT DESCRIPTION WRAPPER-->

<!---STARTS OF THE REVIEW_TABLE AND FORMS-->
<center>
<div class="review_form_wrapper">
	<form role="form" class="review_form" name="review" method="post">
		<div class="add_review">
			<h4 class="review_title">Write your own review</h4>
		<div class="review_table">
				<table class="table">

					<thead>
						<tr>
							<th class="th">&nbsp;</th>
							<th>1 star</th>
							<th>2 stars</th>
							<th>3 stars</th>
							<th>4 stars</th>
							<th>5 stars</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td class="th">Quality</td>
							<td><input type="radio" name="quality" class="radio" value="1"></td>
							<td><input type="radio" name="quality" class="radio" value="2"></td>
							<td><input type="radio" name="quality" class="radio" value="3"></td>
							<td><input type="radio" name="quality" class="radio" value="4"></td>
							<td><input type="radio" name="quality" class="radio" value="5"></td>
						</tr>
						<tr>
							<td class="th">Price</td>
							<td><input type="radio" name="price" class="radio" value="1"></td>
							<td><input type="radio" name="price" class="radio" value="2"></td>
							<td><input type="radio" name="price" class="radio" value="3"></td>
							<td><input type="radio" name="price" class="radio" value="4"></td>
							<td><input type="radio" name="price" class="radio" value="5"></td>
						</tr>
						<tr>
							<td class="th">Value</td>
							<td><input type="radio" name="value" class="radio" value="1"></td>
							<td><input type="radio" name="value" class="radio" value="2"></td>
							<td><input type="radio" name="value" class="radio" value="3"></td>
							<td><input type="radio" name="value" class="radio" value="4"></td>
							<td><input type="radio" name="value" class="radio" value="5"></td>
						</tr>
					</tbody>
				</table><!--REVIEWW TABLE-->
			</div><!--REVIEWW TABLE-->
<!--END OF THE REVIEW_TABLE DESCRIPTION--->
  <?php
	$query=mysqli_query($con,"select * from users where email='".$_SESSION['email']."'");
	$st=mysqli_fetch_array($query);

	?>
<!--START OF THE REVIEW_FORM DESCRIPTIONPRODUCTS--->
	<div class="container_form">

				<div class="titanproductdetails_divform">
					<label class="label_name" for="exampleInputName">Your Name <span class="astk">*</span></label>
					<input type="text" class="text_summary disableName" id="exampleInputName" placeholder="" name="name" required="required" value="<?php echo $st['name']; ?>" readonly>
				</div>

				<div class="titanproductdetails_divform">
					<label class="label_name" for="exampleInputSummary">Summary <span class="astk">*</span></label>
					<input type="text" class="text_summary" id="exampleInputSummary" placeholder="" name="summary" required="required">
				</div><!-- /.form-group -->

				<div class="titanproductdetails_divform">
					<label class="label_name" for="exampleInputReview">Review <span class="astk">*</span></label>
					<textarea class="text_summary txtarea" id="exampleInputReview" rows="4" placeholder="" name="review" required="required"></textarea>
				</div><!-- /.form-group -->

				<div class="action_btn">
					<button name="submit_review" class="btn review_btn">submit</button>
				</div><!--ACTION BTN-->

		</form><!--REVIEWW FORM-->
	</div><!--END REVIEWW FORM CNTAINER -->

	</div><!--END CONTAINER FORM-->
</center>

<!--END OF PRODUCTS REVIEW_SECTION---->

			</div><!--END ADD REVIEWW-->
			<?php $cid=$row['category'];
						$subcid=$row['subcategory']; } ?>
</div><!--END PRODUCT WRAPPER-->



<!--START HOT DEALS-->
<section class="products_section">
		<h3 class="related_title">related products</h3>

<?php
$query=mysqli_query($con,"SELECT * FROM `products` WHERE subcategory='$subcid' AND category='$cid'");
while($r=mysqli_fetch_array($query))
{

			?>
			<div class="products_wrapper">
				<div class="product">
					<div class="product_img">
						<a href="titan_product_details.php?pid=<?php echo htmlentities($row['id']);?>">
							<img class="imgprod" src="admin/productimages/<?php echo htmlentities($r['id']);?>/<?php echo htmlentities($r['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($r['id']);?>/<?php echo htmlentities($r['productImage1']);?>" >
						</a>
					</div>

					<div class="product_information">
						<div class="row">
							<div class="prod_details">
								<h3 class="product_name"><a class="productname_link" href="titan_product_details.php?pid=<?php echo htmlentities($r['id']);?>">
									<?php echo htmlentities($r['productName']);?></a>
								</h3>

								<div class="product_price">
									<span class="price">

									<span class="original_price">
											$<?php echo htmlentities($r['productPrice']);?>
									</span>
									<span class="price_before_discount">$<?php echo htmlentities($r['productPriceBeforeDiscount']);?>

									</span>

								</span>
								</div>
							</div><!--END DIV PROD_DETAILS-->

						<div class="product_views">
							<span class="views">
								<?php echo htmlentities($r['productViewers']); ?><i class="fa fa-eye"></i>
							</span>
						</div>
					</div><!---END ROW-->

					<div class="product_action">
					<?php if($r['productAvailability']=='In Stock'){?>

							<a href="category.php?page=product&action=add&id=<?php echo $r['id']; ?>" class="btn_details">
								<i class="fa fa-shopping-cart"></i>
							</a>

						<a class="btn_details" href="category.php?pid=<?php echo htmlentities($r['id'])?>&&action=wishlist" title="Wishlist">
						<i class="fa fa-heart"></i>
						</a>
					</div>

				<?php } else {?>
							<div class="btn_details">Out of Stock</div>
						<?php } ?>
					</div><!--PRODUCT INFORMATION--->

				</div><!--END PRODUCT-->
			</div><!--END PRODUCTS WRAPPER-->

		<?php } ?>
		<?php } ?>
	</section><br><br>


<!--END HOT DEALS-->

<!--ARROW TO TOP .INC.PHP SECTION-->
<?php include 'includes/arrow_to_top.inc.php'; ?>
<!--FOOTER .INC.PHP SECTION-->
<?php include 'includes/footer.inc.php'; ?>
</body>
