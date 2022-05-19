<style>
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
.main_header .topnav_main{
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: fixed;
  min-height: 12vh;
  min-width: 100%;
  z-index: 10;
  background-color: #2C3531;
}
.main_header .topnav_main .logo_title{
  color: gold;
  display: block;
  float: left;
  font-size: 1.5em;
  padding: 25px 20px;
  text-decoration: none;
  text-transform: uppercase;
  font-weight: bolder;
  font-family: sans-serif;
  background-color: maroon;
  transform: skew(30deg);
}

.topbar_li{
  display: inline-flex;
  list-style:none;
  padding: 15px;
  text-transform: capitalize;
}
.topbar_links{
  text-decoration: none;
  justify-content: space-between;
  color: gold;
  font-size: 20px;
  font-family: sans-serif;
  font-weight: bolder;
}
.topbar_links:hover{
  color: #116466;
}
.special_link{
  color: maroon;
  text-transform: uppercase;
  text-shadow: 3px 4px 5px gold;
  animation: ledlight 10s infinite;
}
.main_header .topnav_main .hamburger{
  margin-right: 20px;
  display: none;
}
.main_header .topnav_main .hamburger .bar{
  width: 30px;
  height: 2px;
  margin: 7px;
  background: gold;
}
.intro_section{
  height: 100vh;
  background-color: #2C3531;
  position: relative;
}
.intro_content{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
}
.intro_content .shop_type{
  color: #D9B08C;
  font-size: 5rem;
  letter-spacing: -1px;
  text-transform: capitalize;
  margin-top: 80px;
}
.intro_content .location{
  margin-top: 5px;
  color: #D9B08C;
  font-size: 2.5rem;
  font-weight: 300;
  text-transform: uppercase;
}
.intro_content .taglines{
  margin-top: 40px;
  color: #D1E8E2;
  margin-top: 80px;
}
.taglines .taglines_content{
  position: relative;
  display: inline-block;
  width: 560px;
  margin-bottom: 55px;
  margin-top: 30px;
}
.intro_section .intro_content .taglines_content{
  position: absolute;
  overflow: hidden;
  width: 100%;
  left:0;
  bottom:0;
  height:0;
  opacity:0;
  color: #b1d4e0;
  text-transform: uppercase;
  word-spacing: 5px;
  text-align: center;
  font-size: 2.5rem;
}
.taglines_content:nth-child(1) {
  animation: NextWord 10s cubic-bezier(0.57, 1.52, 0.9, 1.08) 1.5s infinite;
}
.taglines_content:nth-child(2) {
  animation: NextWord 10s cubic-bezier(0.57, 1.52, 0.9, 1.08) 3s infinite;
}
.taglines_content:nth-child(3) {
  animation: NextWord 10s cubic-bezier(0.57, 1.52, 0.9, 1.08) 4.5s infinite;
}
@keyframes ledlight {
  0%{
    color: gold;
    text-shadow: 4px 4px 5px white;
  }
  20%{
    color: maroon;
    text-shadow: 4px 4px 5px white;
  }
  40%{
    color: gold;
    text-shadow: 4px 4px 5px white;
  }
  60%{
    color: maroon;
    text-shadow: 4px 4px 5px white;
  }
  80%{
    color: gold;
    text-shadow: 4px 4px 5px white;
  }
  100%{
    color: maroon;
    text-shadow: 4px 4px 5px white;
  }
}
@keyframes NextWord {
  0% {
    opacity: 0.3;
    height: 0.0;
  }
  10% {
    opacity: 1;
    height:1.2em;
  }
  20% {
    opacity: 1;
    height:1.2em;
  }
  28% {
    opacity: 0;
    height:2em;
  }
}
  @media only screen and (min-width: 768px) and (max-width: 991px) {
    .main_header .topnav_main .topbar_ul {
      width: 60%;
    }
    .main_header .topnav_main .topbar_ul .topbar_li .topbar_links{
      font-size: 1rem;
    }
  }
  /* Large Mobile :480px. */
  @media only screen and (max-width: 767px) {
    .logo_title:before{
      width: 70%;
    }
    .main_header .topnav_main .navbar_ul_list {
      position: absolute;
      top: 12vh;
      min-width: 100%;
      background: #116466;
      text-align: center;
      display: none;
    }
      .main_header .topnav_main .topbar_ul .topbar_li {
      display: block;
    }
      .main_header .topnav_main .topbar_ul .topbar_li .topbar_links {
      display: block;
      padding: 20px;
      transition: color 1s ease, padding 1s ease, background-color 1s ease;

    }
      .main_header .topnav_main .topbar_ul .topbar_li .topbar_links:hover{
      color: #b1d4e0;
      padding-left: 30px;
      background: rgba(177, 212, 224, 0.2);
    }
    .main_header .topnav_main .hamburger{
      display: block;
    }
    .intro_section .intro_content .shop_type {
      font-size: 2.8rem;
    }
    .intro_section .intro_content .location {
      font-size: 1.4rem;
    }
    .intro_section .intro_content .taglines_content {
      font-size: 1.5rem;
    }
  }
  @media only screen and (max-width: 479px) {
  .intro_section .intro_content .shop_type {
      font-size: 2rem;
      letter-spacing: 1px;
    }
    .intro_section .intro_content .tagline{
      margin-top: 10px;
    }
  }
</style>

  <body>

<header class="main_header">
  <nav class="topnav_main">
<!--LOGO SECTION-->
  <div class="logo_wrapper">
    <h1 class="logo_title">titan gamers</h1>
    </div>

<!--MAIN TOPBAR LINKS-->
    <ul class="topbar_ul">
      <li class="topbar_li"><a href="#" class="topbar_links">home</a></li>
      <li class="topbar_li"><a href="products.php" class="topbar_links">products</a></li>
      <li class="topbar_li"><a href="#" class="topbar_links special_link">your titan</a></li>
    </ul>

    <div class="hamburger">
      <div class="bar"></div>
      <div class="bar2 bar"></div>
      <div class="bar"></div>
    </div>

    </nav><!--END NAV BAR-->

<div class="intro_section">
  <div class="background_img"></div>

  <div class="intro_content">
    <h1 class="shop_type">gaming shop</h1>
    <h6 class="location">lebanon</h6>

    <p class="taglines">
      <span class="taglines_container">
        <span class="taglines_content">laptops</span>
        <span class="taglines_content">pc</span>
        <span class="taglines_content">accessories</span>
        </span>
      </p>
  </div>
  </div>
</header>

  <script>
    $(document).ready(function(){
    //TOGGLE HAMBURGER BTN
    $('.hamburger').click(function(event){
    $('.topbar_ul').slideToggle(500);
    event.preventDefault();

    $('.topbar_ul .topbar_li .topbar_links').click(function(event) {
        if ($(window).width() < 768) {
          $('.topbar_ul').slideUp(500);
          event.preventDefault();
        }
      });
    });
    });
  </script>

  </body>
