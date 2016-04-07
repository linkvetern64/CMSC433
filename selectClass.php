<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
		<script src="overlay/js/jquery-1.9.1.min.js"></script>
		<script src="overlay/js/modernizr.js"></script>
		<script>
		$(document).ready(function(){
			if (Modernizr.touch) {
				// show the close overlay button
				$(".close-overlay").removeClass("hidden");
				// handle the adding of hover class when clicked
				$(".img").click(function(e){
					if (!$(this).hasClass("hover")) {
						$(this).addClass("hover");
					}
				});
				// handle the closing of the overlay
				$(".close-overlay").click(function(e){
					e.preventDefault();
					e.stopPropagation();
					if ($(this).closest(".img").hasClass("hover")) {
						$(this).closest(".img").removeClass("hover");
					}
				});
			} else {
				// handle the mouseenter functionality
				$(".img").mouseenter(function(){
					$(this).addClass("hover");
				})
				// handle the mouseleave functionality
				.mouseleave(function(){
					$(this).removeClass("hover");
				});
			}
		});
		
		
		function goto(id, t){	
	//animate to the div id.
	
  console.log(($(id).position()));
	$(".contentbox-wrapper").animate({"left": -($(id).position().left)}, 600);
	
	// remove "active" class from all links inside #nav
    $('#nav a').removeClass('active');
	
	// add active class to the current link
    $(t).addClass('active');	
	}
	</script>

</head>
<body>
	<a href="#contact" onClick="goto('#contact',this); return false" class="smoothScroll">Contact</a>
	<div id="contact" class="contentbox" style="margin-top:100px!important;">
	 
	</div>

	<script src="assets/js/bootstrap-transition.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/smoothscroll.js"></script>
</body>
</html>