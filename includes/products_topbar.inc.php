<style>
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
.products_topbar_wrapper{
  background-color: black;
}
.products_li{
  display: inline-flex;
  list-style: none;
}
.products_links{
  text-decoration: none;
  text-transform: capitalize;
  border-right: 4px solid #116466;
  color: #116466;
  padding: 10px;
  font-weight: bolder;
  font-size: 16px;
}
.products_links:hover{
  color: #D1E8E2;
  text-decoration: underline;
}
.truck{
  transform: rotateY(180deg);
}
.rightli{
  float: right;
}

</style>
<!--FONT AWESOME CDN SECTION-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="products_topbar_wrapper">
  <ul class="products_list">

<!--WELCOME USERNAME-->
    <?php if(strlen($_SESSION['email']))
        {   ?>
    <li class="products_li"><a href="products.php" class="products_links">
      <?php $queryName = mysqli_query($con, "SELECT name FROM `user$` WHERE email = '".$_SESSION['email']."'");
        $rows = mysqli_fetch_array($queryName);
       ?>
    </i>Welcome, titan&nbsp<?php echo htmlentities($rows['name']);?></a></li>
    <?php } ?>

    <li class="products_li"><a href="titan_account.php" class="products_links" title="Your Account">account</a></li>
    <li class="products_li"><a href="titan_wishlist.php" class="products_links" title="Wishlist">wishlist</a></li>
    <li class="products_li"><a href="titan_cart.php" class="products_links" title="Shopping Cart">cart</a></li>
    <li class="products_li"><a href="titan_track_orders.php" class="products_links" title="Track Your Order(s)">track order(s)</a></li>
    <li class="products_li rightli"><a href="titan_requestproduct.php" class="products_links" title="Request Product">request product</a></li>

<!--LOGIN AND LOGOUT SECTION-->
    <?php if(strlen($_SESSION['email'])==0)
{
  //CHECKING IF USER IS LOGGED IN TO SHOW THE LOGOUT BUTTON OR SWITCH TO LOGIN BUTTON
  ?>

    <li class="products_li"><a href="login-user.php" class="products_links" title="Sign In">titan <i class="fa fa-sign-in"></i></a></li>
  <?php }
  else{ ?>
    <li class="products_li"><a href="logout-user.php" class="products_links" title="Sign Out">titan <i class="fa fa-sign-out"></i></a></li>
	<?php } ?>

  </ul>
</div>
