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
<style>
.box{
  display: block;
  padding: 1%;
  text-align: center;
}
.form_input{
  margin-top: 10px;
  position: relative;
  font-size: 20px;
  display: inline-block;
  transition: .5s;
  border-radius: 25px 0 0 25px;
  padding: 0 25px;
  border: none;
  outline: none;
  cursor: grab;
  background-color: #116466;
  text-transform: capitalize;
  color: gold;
  animation: light 10s infinite;
}
.form_btn{
  position: relative;
  left: -5px;
  border-radius: 0 30px 30px 0;
  border: none;
  font-size: 20px;
  text-transform: capitalize;
  outline: none;
  cursor: grab;
  color: #D1E8E2;
  background-color: black;
  animation: light2 10s infinite;
}

.form_input:focus{
  background-color: black;
  color: gold;
}
.form_btn:hover{
  background-color: #116466;
  color: GRAY;
}

@keyframes light {
  0%{
    background-color: #116466;
  }
  20%{
    background-color: black;
  }
  40%{
    background-color: #116466  ;
  }
  60%{
    background-color: black;
  }
  80%{
    background-color: #116466;
  }
  100%{
    background-color: black;
  }
  110%{
    background-color: #116466;
  }
}

@keyframes light2 {
  0%{
    background-color: #116466;
  }
  20%{
    background-color: black;
  }
  40%{
    background-color: #116466  ;
  }
  60%{
    background-color: black;
  }
  80%{
    background-color: #116466;
  }
  100%{
    background-color: black;
  }
  110%{
    background-color: #116466;
  }
}

@media only screen and (max-width: 768px){
  .box{
    text-align: center;
  }
}

@media only screen and (min-width: 768px) {
  .box{
    text-align: center;
  }
}
</style>

<div class="box">

      <form name="search" method="post" class="form" action="titan_search_result.php">
          <div class="form_div">
              <input class="form_input" placeholder="search here..." name="product" required="required">
              <button class="form_btn" type="submit" name="search">search</button>
          </div>
      </form>

</div><!--search_area -->
