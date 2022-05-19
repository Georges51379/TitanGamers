<link href="css/sidebar.css" rel="stylesheet">

<div class="sidebar_wrapper">
		<div class="sidebar">
				<ul class="first_list dropdown_order">
							<li class="first_list_li">
								<a class="first_list_links" data-toggle="collapse" href="#dropdown_order">
									<i class="icon fa fa-tasks"></i>&nbsp
										order managment
								</a>

								<ul id="dropdown_order" class="ordersdropdown_list">
									<li class="ordersdropdown_li">
										<a class="ordersdropdown_links" href="titan_todaysorders.php">
											<i class="icon fa fa-anchor"></i>&nbsp
											Today's Orders
  <?php
  $f1="00:00:00";
$from=date('Y-m-d')." ".$f1;
$t1="23:59:59";
$to=date('Y-m-d')." ".$t1;
 $result = mysqli_query($con,"SELECT * FROM Orders where orderDate Between '$from' and '$to'");
$num_rows1 = mysqli_num_rows($result);
{
?>
											<b class="numberoforders"><?php echo htmlentities($num_rows1); ?></b>
											<?php } ?>
										</a>
									</li>

									<li class="ordersdropdown_li">
										<a class="ordersdropdown_links" href="titan_pendingorders.php">
											<i class="icon fa fa-anchor"></i>&nbsp
											Pending Orders
										<?php
	$status='Delivered';
$ret = mysqli_query($con,"SELECT * FROM Orders where orderStatus!='$status' || orderStatus is null ");
$num = mysqli_num_rows($ret);
{?><b class="numberoforders"><?php echo htmlentities($num); ?></b>
<?php } ?>
										</a>
									</li>
									<li class="ordersdropdown_li">
										<a class="ordersdropdown_links" href="titan_deliveredorders.php">
											<i class="icon fa fa-anchor"></i>&nbsp
											Delivered Orders
								<?php
	$status='Delivered';
$rt = mysqli_query($con,"SELECT * FROM Orders where orderStatus='$status'");
$num1 = mysqli_num_rows($rt);
{?><b class="numberoforders"><?php echo htmlentities($num1); ?></b>
<?php } ?>
										</a>
									</li>
								</ul>
							</li>
							<li class="first_list_li">
								<a class="first_list_links" href="titan_manageusers.php">
									<i class="icon fa fa-user"></i>&nbsp
									manage users
								</a>
							</li>
						</ul>


						<ul class="second_list">
              <li class="secondlist_li"><a class="secondlist_links" href="titan_category.php">
								<i class="icon fa fa-plus"></i>&nbsp create category </a>
							</li>
              <li class="secondlist_li"><a class="secondlist_links" href="titan_subcategory.php">
								<i class="icon fa fa-plus"></i>&nbspsub category </a>
							</li>
              <li class="secondlist_li"><a class="secondlist_links" href="productType.php">
                <i class="icon fa fa-plus"></i>&nbsp product type </a>
              </li>
              <li class="secondlist_li"><a class="secondlist_links" href="titan_insertproduct.php">
								<i class="icon fa fa-plus"></i>&nbspinsert product </a>
							</li>
              <li class="secondlist_li"><a class="secondlist_links" href="titan_manageproducts.php">
								<i class="icon fa fa-tasks"></i>&nbspmanage products </a>
							</li>
              <li class="secondlist_li"><a class="secondlist_links" href="titan_requestproduct.php">
								<i class="icon fa fa-tasks"></i>&nbsprequested products </a>
							</li>
            </ul><!--side nav list-->


						<ul class="third_list">
							<li class="thirdlist_li">
								<a class="thirdlist_links" href="titan_userlogs.php">
								<i class="icon fa fa-user"></i>&nbspUser Login Log </a>
							</li>
							<li class="thirdlist_li">
								<a class="thirdlist_links" href="titan_logout.php">
									<i class="icon fa fa-sign-out"></i>&nbsp
									Logout
								</a>
							</li>
						</ul>-

					</div><!--/.sidebar-->
				</div><!--/.span3-->
