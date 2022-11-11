$(document).ready(function() {
  $('#navbar-toggle').click(function(){
        $('.navbar .navbar-list').slideToggle();
    })
    $('#navbar-toggle').on('click', function(){
        this.classList.toggle('active');
    });
    $('#topbar-toggle').click(function(){
          $('.topbar .topbar-list').slideToggle();
      })
      $('#topbar-toggle').on('click', function(){
          this.classList.toggle('topbaractive');
      });

});

window.onscroll = function(){
  stickNavbar();
}

var navbar = document.getElementById("navbar-wrapper");
var sticky = navbar.offsetTop;

function stickNavbar() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}


function topbarToggle() {
  var x = document.getElementById("topbar-wrapper");
  if (x.className === "topbar-wrapper") {
    x.className += " responsive";
  } else {
    x.className = "topbar-wrapper";
  }
}



const searchBox = document.querySelector(".search-box");
const searchBtn = document.querySelector(".search-icon");
const cancelBtn = document.querySelector(".cancel-icon");
const searchInput = document.querySelector("input");
searchBtn.onclick =()=>{
  searchBox.classList.add("active");
  searchBtn.classList.add("active");
  searchInput.classList.add("active");
  cancelBtn.classList.add("active");
  searchInput.focus();
}
cancelBtn.onclick =()=>{
  searchBox.classList.remove("active");
  searchBtn.classList.remove("active");
  searchInput.classList.remove("active");
  cancelBtn.classList.remove("active");
  searchData.classList.toggle("active");
  searchInput.value = "";
}
