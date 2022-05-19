<head>
  <style>

  #splashscreen_body{
    font-size: 16px;
    margin: 0;
    position: fixed;
    display: flex;
    align-items: center;
    justify-content: space-around;
    min-height: 100vh;
  }
  #loading_section{
    width: 100%;
    height: 100%;
    left: 0;
    position: fixed;
    background-color: #002f33;
    transition: all 0.5s ease-out;
    z-index 1000;
  }
  #loading_section.fade_out{
    opacity: 0;
  }
  .loading_text{
    position: absolute;
    left: 50%;
    top: 50%;
    font-size: 20px;
    transform: translate(-50%,-50%);
    color: red;
  }
  .circle_loader{
    width: 200px;
    height: 200px;
    position: absolute;
    left: 50%;
    top: 50%;
    margin: -100px 0 0 -100px;
    border: 3px solid transparent;
    border-top-color: #03afbd;
    border-bottom-color: #03afbd;
    border-radius: 50%;
    animation: circlelaoder 2s linear;
    animation-iteration-count: infinite;
  }
  .circle_loader:after,
  .circle_loader:before{
    content: "";
    position: absolute;
    border-radius: 50%;
  }
  .circle_loader:after{
    left: 15px;
    top: 15px;
    right: 15px;
    bottom: 15px;
    border: 3px solid transparent;
    border-top-color: #03afbd;
    border-bottom-color: #03afbd;
    animation: circlelaoder 3s linear;
    animation-iteration-count: infinite;
  }
  .circle_loader:before{
    left: 5px;
    top: 5px;
    right: 5px;
    bottom: 5px;
    border: 3px solid transparent;
    border-top-color: #03afbd;
    border-bottom-color: #03afbd;
  }

@keyframes circlelaoder {
    from{
      transform: rotate(0deg);
    }
    to{
      transform: rotate(360deg);
    }
}



  </style>
</head>

<body id="splashscreen_body">

<h1>ebbik</h1>

  <div id="loading_section">
    <div class="loading_text">loading</div>
    <div class="circle_loader"></div>
  </div>

  <script>
  window.onload = function(){

    setTimeout(function(){
      document.getElementById('loading_section').className = 'fade_out';
    },2000)

    setTimeout(function(){
      document.getElementById('loading_section').style.display = 'none';
    },2500)

  }
</script>
</body>
