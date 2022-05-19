<script>
var i = 0;
var images = [];
var time = 4000;

images [0] = 'banners/1.png';
images [1] = 'banners/2.png';
images [2] = 'banners/3.png';
images [3] = 'banners/4.png';

function slideshow(){
  document.slide.src = images[i];

  if ( i < images.length - 1){
    i++;
  }else {
    i = 0;
  }
  setTimeout("slideshow()", time);
}
window.onload = slideshow;


</script>

<style>
.slideshow{
  box-sizing: border-box;
  box-shadow: 4px 4px 5px #2C3531;
  border: 3px solid #2C3531;
  border-style: double;
  margin-top: 20px;
  margin-bottom: 20px;
  width: 50%;
  height: 50%;
}
</style>
<center>
<img name="slide" class="slideshow">
</center>
