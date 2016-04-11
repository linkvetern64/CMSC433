		//Smoothscroll on page
		$(document).ready(function(){
			$('a[href^="#"]').on('click',function (e) {
			    e.preventDefault();

			    var target = this.hash;
			    var $target = $(target);

			    $('html, body').stop().animate({
				        'scrollTop': $target.offset().top
				    }, 1500, 'swing', function () {
				        window.location.hash = target;
				    });
				});
		});

		//Transitions background
		$(document).scroll(function () {
		    var y = $(this).scrollTop();
		    if (y > 150) {
		        $('#img2').fadeIn("slow");
		    }
		    else {$('#img2').fadeOut('slow')};
		    
		});

				//Transitions background
		$(document).scroll(function () {
		    var y = $(this).scrollTop();
		    if (y > 600) {
		        $('#navbar').fadeIn("slow");
		    }
		    else {$('#navbar').fadeOut('slow')};
		    
		});

		//Function for checking checkboxes
		$('.checkbox').click(function(){
			$(this).toggleClass('is-checked');
		});
 