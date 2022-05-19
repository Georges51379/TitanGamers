<style>
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: sans-serif;
}
.services_title{
  margin-bottom: 3%;
  text-transform: capitalize;
  font-family: sans-serif;
  font-weight: bolder;
  font-size: 22px;
  text-decoration: underline;
  animation: underlineAnimation 10s infinite;
}
.wrapper{
  display: grid;
  margin-bottom: 7%;
  grid-gap: 20px;
  grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
}
@media (max-width: 700px) {
  .wrapper{
    margin: 200px auto;
  }
}
.wrapper .box{
  width: 350px;
  margin: 0 auto;
  position: relative;
  perspective: 1000px;
}
.wrapper .box .front-face{
  background: #2C3531;
  color: #116466;
  height: 220px;
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  box-shadow: 0px 5px 20px 0px rgba(0, 81, 250, 0.1);
  transition: all 0.5s ease;
}
.box .front-face .icon{
  height: 80px;
}
.box .front-face .icon i{
  font-size: 65px;
}
.box .front-face span,
.box .back-face span{
  font-size: 22px;
  font-weight: 600;
  text-transform: uppercase;
}
.box .front-face .icon i,
.box .front-face span{
  background: linear-gradient(-135deg, #c850c0, #4158d0);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
.box .back-face{
  position: absolute;
  top: 0;
  text-transform: capitalize;
  font-weight: bolder;
  font-family: sans-serif;
  left: 0;
  z-index: 1;
  height: 220px;
  width: 100%;
  padding: 30px;
  color: #2C3531;
  background-color: #116466;
  opacity: 0;
  transform-style: preserve-3d;
  backface-visibility: hidden;
  transform: translateY(110px) rotateX(-90deg);
  box-shadow: 0px 5px 20px 0px rgba(0, 81, 250, 0.1);
  transition: all 0.5s ease;
}
.box .back-face p{
  margin-top: 10px;
  text-align: justify;
}
.box:hover .back-face{
  opacity: 1;
  transform: rotateX(0deg);
}
.box:hover .front-face{
  opacity: 0;
  transform: translateY(-110px) rotateX(90deg);
}

@keyframes underlineAnimation{
  0%{
    text-decoration-color: red;
  }
  20%{
    text-decoration-color: blue;
  }
  40%{
    text-decoration-color: yellow;
  }
  60%{
    text-decoration-color: green;
  }
  80%{
    text-decoration-color: black;
  }
  100%{
    text-decoration-color: #116466;
  }
}

</style>
<center><div class="services_title">our specialties</div></center>

<div class="wrapper">
         <div class="box">
            <div class="front-face">
               <div class="icon">
                  <i class="fa fa-plus"></i>
               </div>
               <span>request product</span>
            </div>
            <div class="back-face">
               <span>request product</span>
               <p>
                 you can request a product once you log in and we will get back to you as soon as possible.
               </p>
            </div>
         </div>
         <div class="box">
            <div class="front-face">
               <div class="icon">
                  <i class="fa fa-desktop"></i>
               </div>
               <span>custom pc</span>
            </div>
            <div class="back-face">
               <span>custom pc</span>
               <p>
                 you can build your own desktop and when you finish, we will build it as you mentioned and send it to your doorstep.
              </p>
            </div>
         </div>
         <div class="box">
            <div class="front-face">
               <div class="icon">
                  <i class="fa fa-truck"></i>
               </div>
               <span>track orders</span>
            </div>
            <div class="back-face">
               <span>track orders</span>
               <p>
                 you can track your orders by logging in and entering the titan track order tab in the top to track your orders easily.
               </p>
            </div>
         </div>
      </div>
