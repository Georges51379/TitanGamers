<style>
.account_sidebar_wrapper{
  left:0;
  top: 30%;
  position: fixed;
  width: auto;
  box-sizing: border-box;
  background-color: #2C3531;
}
.sidebar_li{
  list-style: none;
}
.sidebar_links{
  text-decoration: none;
  text-transform: capitalize;
  color: #116466;
  width: auto;
  box-sizing: border-box;
  font-size: 30px;
}
.sidebar_links:hover{
  color: #116466;
  background-color: #D1E8E2;
}

</style>

<div class="account_sidebar_wrapper">
  <div class="sidebar_body">
    <ul class="sidebar_list">
      <li class="sidebar_li"><a href="titan_account.php" class="sidebar_links" title="titan account"><i class="fa fa-user"></i></a></li><br>
      <li class="sidebar_li"><a href="titan_ship_bill_addresses.php" class="sidebar_links" title="shipping and billing addresses"><i class="fa fa-address-book"></i></a></li><br>
      <li class="sidebar_li"><a href="titan_order_history.php" class="sidebar_links" title="orders history"><i class="fa fa-history"></i></a></li><br>
      <li class="sidebar_li"><a href="titan_pending_orders.php" class="sidebar_links" title="pending orders"><i class="fa fa-pause-circle"></i></a></li><br>
    </ul>
  </div>
</div>
