<?php
 if(isset($_Get['action'])){
		if(!empty($_SESSION['cart'])){
		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['quantity']=$val;
			}
		}
		}
	}
?>
<div class="topbar-wrapper" id="topbar-wrapper">
  <ul class="topbar-list">

  <!--WELCOME USERNAME-->
  <?php if(strlen($_SESSION['email'])){ ?>
      <a href="products.php" class="topbar-links" title="Welcome!">
        <?php $queryName = mysqli_query($con, "SELECT name FROM `users` WHERE email = '".$_SESSION['email']."'");
          $rows = mysqli_fetch_array($queryName);
        ?>Welcome, titan&nbsp<?php echo htmlentities($rows['name']);?>
      </a>
        <?php } ?>
    <a href="javascript:void(0);" class="icon" onclick="topbarToggle()">
      <i class="fa fa-bars"></i>
    </a>
    <a href="titan_account.php" class="topbar-links" title="Your Account">account</a>
    <a href="titan_wishlist.php" class="topbar-links" title="Wishlist">wishlist</a>
    <a href="titan_cart.php" class="topbar-links" title="Shopping Cart">cart</a>
    <a href="titan_track_orders.php" class="topbar-links" title="Track Your Order(s)">track order(s)</a>
    <a href="titan_requestproduct.php" class="topbar-links" title="Request Product">request product</a>
  <!--LOGIN AND LOGOUT SECTION-->
  <?php if(strlen($_SESSION['email'])==0){
  //CHECKING IF USER IS LOGGED IN TO SHOW THE LOGOUT BUTTON OR SWITCH TO LOGIN BUTTON
  ?>
  <a href="login-user.php" class="topbar-links" title="Sign In">titan <i class="fa fa-sign-in"></i></a>
  <?php }
  else{ ?>
    <a href="logout-user.php" class="topbar-links" title="Sign Out">titan <i class="fa fa-sign-out"></i></a>
  <?php } ?>

  </ul>
</div><!--END TOPBAR-->

<div class="search-wrapper">

  <center><div class="search-box">
    <form name="search" method="post" class="form" action="titan_search_result.php">
    <input type="text" name="product" placeholder="Type to search..">
      <div class="search-icon">
         <i class="fa-solid fa-magnifying-glass i"></i>
      </div>
    </form>
      <div class="cancel-icon">
        <i class="fas fa-times"></i>
      </div>
      <div class="search-data">
      </div>
  </div></center>
</div>

  <div class="navbar-wrapper" id="navbar-wrapper">
      <div class="navbar-container">
          <div class="logo">
              <a href="index.php">titan gamers</a>
          </div>
          <nav class="navbar">
              <div class="navbar-mobile">
                  <a href="#" id="navbar-toggle">
                      <span class="bars"></span>
                  </a>
              </div>
              <ul class="navbar-list">
                  <li class="navbar-li"><a href="products.php" class="navbar-links">home</a></li>
<?php
   $categoryQuery=mysqli_query($con,"SELECT categoryToken, categoryName FROM category WHERE categoryStatus = 'Active' ");
    while($row=mysqli_fetch_array($categoryQuery)){
?>
                  <li class="navbar-li"><a href="category.php?c=<?php echo htmlentities($row['categoryToken']);?>" class="navbar-links"><?php echo htmlentities($row['categoryName']);?></a></li>
<?php } ?>
              </ul>
          </nav>
      </div>
  </div><br><!--END NAVBAR-->
