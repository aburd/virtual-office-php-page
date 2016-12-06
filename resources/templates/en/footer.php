<div class="block05">
	<div class="col-sm-4 footer-logo"><img src="../public_html/images/servcorp-logo.png" alt="" /></div>
	<div class="col-sm-8 footer-desc">Trusted by over 20,000 businesses around the world.<br> Run your business from anywhere in <b>150 locations worldwide</b>.</div>
	<div class="clearfix"></div>
</div>


</div><!-- .container -->


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script src="../public_html/js/jquery.easing.1.3.js"></script>
<script src="../public_html/js/bootstrap.min.js"></script>
<script src="../public_html/js/script.js" defer></script>
<script>
// pause for 1 second and then show tagline
  setTimeout(function(){
      var tagline = $('.block02 .banner-text');

      tagline.animate({
          'margin-left': '50px',
          'margin-top': '50px'
      }, { duration: 700, queue: false });

      tagline.fadeIn({
          duration: 1200,
          queue: false
      });

  }, 1200);
</script>
 <script>
	// stop video from playing during close
  $(".modal").on("hidden.bs.modal", function(e){
		$(this).find('iframe').attr("src", $(this).find('iframe').attr("src"))
	});
	// stop event from refreshing page
	$('.btn a').on('click', function(ev){
	  ev.preventDefault();
	});
</script>

<script src="../public_html/js/jquery.backstretch.min.js"></script>
<script>
	$(".block02 .main-visual").backstretch([
		"../public_html/images/main_visual_01.jpg",
		"../public_html/images/main_visual_02.jpg",
		"../public_html/images/main_visual_03.jpg"
	], {
		duration: 5000,
		fade: 750
	});
</script>

</body>
</html>
