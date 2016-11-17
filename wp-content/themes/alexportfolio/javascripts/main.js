$(function() {

	function projectBackground() {
		$('.project__header--bg').height($('.project__header').height() + 60);
		$('.project__details--bg').height($('.project__details').height() * 0.7);
	}

	// For every element that needs to use matchHeight.js
	function equalHeight() {
		$('.project__overview--col').matchHeight();
	}

	function setH1() {
		if($('.page').find("h1").length == 0) {
			$('.page').find('section:first-child h2').replaceWith(function() {
				return "<h1>" + $('.page').find('section:first-child h2').html() + "</h1>"
			})
		}
	}

	// Please place all the responsive functions here
	function respond() {
    projectBackground();
	}

	$(document).ready(function() {
		respond();
		equalHeight();
		setH1();
	});

	$(window).load(function() {

	});

	$(window).resize(function() {
		respond();
		
	});

	$(window).scroll(function() {
		
	});

}(jQuery))