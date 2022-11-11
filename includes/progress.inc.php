<style>
.progress{
   position: fixed;
   top: 0;
   left: 0;
   height: 5px;
   background-color: blue;
   transition: all linear 0.5s;
   min-width: 1%;
 }
</style>

<div class="progress"></div>

<script>
$(document).on("scroll", function(){
  var pixels = $(document).scrollTop();
  var pageHeight = $(document).height() - $(window).height();
  var progress = 100 * pixels / pageHeight;

  $("div.progress").css("width", progress + "%");
})
</script>
