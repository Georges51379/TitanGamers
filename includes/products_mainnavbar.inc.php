<style>
.mainav_header {
  background-color: #116466;
  position: relative;
  width: 100%;
  z-index: 3;
}

.mainav_header .mainnav_list {
  margin: 0;
  padding: 0;
  list-style: none;
  overflow: hidden;
}

.mainav_header .mainnav_li .mainnav_links{
  display: block;
  color: black;
  background-color: #116466;
  padding: 20px 20px;
  text-decoration: none;
  text-transform: capitalize;
  font-size: 17px;
}

.mainav_header .mainnav_li .mainnav_links:hover,
.mainav_header .menu_btn:hover {
  background-color: black;
  color: #116466;
}

.mainav_header .logo{
  color: #116466;
  display: block;
  float: left;
  font-size: 1.5em;
  margin-left: 3%;
  text-decoration: none;
  text-transform: uppercase;
  font-weight: bolder;
  font-family: sans-serif;
  background-color: black;
  transform: skew(30deg);
  height: 100%;
  width: auto;
}
.mainav_header .logo .logo_link{
  color: #116466;
  text-decoration: none;
  text-transform: uppercase;
}

/* menu */

.mainav_header .mainnav_list {
  clear: both;
  max-height: 0;
  transition: max-height .2s ease-out;
}

/* menu icon */

.mainav_header .menu_icon {
  cursor: pointer;
  display: inline-block;
  float: right;
  padding: 28px 20px;
  position: relative;
  user-select: none;
}

.mainav_header .menu_icon .navicon {
  background: #fff;
  display: block;
  height: 2px;
  position: relative;
  transition: background .2s ease-out;
  width: 18px;
}

.mainav_header .menu_icon .navicon:before,
.mainav_header .menu_icon .navicon:after {
  background: #fff;
  content: '';
  display: block;
  height: 100%;
  position: absolute;
  transition: all .2s ease-out;
  width: 100%;
}

.mainav_header .menu_icon .navicon:before {
  top: 5px;
}

.mainav_header .menu_icon .navicon:after {
  top: -5px;
}

/* menu btn */

.mainav_header .menu_btn {
  display: none;
}

.mainav_header .menu_btn:checked ~ .mainnav_list {
  max-height: 340px;
}

.mainav_header .menu_btn:checked ~ .menu_icon .navicon {
  background: transparent;
}

.mainav_header .menu_btn:checked ~ .menu_icon .navicon:before {
  transform: rotate(-45deg);
}

.mainav_header .menu_btn:checked ~ .menu_icon .navicon:after {
  transform: rotate(45deg);
}

.mainav_header .menu_btn:checked ~ .menu_icon:not(.steps) .navicon:before,
.mainav_header .menu_btn:checked ~ .menu_icon:not(.steps) .navicon:after {
  top: 0;
}

/* Responsive */

@media only screen and (max-width: 768px){
    .mainav_header .mainnav_list{
        background-color: #116466;
    }
    .mainav_header .logo{
      height: auto;
      padding: 30px 20px;

    }
    .mainav_header .mainnav_li .mainnav_links {
    padding: 15px;
    color: black;
    border-bottom: 1px dotted #D1E8E2;
  }
}

@media only screen and (min-width: 768px) {
    .menu_wrapper{
        background: #116466;
        height: 55px;
        line-height: 55px;
        width: 100%;
    }
  .mainav_header .mainnav_li {
    float: left;
  }
    .mainav_header .logo{
      height: auto;
    }
  .mainav_header .mainnav_li .mainnav_links {
    color: black;
    padding: 0px 30px;
    border-right: 1px solid rgba(255, 255, 255, 0.2);

  }
  .mainav_header .mainnav_list {
    clear: none;
    float: right;
    max-height: none;
  }
  .mainav_header .menu_icon {
    display: none;
  }
}

</style>


<div class="menu_wrapper">
 <header class="mainav_header">
   <div class="logo"><a  href="index.php" class="logo_link">titan&nbspgamers</a></div>
  <input class="menu_btn" type="checkbox" id="menu_btn" />
  <label class="menu_icon" for="menu_btn"><span class="navicon"></span></label>

  <ul class="mainnav_list">
    <li class="mainnav_li"><a href="products.php" class="mainnav_links">home</a></li>
      <?php
       $sql=mysqli_query($con,"SELECT categoryToken, categoryName FROM category WHERE categoryStatus = 'active' ");

    while($row=mysqli_fetch_array($sql))
    {
    ?>
      <li class="mainnav_li">
        <a class="mainnav_links" href="category.php?c=<?php echo htmlentities($row['categoryToken']);?>"> <?php echo htmlentities($row['categoryName']); ?> </a>
      </li>
    <?php } ?>

      </ul>
    </header>
</div>
