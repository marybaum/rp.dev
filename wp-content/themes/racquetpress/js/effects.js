jQuery(function( $ ){

	$(".nav-primary .genesis-nav-menu").addClass("responsive-menu").before('<div id="responsive-menu-icon"></div>');

	$("#responsive-menu-icon").click(function(){
		$(".nav-primary .genesis-nav-menu").fadeToggle();
	});

	$(document).on("scroll", function(){

		if($(document).scrollTop() > 100){

			$(".site-header").addClass("shrink");
			updateSliderMargin();

		} else {

			$(".site-header").removeClass("shrink");
			updateSliderMargin();

		}

	});

});