$(function() {

	function projectBackground() {
		$('.project__header--bg').height($('.project__header').height() + 60);
		$('.project__details--bg').height($('.project__details').height() * 0.7);
	}

	// For every element that needs to use matchHeight.js
	function equalHeight() {
		$('.project__overview--col').matchHeight();
		$('.others-copy h4').matchHeight();
		$('.layout-multiplecolumn .column').matchHeight();
	}

	function setH1() {
		if($('.page').find("h1").length == 0) {
			$('.page').find('section:first-child h2').replaceWith(function() {
				return "<h1>" + $('.page').find('section:first-child h2').html() + "</h1>"
			})
		}
	}

	function addMobileNavClass() {
		var width = window.innerWidth ||
                document.documentElement.clientWidth ||
                document.body.clientWidth;

    if (width <= 767) {
    	$('.navbar.navbar-default').addClass('navbar-mobile');
    } else {
    	$('.navbar.navbar-default.navbar-mobile').removeClass('navbar-mobile');
    }
	}

	// Please place all the responsive functions here
	function respond() {
    addMobileNavClass();
	}

	$(document).ready(function() {
		respond();
		equalHeight();
		setH1();

		$('.page-about .about-contact').attr('id', 'contact');
	});

	$(window).load(function() {
		projectBackground();
	});

	$(window).resize(function() {
		respond();
		projectBackground();
	});

	$(window).scroll(function() {
		
	});

}(jQuery))